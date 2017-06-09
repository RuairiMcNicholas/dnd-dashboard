<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    protected $primaryKey = 'char_id';

	protected $table = 'characters';

	public $timestamps = false;


	protected $fillable = [
        'player_id',
        'campaign_id',
        'character_name',
        'Race',
        'Class',
        'Level',
        'Strength',
        'Dexterity',
        'Constitution',
        'Intelligence',
        'Wisdom',
        'Charisma',
        'Proficiency',
        'Trained_Skills',
        'Languages',
        'Hit_Die',
        'HP'
    ];

    protected $guarded = ['char_id'];





    public static function userChars()

    {
    	return static::where('player_id', '=', \Auth::user()->id)->get();
    }



}


