<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class GraduateController extends Controller
{
    public function index()
    {
        return view("index", ["users" => User::paginate(20, ["avatar", "group", "name", "surname", "id"])]);
    }

    public function table()
    {
        return view("table", ["users" => User::paginate(40), "search" => null]);
    }

    public function show(User $user)
    {
        return view("profilies.show", compact("user"));
    }

    public function edit(User $user)
    {
        return view("profilies.edit", compact("user"));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            "name" => ["required", "max:255", "string"],
            "surname" => ["required", "max:255", "string"],
            "fathername" => ["required", "max:255", "string"],
            "faculty" => ["required", "max:255", "string"],
            "specialty" => ["required", "max:255", "string"],
            "cathedra" => ["required", "max:255", "string"],
            "group" => ["required", "max:255", "string"],
            "workplace" => ["required", "max:255", "string"],
            "avatar" => ["file"],
        ]);

        if (request("about")) {
            $attributes["about"] = request("about");
        }

        if (request("avatar")) {
            $attributes["avatar"] = request("avatar")->store("avatar");
        }


        $user->update($attributes);

        return redirect(route("profile", $user));
    }

    public function create()
    {
        return view("modals.create");
    }

    public function delete(User $user)
    {
        $user->delete();
        $id = $user->id;
        return Response::json(["id" => $id]);
    }
}
