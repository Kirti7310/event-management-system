<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        //
    }

    public function register(Request $request)
    {

        $request->validate
        ([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',

        ]);

        DB::insert("INSERT INTO users(name,email,password,created_at,updated_at) VALUE (?,?,?,NOW(),NOW())",
        [
            $request->name,
            $request->email,
            Hash::make($request->password), 
        ]);

        return response()->json([
            "Success"=>"Users Added Successfully!!"
        ]);

    }

    public function login(Request $request)
    {
        $user = User::where('email',$request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('auth_token')->plainTextToken;
            
            return response()->json(['Token' => $token]);
        }
        return response()->json(['Message'=>'Invalid Crednutials']);

    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
