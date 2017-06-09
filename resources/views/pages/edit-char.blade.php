@extends('layouts.master')

@section('content')

<style type="text/css">
  .huge {
    font-size: 40px;
    display: inline-block;
    float: right;
}

.editor-area-h1 {
  padding-top: 50px;
  padding-bottom: 20px;
}

  
  .skill-checkbox {
    display: inline-block;
  }

  .skill-label{
    padding-top:10px;
    float:left;
  }

</style>

<script type="text/javascript"> 
$(document).ready(function(){
  $('.other-subrace').hide();
  $('.dwarf-subrace').hide();
  $('#validation-1-alert').hide();
  $('#rollStats4DropLowest').show();
  window.subRaceVar = "";

  $('#{{ $character->Class }}').attr('selected','selected'); //These 'selected' lines set the values of dropdown menus to the characters existing values, as per their DB row

  $('#{{ $character->Race }}').attr('selected','selected');

  $('#{{ $character->Alignment }}').attr('selected','selected');

  $('#{{ $character->Background }}').attr('selected','selected');


  var subRace = "{{ $character->Sub_Race}}";
  if (subRace == "None") {

  } else {
    $('#{{ $character->Race }}').attr('selected','selected');
  }



  skillsVar = [];  //Creates arrays for later holding the selected languages & skill, and then updatingthem
  langVar = [];


 /*These two blocks of code get the skills/languages from the characters DB row, as a string, creates an array from it, and loops through them all, checking their checkboxes,
 so that they show the characters current skills & languages  */
  var skillsArray = "{{ $character->Trained_Skills }}";   
  skillsArray = skillsArray.split(",");

  for (i=0; i < skillsArray.length; i++) {
    console.log(skillsArray[i]);
    $('#'+skillsArray[i]).attr('checked', true);
  }


  var languagesArray = "{{ $character->Languages }}";
  languagesArray = languagesArray.split(",");

  for (i=0; i < languagesArray.length; i++) {
    console.log(languagesArray[i]);
    $('#'+languagesArray[i]).attr('checked', true);
  }


 // This block of code handles detecting the characters sub race, if any, and showing the sub-race field - all of them are hidden by default and this shows the correct one
 window.openingRace = "{{ $character->Race }}";
    if (window.openingRace != "Aasimar" && window.openingRace != "Dwarf" && window.openingRace != "Elf" && window.openingRace != "Genasi" && window.openingRace != "Gnome" && window.openingRace != "Halfling") {
      console.log("Race with no subrace selected");
    } else {
        window.openingRace = window.openingRace.toLowerCase();
        window.openingRace = window.openingRace +"-subrace";
        $('#'+window.openingRace).show();
        console.log(window.openingRace);
        window.subRaceVar = window.openingRace;
    }



}) 

</script>





