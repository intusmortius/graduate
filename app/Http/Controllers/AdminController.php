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
}
