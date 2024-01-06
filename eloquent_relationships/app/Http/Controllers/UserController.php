<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;



class UserController extends Controller
{
    public function index(){

          $users=User::all();
        return view("usersViews.addUser",["users"=>$users]);
    }

    public function create(Request $request)
{
    // Validación de datos
    $request->validate([
        'name' => 'required|string',
        'age' => 'required|integer',
        'email' => 'required|email',
        'date_of_birth' => 'required|date',
        'gender' => 'required|in:male,female,other',
    ]);

    User::create([
        'name' => $request->name,
        'age' => $request->age,
        'email' => $request->email,
        'date_of_birth' => $request->date_of_birth,
        'gender' => $request->gender,
    ]);

    return redirect()->route('user'); 
}

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('usersViews.editUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('user');

    }
    public function show($user_id){
        $posts= Post::where('user_id', $user_id)->orderBy('post')->get();
        return $posts;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back();


    }
}
