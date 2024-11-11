<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct(){
        $this->middleware('guest');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    
    protected function create(array $data){
        return User::create([
            'factory_id' => '1',
            'name' => $data['name'],
            'phone' => '+99 890 883 0450',
            'status' => 'true',
            'type' =>'admin',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
