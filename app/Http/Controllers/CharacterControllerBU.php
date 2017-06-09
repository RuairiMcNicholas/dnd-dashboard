<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Character;
use auth;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class CharacterController extends Controller
{

	protected $primaryKey = 'char_id';



    public function viewCharacter ($char_id)

    {

    	$character = \DB::table('characters')->where('char_id', $char_id)->first();
    	
    	return view('pages.view-character', compact('character') );


    }


    public function deleteCharacter ($char_delete_id)

    {


        $delCharacterUserID = \DB::table('characters')->where('char_id', $char_delete_id)->value('player_id');
        $dCUID = (int)$delCharacterUserID;
        $userID = Auth::user()->id;

        if ($userID == $dCUID) {

        	$today = date("Y-m-d H:i:s"); 

        	$delCharacter = \DB::table('characters')->where('char_id', $char_delete_id)->update(['deleted_at' => $today	]);

        	$delCharacterName = \DB::table('characters')->where('char_id', $char_delete_id)->value('character_name');

        	$characters = Character::userChars();

        	$deleteSuccess = 1;


            \Session::flash('flash_delete_success', $deleteSuccess);
            \Session::flash('flash_deleted_name', $delCharacterName );

    		return redirect('/characters')->with('deleteSuccess', $deleteSuccess); 

        }

        else {


            $today = date("Y-m-d H:i:s"); 

            $delCharacter = " ";

            $delCharacterName = " ";

            $characters = " ";

            $deleteSuccess = 0;

            \Session::flash('flash_delete_success', $deleteSuccess);


            return redirect('/characters')->with('deleteSuccess', $deleteSuccess); 

        }



    }


    public function index()
    {
    	
	$characters = Character::userChars();

	return view('pages.characters', compact('characters') );


    }


    public function count()
    {
    	
	$characters = Character::userChars();
	$charNum = $characters->count();

	return view('pages.dashboard', compact('characters', 'charNum') );




    }



    public function create()
    {




	return view('pages.create-char');

    }



  

    public function store()
    {

    	$p_id = \Auth::user()->id;

    	$new_character = new \App\Character;

    	$new_character->player_id = $p_id;

		$new_character->campaign_id = 1;

		$new_character->character_name = request('characterName');

		$new_character->Race = request('race');

        $new_character->Sub_Race = request('subRaceField');

		$new_character->Class = request('class');

		$new_character->Level = request('level');

		$new_character->Strength = request('strength');

		$new_character->Dexterity = request('dexterity');

		$new_character->Constitution = request('constitution');

		$new_character->Intelligence = request('intelligence');

		$new_character->Wisdom = request('wisdom');

		$new_character->Charisma = request('charisma');

		$new_character->Proficiency = 1;


		$new_character->Trained_Skills = request('skillsField');

		$new_character->Languages = request('languagesField');


		$new_character->Hit_Die = 1;

		$new_character->HP = 1;

		$new_character->save();

		return redirect('./characters');

    }


    public function deleted()
    {
        
        $deletedChars = \DB::table('characters')->where('deleted_at', '!=', null)->get();

        return view('pages.deleted-chars', compact('deletedChars') );


    }



    public function restoreCharacter($char_restore_id)
    {

        $restoreCharUserID = \DB::table('characters')->where('char_id', $char_restore_id)->value('player_id');
        $rCUID = (int)$restoreCharUserID;
        $userID = Auth::user()->id;

        if ($userID == $rCUID) {

            $restoreChar = \DB::table('characters')->where('char_id', $char_restore_id)->update(['deleted_at' => NULL ]);

            $restoreCharName = \DB::table('characters')->where('char_id', $char_restore_id)->value('character_name');

            $characters = Character::userChars();

            $restoreSuccess = 1;


            \Session::flash('flash_restore_success', $restoreSuccess);
            \Session::flash('flash_restore_name', $restoreCharName );

            return redirect('/characters/deleted')->with('restoreSuccess', $restoreSuccess); 

        }

        else {


            $restoreSuccess = 0;

            \Session::flash('flash_restore_success', $restoreSuccess);


            return redirect('/characters/deleted')->with('restoreSuccess', $restoreSuccess); 

        }




    }


        public function pDeleteCharacter($char_pDelete_id)
    {

        $pDeleteCharUserID = \DB::table('characters')->where('char_id', $char_pDelete_id)->value('player_id');
        $pDCUID = (int)$pDeleteCharUserID;
        $userID = Auth::user()->id;

        if ($userID == $pDCUID) {

            $pDeleteCharName = \DB::table('characters')->where('char_id', $char_pDelete_id)->value('character_name');

            $characters = Character::userChars();

        

            $pDeleteChar = \DB::table('characters')->where('char_id', $char_pDelete_id)->delete();
            $pDeleteSuccess = 1;

            \Session::flash('flash_pDelete_success', $pDeleteSuccess);
            \Session::flash('flash_pDelete_name', $pDeleteCharName );

            return redirect('/deleted-characters')->with('pDeleteSuccess', $pDeleteSuccess); 

        }

        else {


            $pDeleteSuccess = 0;

            \Session::flash('flash_pDelete_success', $pDeleteSuccess);


            return redirect('/deleted-characters')->with('pDeleteSuccess', $pDeleteSuccess); 

        }




    }


 		
}

