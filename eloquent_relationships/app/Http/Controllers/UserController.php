<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index(){

          $users=User::all();
        return view("usersViews.addUser",["users"=>$users]);
    }

    public function create(Request $request)
    {
        
        User::create([
            'name' => $request->name,
        ]);

        return redirect()->route('user');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('editUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
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
