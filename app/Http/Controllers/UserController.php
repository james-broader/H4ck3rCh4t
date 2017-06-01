<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users,name',
        ]);

        $input = $request->all();

        $usr = new User;

        $usr->name = $input['name'];
        $usr->ip_address = \Request::ip();
        $usr->colour = '#cc0000';
        $usr->avatar = '1.png';

        $usr->save();

        return $usr;
    }
}
