<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequestRegister;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    use ApiResponser;

    public function register(UserRequestRegister $request){
        $payload = $request->all();
        $payload['password'] = Hash::make($payload['password']);
        $user = User::create($payload);

        if(!$user){
            $this->error("Não foi possível criar um usuário, por favor entre em contato conosco.", 500);
        }
        return $this->response()->json(['user' => $user]);
    }
}
