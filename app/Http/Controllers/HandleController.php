<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HandleController extends Controller
{
    public function getRoles() {

    }

    public function passwordValid($string)
    {
        if (preg_match ("/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/", $string)) {
            return true;
        } else {
            return false;
        }
    }
}
