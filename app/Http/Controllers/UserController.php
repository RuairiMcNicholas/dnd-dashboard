<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class UserController extends Controller
{


	public function index()
	    {
	    	
		$user = Users::getUser();


	    }



}