<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index(){

          $users=User::all();
        return view("addUser",["users"=>$users]);
    }

    public function create(Request $request)
    {
        
        User::create([
            'name' => $request->name,
        ]);

        return redirect()->route('user');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back();


    }
}
