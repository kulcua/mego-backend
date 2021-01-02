<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',
            'phone' => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json(['messasge' => 'Bad Request'], 400);
        }

        $user = new UserModel();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role_id = 2; //always create user with role = 2
        $user->save();

        return response()->json(['message' => 'User create successfully'], 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['messasge' => 'Check Email'], 400);
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials))
        {
            return response()->json(['credentials' => Auth::attempt($credentials), 'message' => 'email or password error'], 500);
        }

        $user = UserModel::where('email', $request->email)->first();

        $tokenResult = $user->createToken('authToken')->plainTextToken;

        return response()->json(['token' => $tokenResult, 'user' => $user], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Token Deleted'], 200);
    }

    public function redirectToProvider()
    {
        //stateless not error
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        return response()->json(['user' => $authUser], 200);
    }

    public function findOrCreateUser($user)
    {
        $authUser = UserModel::where('email', $user->email)->first();

        if ($authUser)
            return $authUser;

        return UserModel::create([
            'name' => $user->name,
            'email' => $user->email,
            'provider' => 'google',
        ]);
    }
}