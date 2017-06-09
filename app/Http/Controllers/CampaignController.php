<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Campaign;

class CampaignController extends Controller
{
    public function index()
    {



	$campaigns = Campaign::userCamps();

	return view('pages.campaigns', compact('campaigns') );


    }


   

 		
}
