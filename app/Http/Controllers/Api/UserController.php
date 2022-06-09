<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = new User($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message'=>'Registro de usuario exitoso'], 201);


    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email','=',$request->email)->first();
        if (isset($user->id)) {
            if (Hash::check($request->password, $user->password)) {
                # code...
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json(['message'=>'El usuario se logueó con éxito', 'access_token'=>$token],200);
            }else{
                return response()->json(['error'=>'la contraseña es incorrecta'], 404);
            }
        }
        else{
            return response()->json(['error'=>'El usuario no existe'],404);
        }
    }
    public function profile(){
        return response()->json([
            'message' => 'Información del usuario',
            'user' => auth()->user(),
        ], 200);
    }
    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logout con éxito',
        ], 200);
    }
}
