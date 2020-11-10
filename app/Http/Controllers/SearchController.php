<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = User::search($request->name_search)->paginate(40);
        return view("table", ["users" => $search, "search" => $request->name_search]);
    }
    public function index_admin(Request $request)
    {
        $search = User::search($request->name_search)->paginate(40);
        return view("admin", ["users" => $search, "roles" => Role::all(), "search" => $request->name_search]);
    }
}
