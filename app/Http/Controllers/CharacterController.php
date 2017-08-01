<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Character;
use auth;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use mikehaertl\pdftk\Pdf;


class CharacterController extends Controller
{
	protected $primaryKey = 'char_id';

    public function viewCharacter ($char_id)

    {
    	$character = \DB::table('characters')->where('char_id', $char_id)->first();

        $campaignID = \DB::table('characters')->where('char_id', $char_id)->value("campaign_id");

        $campaign_name = \DB::table('campaigns')->where('campaign_id', $campaignID)->value("campaign_name");
    	
    	return view('pages.view-character', compact('character', 'campaign_name') );


    }

    public function editCharacter ($char_id)

    {

        $character = \DB::table('characters')->where('char_id', $char_id)->first();

        $campaignID = \DB::table('characters')->where('char_id', $char_id)->value("campaign_id");

        $campaign_name = \DB::table('campaigns')->where('campaign_id', $campaignID)->value("campaign_name");
        
        return view('pages.edit-char', compact('character', 'campaign_name') );


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
    
    if (Auth::check()) {

	$characters = Character::userChars();

	return view('pages.characters', compact('characters') );

    }

    else {
        return view('pages.must-login');
    }


    }


    public function printCharacter($char_print_id) 

        {


        $printCharacterUserID = \DB::table('characters')->where('char_id', $char_print_id)->value('player_id');
        $pCUID = (int)$printCharacterUserID;
        $userID = Auth::user()->id;
        $userName = Auth::user()->name;
        $character = \DB::table('characters')->where('char_id', $char_print_id)->first();

        if ($userID == $pCUID) {

            

            // Fill form with data array
            $pdf = new Pdf('/var/www/html/dnd-dashboard/dnd-dashboard/public/pdfs/form-fillable-char-sheet.pdf');
            $pdf->fillForm(array(
                    'CharacterName'=>$character->character_name,       
                    'ClassLevel'=>$character->Level,  
                    'Background'=>$character->Background,   
                    'PlayerName'=> $userName, 
                    'Race'=>$character->Race, 
                    'Alignment'=>$character->Alignment, 
                    'XP'=>0, 
                    'Prc'=>$character->Proficiency, 
                    'PersonalityTraits'=>$character->personality_traits, 
                    'Ideals'=>$character->ideals, 
                    'Bonds'=>$character->bonds, 
                    'Flaws'=>$character->flaws, 
                    'STR'=>$character->Strength, 

                       ))
            ->needAppearances()
            ->send('Character Sheet - '.$character->character_name.'.pdf');

        

            // Check for errors
            if (!$pdf->saveAs('Character Sheet - '.$character->character_name.'.pdf')) {
                $error = $pdf->getError();
                echo('<h2>'.$error.'</h2>');
            }

            //return redirect('/dashboard');

        }

        else {

            return view('pages.must-login');

        }



    }




    public function count()
    {
        
    if (Auth::check()) {
        
        $characters = Character::userChars();
        $charNum = $characters->count();

        return view('pages.dashboard', compact('characters', 'charNum') );

    } else {
        return view('pages.dashboard');
    }


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

        $levelVar = request('level');

        if ($levelVar >= 4) {
		$new_character->Proficiency = 2;
        } else if ($levelVar >= 8) {
        $new_character->Proficiency = 3;
        } else if ($levelVar >= 12) {
        $new_character->Proficiency = 4;
        } else if ($levelVar >= 16) {
        $new_character->Proficiency = 5;
        } else if ($levelVar >= 20) {
        $new_character->Proficiency = 6;
        } else if ($levelVar <= 21) {
        $new_character->Proficiency = 6;
        };


		$new_character->Trained_Skills = request('skillsField');

		$new_character->Languages = request('languagesField');

        $hitDie1 = request('hitDice1');
        $hitDie2 = request('hitDice2');

        $hitDice = ($hitDie1 . "d" . $hitDie2);

		$new_character->Hit_Die = $hitDice;

		$new_character->max_HP = request('max-hp');

        $new_character->Alignment = request('alignment');

        $new_character->Armor_Class = request('armor-class');

        $new_character->Initiative = request('initiative');

        $new_character->Speed = request('speed');

        $new_character->Background = request('background');

        $new_character->proficiencies = request('wep-tool-profs');

        $new_character->features_traits = request('features-traits');

        $new_character->personality_traits = request('personality-traits');

        $new_character->ideals = request('ideals');

        $new_character->bonds = request('bonds');

        $new_character->flaws = request('flaws');



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

    public function commitEdit ($char_edit_id) 
    {
        
        $CharUserID = \DB::table('characters')->where('char_id', $char_edit_id)->value('player_id');
        $charEditUID = (int)$CharUserID;
        $userID = Auth::user()->id;


        if ($userID == $charEditUID) {



        $edited_character = Character::where('char_id', $char_edit_id)->first();


        $edited_character->campaign_id = 1;

        $edited_character->character_name = request('characterName');

        $edited_character->Race = request('race');

        $edited_character->Sub_Race = request('subRaceField');

        $edited_character->Class = request('class');

        $edited_character->Level = request('level');

        $edited_character->Strength = request('strength');

        $edited_character->Dexterity = request('dexterity');

        $edited_character->Constitution = request('constitution');

        $edited_character->Intelligence = request('intelligence');

        $edited_character->Wisdom = request('wisdom');

        $edited_character->Charisma = request('charisma');

        $levelVar = request('level');

        if ($levelVar >= 4) {
        $edited_character->Proficiency = 2;
        } else if ($levelVar >= 8) {
        $edited_character->Proficiency = 3;
        }


        $edited_character->Trained_Skills = request('skillsField');

        $edited_character->Languages = request('languagesField');


        $edited_character->Hit_Die = 1;

        $edited_character->max_HP = request('max-hp');

        $edited_character->Alignment = request('alignment');

        $edited_character->Armor_Class = request('armor-class');

        $edited_character->Initiative = request('initiative');

        $edited_character->Speed = request('speed');

        $edited_character->Background = request('background');



        $edited_character->update();

        $editSuccess = 1;

        $editCharName = $edited_character->character_name;


        \Session::flash('flash_edit_success', $editSuccess);
        \Session::flash('flash_edit_name', $editCharName );

        return redirect('/characters')->with('editSuccess', $editSuccess); 





        } else {




        }





    }


 		
}

