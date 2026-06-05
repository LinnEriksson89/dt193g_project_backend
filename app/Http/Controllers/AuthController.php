<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //Register user
    public function register(Request $request)
    {
        //Validate input
        $request->validate([
            "name"     => "required|string|alpha_dash|min:4|max:32|unique:users,name",
            "email"    => "required|email|max:128|unique:users,email",
            "password" => "required|string|confirmed|different:name|min:12",
        ]);

        //Create user
        $user = User::create([
            "name"     => $request->name,
            "email"    => $request->email,
            "password" => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        //Return response and code 201 (created)
        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    //Log in user
    public function login(Request $request)
    {
        //Validate credentials
        $credentials = $request->validate([
            "email"    => "required|email",
            "password" => "required|",
        ]);

        //Attempt log in
        if (Auth::attempt($credentials, $request->boolean("remember"))) {

            //Set token
            $user = User::where("email", $request->email)->first();

            $token = $user->createToken("token")->plainTextToken;

             return response()->json([
                 "login" => "Inloggningen lyckades.",
                 "token" => $token
        ]);
        }

        return back()->withErrors(["login" => "Inloggningen misslyckades."]);

    }

    //Log out user
    public function logout(Request $request)
    {
        //Clear access token
        $request->user()->currentAccessToken()->delete();

        return response()->json([
        "message" => "Du har blivit utloggad."]);
    }
}
