<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\EditedActivity;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashbaordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personalActivities = Activity::where('user_id', auth()->user()->id)->where('type', 'personal')->count();
        $editedGlobalActivities = EditedActivity::where('type', 'global')->count();
        $editedPersonalActivities = EditedActivity::where('user_id', auth()->user()->id)->where('type', 'personal')->count();
        return Inertia::render('Admin/Dashboard', [
            'activities' => Activity::count(),
            'users' => User::count(),
            'personalActivities' => $personalActivities,
            'editedGlobalActivities' => $editedGlobalActivities,
            'editedPersonalActivities' => $editedPersonalActivities,
        ]);
    }

}
