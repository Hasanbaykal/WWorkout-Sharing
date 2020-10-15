<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit() {

    }

    public function update() {

    }

    public function passwordEdit() {

    }

    public function passwordUpdate() {

    }

    public function profile($id) {
        $user = User::find($id);

        if ($user) {
            return view('user.profile')->withUser($user);
        } else {
            return redirect()->back();
        }
    }
}
