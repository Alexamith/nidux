<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\UserApiController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $apiController;
    public function __construct() {
        $this->apiController = new UserApiController;
    }
    public function index()
    {
        $users = $this->apiController->getAllUsers();
        return view('users.index', compact('users'));
    }
    public function newUserView()
    {
        return view('users.register');
    }


    public function store(Request $request){
        $user = $this->apiController->register($request);
        if ($user) {
            return $this->index();
        }
    }
    public function edit(Request $request){
        $user = $this->apiController->edit($request);

        if ($user) {
            $users = $this->apiController->getAllUsers();
            $message = 'El usuario se editó con éxito';
            return view('users.index', compact('users','message'));
        }
    }

    public function getById($id)
    {
       $user = User::find($id);
       if ($user) {
            return view('users.editRegister', compact('user'));
        }
    }
    public function delete($id){
        $user = $this->apiController->delete($id);
        if ($user) {
            $users = $this->apiController->getAllUsers();
            $message = 'El usuario se eliminó con éxito';
            return view('users.index', compact('users','message'));
        }
    }


}
