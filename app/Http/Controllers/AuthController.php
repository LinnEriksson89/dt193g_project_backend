<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            "name"     => $validated["name"],
            "email"    => $validated["email"],
            "password" => Hash::make($validated["password"]),
        ]);

        //Log in user
        Auth::login($user);

        //Return response and code 201 (created)
        return response("Användaren har skapats.", 201);
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

            //Regenerate session
            $request->session()->regenerate();

            //Set token
            $user = User::where("email", $request->email)->first();

            $user->createToken('APITOKEN')->plainTextToken;

            return redirect()->intended("/start");
        }

        return back()->withErrors(["login" => "Inloggningen misslyckades."]);

    }

    //Log out user
    public function logout(Request $request)
    {
        Auth::logout();

        //Invalidate session and clear token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->user()->currentAccessToken()->delete();

        return redirect("/")->with("Du har blivit utloggad.");
    }
}
