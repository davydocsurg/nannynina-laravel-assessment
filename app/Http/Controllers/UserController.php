<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchAllUsers()
    {
        $users = User::latest()->paginate(10);

        return $users;
    }
}