<div id="page-wrapper">

  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">

      <!-- This Laravel @if will only allow you to view & edit a character if it belongs to the logged in user -->
        @if ($character->player_id != \Auth::user()->id)

            <p>Could not find character.</p>

         @else

          <h1 class="page-header">
                  <b>Edit Character:</b> {{ $character->character_name }}
          </h1>

          <!-- This clusterf*ck of code turns a stat number - eg 20 - into its modifier - 5. *TODO* Needs to be improved and moved to an include  -->
          <div style="display:none;">
           <!-- STRENGTH -->
              @php($strVal = $character->Strength)
              
              @php($strMod = 0)

              <?php 
                  if ($strVal == 6 || $strVal == 7) {

                             $strMod = -2;
            } elseif ($strVal == 8 || $strVal == 9) {

                $strMod = -1;   
            } elseif ($strVal == 10 || $strVal == 11) {

                $strMod = 0;    
                          } elseif ($strVal == 12 || $strVal == 13) {

                              $strMod = "+1";
                          } elseif ($strVal == 14 || $strVal == 15) {
                              $strMod ="2";

                          } elseif ($strVal == 16 || $strVal == 17) {
                $strMod = "+3";
                          
            } elseif ($strVal == 18 || $strVal == 19) {
                $strMod = "+4";
            }
             elseif ($strVal == 19 || $strVal == 20) {
                $strMod = "+5";
            }
            elseif ($strVal == 21 || $strVal == 22) {
              $strMod = "+6"; }

            elseif ($strVal == 23 || $strVal == 24) {
                $strMod = "+7";    
              }
              ?>


           <!-- DEXTERITY -->
            @php($dexVal = $character->Dexterity)
            
            @php($dexMod = 0)

            <?php 
              if ($dexVal == 6 || $dexVal == 7) {

               $dexMod = -2;
            } elseif ($dexVal == 8 || $dexVal == 9) {

                $dexMod = -1;   
            } elseif ($dexVal == 10 || $dexVal == 11) {

                $dexMod = 0;    
            } elseif ($dexVal == 12 || $dexVal == 13) {

                $dexMod = "+1";
            } elseif ($dexVal == 14 || $dexVal == 15) {
                $dexMod = "+2";

            } elseif ($dexVal == 16 || $dexVal == 17) {
                $dexMod = "+3";
            
            } elseif ($dexVal == 18 || $dexVal == 19) {
                $dexMod = "+4";
            }
             elseif ($dexVal == 19 || $dexVal == 20) {
                $dexMod = "+5";
            }
            elseif ($dexVal == 21 || $dexVal == 22) {
              $dexMod = "+6"; }

            elseif ($dexVal == 23 || $dexVal == 24) {
                $dexMod = "+7";    
              }
            ?>

            <!-- CONSTITUTION -->
            @php($conVal = $character->Constitution)
            
            @php($conMod = 0)

            <?php 
              if ($conVal == 6 || $conVal == 7) {

               $conMod = -2;
            } elseif ($conVal == 8 || $conVal == 9) {

                $conMod = -1;   
            } elseif ($conVal == 10 || $conVal == 11) {

                $conMod = 0;    
            } elseif ($conVal == 12 || $conVal == 13) {

                $conMod = "+1";
            } elseif ($conVal == 14 || $conVal == 15) {
                $conMod = "+2";

            } elseif ($conVal == 16 || $conVal == 17) {
                $conMod = "+3";
            
            } elseif ($conVal == 18 || $conVal == 19) {
                $conMod = "+4";
            }
             elseif ($conVal == 19 || $conVal == 20) {
                $conMod = "+5";
            }
            elseif ($conVal == 21 || $conVal == 22) {
              $conMod = "+6"; }

            elseif ($conVal == 23 || $conVal == 24) {
                $conMod = "+7";    
              }
            ?>

            <!-- INTELLIGENCE -->
            @php($intVal = $character->Intelligence)
            
            @php($intMod = 0)

            <?php 
              if ($intVal == 6 || $intVal == 7) {

               $intMod = -2;
            } elseif ($intVal == 8 || $intVal == 9) {

                $intMod = -1;   
            } elseif ($intVal == 10 || $intVal == 11) {

                $intMod = 0;    
            } elseif ($intVal == 12 || $intVal == 13) {

                $intMod = "+1";
            } elseif ($intVal == 14 || $intVal == 15) {
                $intMod = "+2";

            } elseif ($intVal == 16 || $intVal == 17) {
                $intMod = "+3";
            
            } elseif ($intVal == 18 || $intVal == 19) {
                $intMod = "+4";
            }
             elseif ($intVal == 19 || $intVal == 20) {
                $intMod = "+5";
            }
            elseif ($intVal == 21 || $intVal == 22) {
              $intMod = "+6"; }

            elseif ($intVal == 23 || $intVal == 24) {
                $intMod = "+7";    
              }
            ?>

            <!-- WISDOM -->
            @php($wisVal = $character->Wisdom)
            
            @php($wisMod = 0)

            <?php 
              if ($wisVal == 6 || $wisVal == 7) {

               $wisMod = -2;
            } elseif ($wisVal == 8 || $wisVal == 9) {

                $wisMod = -1;   
            } elseif ($wisVal == 10 || $wisVal == 11) {

                $wisMod = 0;    
            } elseif ($wisVal == 12 || $wisVal == 13) {

                $wisMod = "+1";
            } elseif ($wisVal == 14 || $wisVal == 15) {
                $wisMod = "+2";

            } elseif ($wisVal == 16 || $wisVal == 17) {
                $wisMod = "+3";
            
            } elseif ($wisVal == 18 || $wisVal == 19) {
                $wisMod = "+4";
            }
             elseif ($wisVal == 19 || $wisVal == 20) {
                $wisMod = "+5";
            }
            elseif ($wisVal == 21 || $wisVal == 22) {
              $wisMod = "+6"; }

            elseif ($wisVal == 23 || $wisVal == 24) {
                $wisMod = "+7";    
              }
            ?>

            <!-- CHARISMA -->
            @php($chaVal = $character->Charisma)
            
            @php($chaMod = 0)

            <?php 
              if ($chaVal == 6 || $chaVal == 7) {

               $chaMod = -2;
            } elseif ($chaVal == 8 || $chaVal == 9) {

                $chaMod = -1;   
            } elseif ($chaVal == 10 || $chaVal == 11) {

                $chaMod = 0;    
            } elseif ($chaVal == 12 || $chaVal == 13) {

                $chaMod = "+1";
            } elseif ($chaVal == 14 || $chaVal == 15) {
                $chaMod = "+2";

            } elseif ($chaVal == 16 || $chaVal == 17) {
                $chaMod = "+3";
            
            } elseif ($chaVal == 18 || $chaVal == 19) {
                $chaMod = "+4";
            }
             elseif ($chaVal == 19 || $chaVal == 20) {
                $chaMod = "+5";
            }
            elseif ($chaVal == 21 || $chaVal == 22) {
              $chaMod = "+6"; }

            elseif ($chaVal == 23 || $chaVal == 24) {
                $chaMod = "+7";    
              }
            ?>

          </div>

          <form method="POST" action="/dndlaravel/dndlaravel/public/characters/commit_edit/{{ $character->char_id }}" name="CharForm" id="editChar">

          {{ csrf_field() }} <!-- This submits a token request, it's a Laravel security feature -->
            <div id="char-create-part-1">
              <div class="form-group">
                <label for="exampleInputEmail1">Character Name:</label>
                <input type="text" class="form-control" id="characterName" placeholder="Leroy Jenkins" name="characterName" required value="{{ $character->character_name }}">
              </div>

              

              <div class="form-group">
                <label for="class">Class:</label>
                    <select name="class" class="form-control" required selected="{{ $character->Class }}">
                      <option id="Barbarian" value="Barbarian">Barbarian</option>
                      <option id="Bard" value="Bard">Bard</option>
                      <option id="Cleric" value="Cleric">Cleric</option>
                      <option id="Druid" value="Druid">Druid</option>
                      <option id="Fighter" value="Fighter">Fighter</option>
                      <option id="Monk" value="Monk">Monk</option>
                      <option id="Paladin" value="Paladin">Paladin</option>
                      <option id="Ranger" value="Ranger">Ranger</option>
                      <option id="Rogue" value="Rogue">Rogue</option>
                      <option id="Sorcerer" value="Sorcerer">Sorcerer</option>
                      <option id="Warlock" value="Warlock">Warlock</option>
                      <option id="Wizard" value="Wizard">Wizard</option>
                    </select>
              </div>

              <div class="form-group">
                <label for="race">Race:</label>
                    <select id="race" name="race" class="form-control" required selected="{{ $character->Race  }}">
                      <option id="Aarakockra" value="Aarakockra">Aarakockra</option>
                      <option id="Aasimar" value="Aasimar">Aasimar</option>
                      <option id="Bugbear" value="Bugbear">Bugbear</option>
                      <option id="Dragonborn" value="Dragonborn">Dragonborn</option>
                      <option id="Dwarf" value="Dwarf">Dwarf</option>
                      <option id="Elf" value="Elf">Elf</option>
                      <option id="Firbolg" value="Firbolg">Firbolg</option>
                      <option id="Genasi" value="Genasi">Genasi</option>
                      <option id="Gnome" value="Gnome">Gnome</option>
                      <option id="Goblin" value="Goblin">Goblin</option>
                      <option id="Goliath" value="Goliath">Goliath</option>
                      <option id="Half-Elf" value="Half-Elf">Half-Elf</option>
                      <option id="Half-Orc" value="Half-Orc">Half-Orc</option>
                      <option id="Halfling" value="Halfling">Halfling</option>
                      <option id="Hobgoblin" value="Hobgoblin">Hobgoblin</option>
                      <option id="Human" value="Human">Human</option>
                      <option id="Kenku" value="Kenku">Kenku</option>
                      <option id="Kobold" value="Kobold">Kobold</option>
                      <option id="Lizardfolk" value="Lizardfolk">Lizardfolk</option>
                      <option id="Orc" value="Orc">Orc</option>
                      <option id="Tabaxi" value="Tabaxi">Tabaxi</option>
                      <option id="Tiefling" value="Tiefling">Tiefling</option>
                      <option id="Triton" value="Triton">Triton</option>
                      <option id="Yuan-Ti" value="Yuan-Ti">Yuan-Ti</option>
                    </select>
              </div>

            <div id="sub-race-divs">
              <!-- AASIMAR Subrace  -->
              <!-- There is a Subrace script for every subrace. It will show that subraces div if the corresponding race is shown -->
              <!-- eg: If "Race" is "Aasimar", the Aasimar sub-race dropdown will be shown -->

              <script type="text/javascript"> 
                $('#race').change(function(){
                  if($(this).val() != 'Aasimar'){ /
                    $('#aasimar-subrace').hide();
                  } else {
                      $('#aasimar-subrace').show();
                      window.subRaceVar = "sub-Aasimar";
                  }
                });
              </script>

              
                <div class="form-group dwarf-subrace" id="aasimar-subrace">
                  <label  for="subrace">Sub-Race:</label>
                      <select id="sub-Aasimar" name="subrace" class="form-control">
                        <option value="Protector">Protector</option>
                        <option value="Scourge">Scourge</option>
                        <option value="Fallen">Fallen</option>
                      </select>
                </div>


                <!-- DWARF Subrace -->


                <script type="text/javascript"> 
                  $('#race').change(function(){
                    if($(this).val() != 'Dwarf'){ 
                      $('#dwarf-subrace').hide();
                    } else {
                        $('#dwarf-subrace').show();
                        window.subRaceVar = "sub-Dwarf";
                    }
                  });
                </script>

               
                <div class="form-group dwarf-subrace" id="dwarf-subrace">
                  <label id="dwarf-label" for="subrace">Sub-Race:</label>
                      <select id="sub-Dwarf" name="subrace" class="form-control">
                        <option id="Hill Dwarf" value="Hill Dwarf">Hill Dwarf</option>
                        <option id="Mountain Dwarf" value="Mountain Dwarf">Mountain Dwarf</option>
                        <option id="Gray Dwarf" value="Gray Dwarf">Gray Dwarf</option>
                      </select>
                </div>



                  <!-- ELF Subrace  -->


                <script type="text/javascript"> 
                  $('#race').change(function(){
                    if($(this).val() != 'Elf'){ 
                      $('#elf-subrace').hide();
                      window.subraceValue = "elf";
                    } else {
                        $('#elf-subrace').show();
                        window.subRaceVar = "sub-Elf";
                    }
                  });
                </script>

                   
                <div class="form-group other-subrace" id="elf-subrace">
                  <label for="subrace">Sub-Race:</label>
                      <select id="sub-Elf" name="subrace" class="form-control" id="ElfSubSelect">
                        <option id="High Elf" value="High Elf">High Elf</option>
                        <option id="Wood Elf" value="Wood Elf">Wood Elf</option>
                        <option id="Drow" value="Drow">Drow</option>
                      </select>
                </div>



                  <!-- GENASI Subrace -->


                <script type="text/javascript"> 
                  $('#race').change(function(){
                    if($(this).val() != 'Genasi'){ 
                      $('#genasi-subrace').hide();
                    } else {
                        $('#genasi-subrace').show();
                        window.subRaceVar = "sub-Genasi";
                    }
                  });
                </script>

                   
                <div class="form-group other-subrace" id="genasi-subrace">
                  <label for="subrace">Sub-Race:</label>
                      <select id="sub-Genasi" name="subrace" class="form-control" >
                        <option id="Air Genasi" value="Air Genasi">Air Genasi</option>
                        <option id="Earth Genasi" value="Earth Genasi">Earth Genasi</option>
                        <option id="Fire Genasi" value="Drow">Fire Genasi</option>
                        <option id="Water Genasi" value="Drow">Water Genasi</option>
                      </select>
                </div>


                    <!-- GNOME Subrace -->


                <script type="text/javascript"> 
                  $('#race').change(function(){
                    if($(this).val() != 'Gnome'){ 
                      $('#gnome-subrace').hide();
                    } else {
                        $('#gnome-subrace').show();
                        window.subRaceVar = "sub-Gnome";
                    }
                  });
                </script>

                   
                <div class="form-group other-subrace" id="gnome-subrace">
                  <label for="subrace">Sub-Race:</label>
                      <select id="sub-Gnome" name="subrace" class="form-control">
                        <option id="Forest Gnome" value="Forest Gnome">Forest Gnome</option>
                        <option id="Rock Gnome" value="Rock Gnome">Rock Gnome</option>
                        <option id="Deep Gnome" value="Deep Gnome">Deep Gnome</option>
                      </select>
                </div>


                      <!-- HALFLING Subrace -->


                <script type="text/javascript"> 
                  $('#race').change(function(){
                    if($(this).val() != 'Halfling'){ 
                      $('#halfling-subrace').hide();
                    } else {
                        $('#halfling-subrace').show();
                        window.subRaceVar = "sub-Halfling";
                    }
                  });
                </script>

                   
                <div class="form-group other-subrace" >
                  <label for="subrace">Sub-Race:</label>
                      <select id="sub-Halfling" name="subrace" class="form-control" id="halfling-subrace">
                        <option id="Lightfoot Halfling" value="Lightfoot Halfling">Lightfoot Halfling</option>
                        <option id="Stout Halfling" value="Stout Halfling">Stout Halfling</option>
                      </select>
                </div>
              </div>




              <div class="form-group">
                <label for="level">Level:</label>
                <input type="text" class="form-control" id="level" placeholder="" name="level" required value=" {{ $character->Level }} ">
              </div>

            </div>

            <h1 class="editor-area-h1"><b>Stats:</b></h1>

            <div id="char-create-part-2">
              <div class="form-group">
                <label for="strength">Strength:<sup>*</sup></label>
                <input type="text" class="form-control" id="strength" placeholder="" name="strength" value=" {{$character->Strength }}"> 
              </div>


              <div class="form-group">
                <label for="dexterity">Dexterity:<sup>*</sup></label>
                <input type="text" class="form-control" id="dexterity" placeholder="" name="dexterity" value=" {{$character->Dexterity }}">
              </div>


              <div class="form-group">
                <label for="constitution">Constitution:*</label>
                <input type="text" class="form-control" id="constitution" placeholder="" name="constitution" value=" {{$character->Constitution }}">
              </div>


              <div class="form-group">
                <label for="intelligence">Intelligence:*</label>
                <input type="text" class="form-control"  id="intelligence" placeholder="" name="intelligence" value=" {{$character->Intelligence }}">
              </div>


              <div class="form-group">
                <label for="wisdom">Wisdom:*</label>
                <input type="text" class="form-control" id="wisdom" placeholder="" name="wisdom" value=" {{$character->Wisdom }}">
              </div>


              <div class="form-group">
                <label for="charisma">Charisma:*</label>
                <input type="text" class="form-control" id="charisma" placeholder="" name="charisma" value=" {{$character->Charisma }}">
              </div>

            </div>

            <button class="btn btn-info" id="rollStats4DropLowest" data-toggle="d6Stats" title="Rolls 4d6 and drops the lowest roll for each stat">Generate random stats</button>

            <div id="char-create-part-3"> 
              <h1 class="editor-area-h1"><b>Skills & Languages:</b></h1>

                <div class="form-group skills">

                  <div class="col-lg-6" id="skills-div">
                    <h2 style="padding-bottom:20px;">Skill Proficiencies:</h2>  
                    
                      <div class="col-lg-2 skill-checkbox">
                          <input type="checkbox" class="form-control" id="Acrobatics" placeholder="" value="Acrobatics" >
                      </div><div class="col-lg-10">
                          <label class="skill-label">Acrobatics</label><br><br><br> 
                      </div>

                      <div class="col-lg-2 skill-checkbox">
                         <input type="checkbox" class="form-control" id="AnimalHandling" placeholder="" value="Animal Handling">
                      </div><div class="col-lg-10">   
                         <label class="skill-label">Animal Handling </label><br><br><br>  
                      </div>

                      <div class="col-lg-2 skill-checkbox">
                         <input type="checkbox" class="form-control" id="Arcana" placeholder="" value="Arcana">
                      </div><div class="col-lg-10">   
                         <label class="skill-label">Arcana</label><br><br><br>     
                      </div>

                      <div class="col-lg-2 skill-checkbox">
                         <input type="checkbox" class="form-control" id="Athletics" placeholder="" value="Athletics">
                      </div><div class="col-lg-10">   
                         <label class="skill-label">Athletics</label><br><br><br>  
                      </div>

                      <div class="col-lg-2 skill-checkbox">
                         <input type="checkbox" class="form-control" id="Deception" placeholder="" value="Deception">
                      </div><div class="col-lg-10">   
                         <label class="skill-label">Deception</label><br><br><br>  
                      </div>

                      <div class="col-lg-2 skill-checkbox">
                         <input type="checkbox" class="form-control" id="History" placeholder="" value="History">
                      </div><div class="col-lg-10">   
                         <label class="skill-label">History</label><br><br><br>  
                      </div>

                      <div class="col-lg-2 skill-checkbox">
                         <input type="checkbox" class="form-control" id="Insight" placeholder="" value="Insight">
                      </div><div class="col-lg-10">   
                         <label class="skill-label">Insight</label><br><br><br>  
                      </div>

                      <div class="col-lg-2 skill-checkbox">
                         <input type="checkbox" class="form-control" id="Intimidation" placeholder="" value="Intimidation">
                      </div><div class="col-lg-10">   
                         <label class="skill-label">Intimidation</label><br><br><br>  
                      </div>

                      <div class="col-lg-2 skill-checkbox">
                         <input type="checkbox" class="form-control" id="Investigation" placeholder="" value="Investigation">
                      </div><div class="col-lg-10">   
                         <label class="skill-label">Investigation</label><br><br><br>  
                      </div>

                       <div class="col-lg-2 skill-checkbox">
                         <input type="checkbox" class="form-control" id="Medicine" placeholder="" value="Medicine">
                      </div><div class="col-lg-10">   
                         <label class="skill-label">Medicine</label><br><br><br>  
                      </div>

                       <div class="col-lg-2 skill-checkbox">
                         <input type="checkbox" class="form-control" id="Nature" placeholder="" value="Nature">
                      </div><div class="col-lg-10">   
                         <label class="skill-label">Nature</label><br><br><br>  
                      </div>

                       <div class="col-lg-2 skill-checkbox">
                         <input type="checkbox" class="form-control" id="Perception" placeholder="" value="Perception">
                      </div><div class="col-lg-10">   
                         <label class="skill-label">Perception</label><br><br><br>  
                      </div>

                       <div class="col-lg-2 skill-checkbox">
                         <input type="checkbox" class="form-control" id="Persuasion" placeholder="" value="Persuasion">
                      </div><div class="col-lg-10">   
                         <label class="skill-label">Persuasion</label><br><br><br>  
                      </div>

                       <div class="col-lg-2 skill-checkbox">
                         <input type="checkbox" class="form-control" id="Religion" placeholder="" value="Religion">
                      </div><div class="col-lg-10">   
                         <label class="skill-label">Religion</label><br><br><br>  
                      </div>

                       <div class="col-lg-2 skill-checkbox">
                         <input type="checkbox" class="form-control" id="SleightOfHand" placeholder="" value="Sleight Of Hand">
                      </div><div class="col-lg-10">   
                         <label class="skill-label">Sleight Of Hand</label><br><br><br>  
                      </div>

                       <div class="col-lg-2 skill-checkbox">
                         <input type="checkbox" class="form-control" id="Stealth" placeholder="" value="Stealth">
                      </div><div class="col-lg-10">   
                         <label class="skill-label">Stealth</label><br><br><br>  
                      </div>

                       <div class="col-lg-2 skill-checkbox">
                         <input type="checkbox" class="form-control" id="Survival" placeholder="" value="Survival">
                      </div><div class="col-lg-10">   
                         <label class="skill-label">Survival</label><br><br><br>  
                      </div>
                  </div>

                  <div class="col-lg-6" id="languages-div">   
                    <h2 style="padding-bottom:20px;">Standard Languages:</h2> 
                 
                      <div class="col-lg-2">
                          <input type="checkbox" class="form-control" id="Common" placeholder="" value="Common">
                      </div><div class="col-lg-10">
                          <label class="skill-label">Common</label><br><br><br> 
                      </div>
             

                      <div class="col-lg-2">
                          <input type="checkbox" class="form-control" id="Dwarvish" placeholder="" value="Dwarvish">
                      </div><div class="col-lg-10">
                          <label class="skill-label">Dwarvish</label><br><br><br> 
                      </div>

                      <div class="col-lg-2">
                          <input type="checkbox" class="form-control" id="Elvish" placeholder="" value="Elvish">
                      </div><div class="col-lg-10">
                          <label class="skill-label">Elvish</label><br><br><br> 
                      </div>

                      <div class="col-lg-2">
                          <input type="checkbox" class="form-control" id="Giant" placeholder="" value="Giant">
                      </div><div class="col-lg-10">
                          <label class="skill-label">Giant</label><br><br><br> 
                      </div>

                      <div class="col-lg-2">
                          <input type="checkbox" class="form-control" id="Gnomish" placeholder="" value="Gnomish">
                      </div><div class="col-lg-10">
                          <label class="skill-label">Gnomish</label><br><br><br> 
                      </div>

                      <div class="col-lg-2">
                          <input type="checkbox" class="form-control" id="Goblin" placeholder="" value="Goblin">
                      </div><div class="col-lg-10">
                          <label class="skill-label">Goblin</label><br><br><br> 
                      </div>

                      <div class="col-lg-2">
                          <input type="checkbox" class="form-control" id="Halfling" placeholder="" value="Halfling">
                      </div><div class="col-lg-10">
                          <label class="skill-label">Halfling</label><br><br><br> 
                      </div>

                      <div class="col-lg-2">
                          <input type="checkbox" class="form-control" id="Orc" placeholder="" value="Orc">
                      </div><div class="col-lg-10">
                          <label class="skill-label">Orc</label><br><br><br> 
                      </div>

                    <h2 style="padding-bottom:10px; padding-top:20px;">Exotic Languages:</h2> 
                    

                      <div class="col-lg-2">
                          <input type="checkbox" class="form-control" id="Abyssal" placeholder="" value="Abyssal">
                      </div><div class="col-lg-10">
                          <label class="skill-label">Abyssal</label><br><br><br> 
                      </div>

                      <div class="col-lg-2">
                          <input type="checkbox" class="form-control" id="Celestial" placeholder="" value="Celestial">
                      </div><div class="col-lg-10">
                          <label class="skill-label">Celestial</label><br><br><br> 
                      </div>

                      <div class="col-lg-2">
                          <input type="checkbox" class="form-control" id="DeepSpeech" placeholder="" value="DeepSpeech">
                      </div><div class="col-lg-10">
                          <label class="skill-label">Deep Speech</label><br><br><br> 
                      </div>

                      <div class="col-lg-2">
                          <input type="checkbox" class="form-control" id="Draconic" placeholder="" value="Draconic">
                      </div><div class="col-lg-10">
                          <label class="skill-label">Draconic</label><br><br><br> 
                      </div>

                      <div class="col-lg-2">
                          <input type="checkbox" class="form-control" id="Infernal" placeholder="" value="Infernal">
                      </div><div class="col-lg-10">
                          <label class="skill-label">Infernal</label><br><br><br> 
                      </div>

                      <div class="col-lg-2">
                          <input type="checkbox" class="form-control" id="Primordial" placeholder="" value="Primordial">
                      </div><div class="col-lg-10">
                          <label class="skill-label">Primordial</label><br><br><br> 
                      </div>

                      <div class="col-lg-2">
                          <input type="checkbox" class="form-control" id="Sylvan" placeholder="" value="Sylvan">
                      </div><div class="col-lg-10">
                          <label class="skill-label">Sylvan</label><br><br><br> 
                      </div>

                      <div class="col-lg-2">
                          <input type="checkbox" class="form-control" id="Undercommon" placeholder="" value="Undercommon">
                      </div><div class="col-lg-10">
                          <label class="skill-label">Undercommon</label><br><br><br> 
                      </div>  
                  </div>

                </div>

             </div>
                    
            <div id="char-create-part-4" > 
                <div class="col-lg-6">
                  <div class="form-group" style="margin-top: 50px;">
                    <label id="alignment" for="race">Alignment:</label>
                        <select id="alignment" name="alignment" class="form-control" required>
                          <option value="Lawful Good">Lawful Good</option>
                          <option value="Neutral good">Neutral good</option>
                          <option value="Chaotic Good">Chaotic Good</option>
                          <option value="Lawful Neutral">Lawful Neutral</option>
                          <option value="Neutral">Neutral</option>
                          <option value="Chaotic Neutral">Chaotic Neutral</option>
                          <option value="Lawful Evil">Lawful Evil</option>
                          <option value="Neutral Evil">Neutral Evil</option>
                          <option value="Chaotic Evil">Chaotic Evil</option>
                        </select>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label id="background" for="race">Background:</label>
                        <select id="background" name="background" class="form-control" required>
                          <option value="Acolyte">Acolyte</option>
                          <option value="Charlatan">Charlatan</option>
                          <option value="Criminal">Criminal</option>
                          <option value="Entertainer">Entertainer</option>
                          <option value="Folk Hero">Folk Hero</option>
                          <option value="Guild Artosan">Guild Artosan</option>
                          <option value="Hermit">Hermit</option>
                          <option value="Noble">Noble</option>
                          <option value="Outlander">Outlander</option>
                          <option value="Sage">Sage</option>
                          <option value="Sailor">Sailor</option>
                          <option value="Soldier">Soldier</option>
                          <option value="Urchin">Urchin</option>
                        </select>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="armor-class">Armor Class:</label>
                    <input type="text" class="form-control" id="armor-class" placeholder="" name="armor-class" required value=" {{$character->Armor_Class }}">
                  </div>
                </div> 

                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="initiative">Initiative:</label>
                    <input type="text" class="form-control" id="initiative" placeholder="" name="initiative" required value=" {{$character->Initiative }}">
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="speed">Speed in Feet:</label>
                    <input type="text" class="form-control" id="speed" placeholder="" name="speed" required value=" {{$character->Speed }}">
                  </div>
                </div>


                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="max-hp">Max HP:</label>
                    <input type="text" class="form-control" id="max-hp" placeholder="" name="max-hp" required value=" {{$character->max_HP }}">
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="hit-dice">Hit Dice:</label>
                    <input type="text" class="form-control" id="hit-dice" placeholder="" name="hit-dice" required value=" {{$character->Hit_Die }}"> 
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="saving-throws">Saving Throws:</label>
                    <input type="text" class="form-control" id="saving-throws" placeholder="" name="saving-throws" required value=" {{$character->Saving_Throws }}">
                  </div>
                </div>

            </div>

            <!-- These three inputs are invisible. They are populated by scripts below the form, as code needs to be run to figure out what the values should be, eg: JS code loops through all checked skills boxes and puts the checked values into a string, which is blaced in "skillsField" below. -->
            <input type="text" class="form-control" name="skillsField" id="skillsField" style="display:none;">
            <input type="text" class="form-control" name="languagesField" id="languagesField" style="display:none;">
            <input type="text" class="form-control" name="subRaceField" id="subRaceField" style="display:none;">

            <div class="col-lg-12">
              <button type="submit" class="btn btn-default" id="submitButton">Submit</button>
            </div>

          </form>        

         @endif
        </div>
      </div>            
    </div>
  </div>          
