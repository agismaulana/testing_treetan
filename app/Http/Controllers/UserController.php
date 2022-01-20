<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();

        return response()->json(['error' => false, 'data' => $data, 'message' => 'User List Successfully'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|unique:users',
            'password' => 'required|min:3',
        ], [
            'name.required' => 'Name Has Been Required!!',
            'name.min' => 'Name Too Short!!',
            'email.required' => 'Email Has Been Required!!',
            'email.unique' => 'Email Already Exists!!',
            'password.required' => 'Password Has Been Required!!',
            'password.min' => 'Password Too Short!!',
        ]);

        if($validator->fails()) {
            return response()->json(['error' => true, 'message' => $validator->customMessages], 408);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10),
        ];

        $create = User::create($data);
        if($create) {
            return response()->json(['error' => false, 'message' => 'User Created Successfully!!'], 302);
        } else {
            return response()->json(['error' => true, 'message' => 'User Created Failed!!'], 408);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        if($user) {
            return response()->json(['error' => false, 'data' => $user, 'message' => 'Your Successfully Find User!!'], 200);
        } else {
            return response()->json(['error' => true, 'data' => $user, 'message' => 'User Not Found'], 408);
        }
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
        $checkUser = User::findOrFail($id);
        if($checkUser) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3',
                'email' => 'required|min:3',
                'password' => 'required',
            ]);

            if($validator->fails()) {
                return response()->json(['error' => true, 'message' => 'Something Went Wrong In Yout Input!!!'], 408);
            }
            
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];

            $update = User::findOrFail($id)->update($data);
            return response()->json(['error' => false, 'message' => 'User Updated Successfully!!'], 200);
        } else {
            return response()->json(['error' => true, 'message' => 'User Not Found!!'], 408);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkUser = User::findOrFail($id);
        if($checkUser) {
            $update = User::findOrFail($id)->delete();
            return response()->json(['error' => false, 'message' => 'User Deleted Successfully!!'], 200);
        } else {
            return response()->json(['error' => true, 'message' => 'User Not Found!!'], 408);
        }
    }
}
