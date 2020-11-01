<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin", ["users" => User::paginate(40, ["id", "name", "surname"])]);
    }

    public function edit(User $user)
    {
        return Response::json($user);
    }

    public function update(User $user)
    {

        $attributes = request()->validate([
            "name" => ["required"],
            "surname" => ["required"],
            "fathername" => ["required"],
            "faculty" => ["required"],
            "specialty" => ["required"],
            "cathedra" => ["required"],
            "group" => ["required"],
            "workplace" => ["required"],
        ]);




        $user->update($attributes);

        return back();
    }
}
