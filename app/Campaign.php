<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    
 	    public static function userCamps()

    {
    	return static::where('campaign_owner', '=', \Auth::user()->id)->get();
    }


    public $timestamps = false;


	protected $primaryKey = 'campaign_id';

    public function characters()
    {
        return $this->hasMany('App\Character', 'campaign_id');
    }