</div>

<!-- This script contains the code for generating random character stats. -->
<!-- It "rolls" 4d6, drops the lowest and adds the remaining 3 for each of the 6 stats. -->
<script type="text/javascript">  
  $(document).ready(function(){
    $('#rollStats4DropLowest').click(function(){
      

      var min = 1;
      var max = 7;

      function getRandomd6(min, max) {
      return Math.floor(Math.random() * (max - min)) + min;
                                   }

      
      var newStats = []     



      for (var i = 0; i < 6; i++) {                         
        var stats = [];
                                       
        var d61 = getRandomd6(min, max);
        var d62 = getRandomd6(min, max);
        var d63 = getRandomd6(min, max);
        var d64 = getRandomd6(min, max);

        stats = [d61, d62, d63, d64];
        stats.sort(function(a, b){return b-a});
        stats.pop();
        statsTotal = stats.reduce(function(acc, val) {
        return acc + val;
        }, 0);
        newStats.push(statsTotal);

        console.log(stats + ", " + statsTotal);
      }

      console.log("Stats: " + newStats);
      $('[name=strength]').val(newStats[0]);
      $('[name=dexterity]').val(newStats[1]);
      $('[name=constitution]').val(newStats[2]);
      $('[name=intelligence]').val(newStats[3]);
      $('[name=wisdom]').val(newStats[4]);
      $('[name=charisma]').val(newStats[5]);
      })
  })

