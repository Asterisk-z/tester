<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UsersController extends Controller
{

    public function index() {
        return Inertia::render('Admin/Users', [
            'users' => User::where('role', 'user')->orderBy('created_at', 'DESC')->paginate(10)->withQueryString()->through(fn ($user) => [
                'id' => $user->id,
                'name' =>  $user->name,
                'email' =>  $user->email,
                'activities' => $user->activities()->count()
            ]),
        ]);
    }

    public function store(Request $request) {

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users'
        ]);
        $data['password'] = Hash::make('123456');
        $save = User::create($data);
        return Redirect::back()->with('success', 'User Create.');
    }

    public function destroy() {
        User::where("id", request('userId'))->firstOrFail()->delete();
        return Inertia::render('Admin/Users');
    }
}
