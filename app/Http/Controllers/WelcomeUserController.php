<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUserController extends Controller
{
    //index
    public function Create_Name($name) {

            return "Tu nombre es: {$name}";
        
    }

    public function Create_Nickname($nickname = NULL) {

            return "Tu apodo es: {$nickname}";

    }
}
