<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class WelcomeController extends Controller
{
    public function index()
    {



	$campaigns = Campaign::userCamps();

	return view('pages.campaigns', compact('campaigns') );


    }


     public function welcome()
    {
        return view('welcome');
    }

 		
}
