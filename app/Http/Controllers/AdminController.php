<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin", ["users" => User::paginate(40, ["id", "name", "surname"]), "roles" => Role::all(), "search" => null]);
    }

    public function edit(User $user)
    {
        return Response::json($user);
    }

    public function update(Request $request)
    {

        User::find($request->id)->update([
            "name" => $request->name,
            "surname" => $request->surname,
            "fathername" => $request->fathername,
            "faculty" => $request->faculty,
            "specialty" => $request->specialty,
            "cathedra" => $request->cathedra,
            "group" => $request->group,
            "workplace" => $request->workplace
        ]);

        return Response::json($request);
    }

    public function role(Request $request)
    {
        $user =  User::find($request->user_id);
        $role = Role::whereIn("id", $request->role_id)->get(["name"])->flatten()->pluck("name")->unique();
        $user->detachAllRoles();
        $user->assignRole(...$role);
        return Response::json(["names" => $user->roles->flatten()->pluck("name"), "id" => $user->id]);
    }
}
