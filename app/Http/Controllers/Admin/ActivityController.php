<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Str;

class ActivityController extends Controller
{
    public function index() {
        return Inertia::render('Admin/Activity', [
            'activities' => Activity::orderBy('date', 'ASC')->paginate(10)->withQueryString()->through(fn ($activity) => [
                'id' => $activity->id,
                'title' =>  $activity->title,
                'description' =>  $activity->description,
                'image' =>  $activity->image,
                'date' =>  $activity->date->toDateString(),
                'type' =>  $activity->type,
                'fromNow' =>  Carbon::create($activity->date)->diffForHumans(now()),
            ]),
        ]);
    }

    public function store(Request $request) {

        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required',
            'date' => 'required|date',
            'type' => 'required|string',
        ]);
        $totalActivityToday = Activity::where('date', 'LIKE' , '%'.$data["date"].'%')->count();

        if ($totalActivityToday >= 4) {
            return back()->with('error', 'Activities Already at max for Today');
        }

        $image = $request->image;
        $imageName= Str::slug($data['title']).'-'.$data['date'].'.'.$image->getClientOriginalExtension();
        $request->image->move('upload/', $imageName);
        $data['image'] = $imageName;

        $data['interval'] = 2;
        if (auth()->user()->activities()->create($data)) {
            return redirect()->route('admin.activities')->with('success', 'Activity Added Successfully');
        }

    }

    public function edit(Request $request) {


        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required',
            'date' => 'required|date',
            'type' => 'required|string',
        ]);


        $totalActivityToday = Activity::where('date', 'LIKE' , '%'.$data["date"].'%')->count();

        if ($totalActivityToday >= 4) {
            return back()->with('error', 'Activities Already at max for Today');
        }

        $image = $request->image;
        $imageName= Str::slug($data['title']).'-'.$data['date'].'.'.$image->getClientOriginalExtension();
        $request->image->move('upload/', $imageName);
        $data['image'] = $imageName;

        $data['interval'] = 2;
        if (auth()->user()->activities()->create($data)) {
            return redirect()->route('admin.activities')->with('success', 'Activity Added Successfully');
        }

    }

    public function destroy() {
        Activity::where("id", request('activityId'))->firstOrFail()->delete();
        return Inertia::render('Admin/Users');
    }
}
