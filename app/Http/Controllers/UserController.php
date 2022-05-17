<?php

namespace App\Http\Controllers;

use App\Models\Scopes\AfricanUsers;
use App\Models\Scopes\OlderUsers;
use App\Models\Scopes\VerifiedUsers;
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
        $users = User::withoutGlobalScopes()->latest()->paginate(10);

        return $users;
    }

    /**
     * Display all verified users
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchVerifiedUsers()
    {
        $verifiedUsers = User::withoutGlobalScope(OlderUsers::class, AfricanUsers::class)->latest()->paginate(10);

        return $verifiedUsers;

    }

    /**
     * Display older users (above 40 years)
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchOlderUsers()
    {
        $olderUsers = User::withoutGlobalScope(VerifiedUsers::class, AfricanUsers::class)->latest()->paginate(10);

        return $olderUsers;

    }

    /**
     * Display African users
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchAfricanUsers()
    {
        $africanUsers = User::withoutGlobalScope(VerifiedUsers::class, OlderUsers::class)->latest()->paginate(10);

        return $africanUsers;

    }

    /**
     * Display users by gender
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchUsersByGender()
    {
        $users = User::withoutGlobalScopes()->ofGender('female')->latest()->paginate();

        return $users;

    }
}
