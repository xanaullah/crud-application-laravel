<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Users;
use App\Models\user;
use App\Http\Controllers\save;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
     return view('register',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'Required|string',
            'email'=>'Required|String',
            'address'=>'Required|string',
            'mobile'=>'nullable|string|max:100'

        ]);
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->mobile=$request->mobile;
        $user->save(); 
        return redirect(route('register'))->with(['message' => 'sucessfully added']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users=User::all();
        return view('register'  , compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'nullable|string|max:100',
            'email'=>'nullable|string|unique:users,email,'.$id,
            'mobile'=>'nullable|string',
            'address'=>'nullable|string'

        ]);
        $user = User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->mobile=$request->mobile;
        $user->save(); 
        return redirect()->route('register');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id)
    {
     $data=user::find($id);
     $data->delete();
     return back();
    }
    public Function ShowData($id){
        $data= User::find($id);
        // dd($data);
        return view('update', ['data'=>$data]);
    }
}
