<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{

    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function getById($id)
    {
        $user = User::find($id);
        return $user;
    }





    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        $user = new User($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return $user;
    }

    public function responseApiRegister(Request $request){
        $user = $this->register($request);
        if ($user) {
            return response()->json(['message'=>'Registro de usuario exitoso'], 201);
        }
    }

    public function edit(Request $request)
    {
        if ($request->id) {
            # code...
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
            ]);
            $user =  User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return true;
        }
        return false;
    }

    public function responseApiEdit(Request $request){
        $user = $this->edit($request);
        if ($user) {
            return response()->json(['message'=>'Edición de usuario exitoso'], 201);
        }
    }








    public function delete($id){

        $user =  User::find($id);
        $user->delete();
        return $user;
    }

    public function responseApiDelete($id){
        $user = $this->delete($id);
        if ($user) {
            return response()->json(['message'=>'Edición de usuario exitoso'], 201);
        }else{
            return response()->json(['message'=>'No se encontró el usuario'], 401);

        }
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
    public function getAllUsers(){
        $users = User::all();
        return $users;
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