</script>


<!-- This script contains the code that is run between the form submit button being pressed, and the form being submitted -->
<script type="text/javascript">
  $('#editChar').submit(function(){

  /*Puts all checked skills into a var*/
  var skillsList = $("#skills-div input:checkbox:checked").map(function(){
    return $(this).val();
  }).get(); 


  /*Puts all checked languages into a var*/
  var languagesList = $("#languages-div input:checkbox:checked").map(function(){
    return $(this).val();
  }).get(); 


  if (skillsList == "" || skillsList == " ") {
    skillsList = "None";
  }

  else {
    skillsList = skillsList;
  }

  if (languagesList == "" || languagesList == " ") {
    languagesList = "None";
  }

  else {
    languagesList = languagesList;
  }


  skillsVar = skillsList.toString();
  langVar = languagesList.toString();


  $('#skillsField').val(skillsVar);
  $('#languagesField').val(langVar);
  console.log(subRaceVar);


 /* This code handles the characters new subrace*/
  window.CurrentRace = $( "#race option:selected" ).text();
  if (window.CurrentRace != "Aasimar" && window.CurrentRace != "Dwarf" && window.CurrentRace != "Elf" && window.CurrentRace != "Genasi" && window.CurrentRace != "Gnome" && window.CurrentRace != "Halfling") {
    console.log("Race with no subrace selected");
    $('#subRaceField').val("None");
  } else {
      window.currentSubRace = $( "#" + subRaceVar + " option:selected" ).text();
      console.log("Race with subrace selected: " + window.currentSubRace);
      $('#subRaceField').val(window.currentSubRace);
  }

  });

</script>

@endsection