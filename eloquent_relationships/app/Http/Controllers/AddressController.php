<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\User;



class AddressController extends Controller
{
    public function index(){

          $addresses=Address::all();
        return view("addressViews.addAddress",["addresses"=>$addresses]);
    }

    public function create(Request $request)
    {
        
        Address::create([
            'address' => $request->address,
        ]);

        return redirect()->route('address');
    }

    public function edit($id)
    {
        $user = Address::findOrFail($id);
        return view('editAddress', compact('addresses'));
    }

    public function update(Request $request, $id)
    {
        $addresses = Address::findOrFail($id);
        $addresses->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('address');

    }
    public function assingUser($id, Request $request){
        $addresses= Address::findOrFail($id);
        $user=User::where("name","like",$request->name)->get()->first();
        $addresses->user_id=$user->id;
        $addresses->save();
        $user->address_id=$addresses->id;
        $user->save();
        return redirect()->route('address');


    }

    public function showAssing($id){

        $address=Address::findOrFail($id);
        $users=User::all();
      return view("addressViews.assingAddress",["address"=>$address, "users"=>$users]);

  }

    public function destroy($id)
    {
        $addresses = Address::findOrFail($id);

        $addresses->delete();

        return redirect()->back();


    }
}
