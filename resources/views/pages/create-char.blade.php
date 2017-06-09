@extends('layouts.master')

@section('content')

<style>
  
  .skill-checkbox {
    display: inline-block;
  }

  .skill-label{
    padding-top:10px;
    float:left;
  }

</style>

<script type="text/javascript">  
// This page is made up of four form parts, with one visible at a time.
// Each part is named "char-create-part-#"
$(document).ready(function(){
$('.other-subrace').hide();
$('.dwarf-subrace').hide();
$('#char-create-part-1').show();
$('#char-create-part-2').hide();
$('#char-create-part-3').hide();
$('#char-create-part-4').hide();
$('#back1').hide();
$('#validation-1-alert').hide();
$('#rollStats4DropLowest').hide();
$('#submitButton').hide();
$('#next2').hide();

// The four form parts are moved through using this counter var. 
// Pressing the Next button increments it, the Back button decrements it

nextCounter = 0; 
window.subRaceVar = "";

skillsVar = [];
langVar = [];

}) 

</script>

<div id="page-wrapper">
  <div class="container-fluid"> 
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
        Characters <small>Create a Character</small>
        </h1>
      </div>
    </div>



      <form method="POST" action="./create-char" name="CharForm">

        {{ csrf_field() }} <!-- Laravel form security feature -->
        <div id="char-create-part-1">
          <div class="form-group">
            <label for="exampleInputEmail1">Character Name:</label>
            <input type="text" class="form-control" id="characterName" placeholder="Leroy Jenkins" name="characterName" required>
          </div>

      

          <div class="form-group">
            <label for="class">Class:</label>
                <select name="class" class="form-control" required>
                  <option value="Barbarian">Barbarian</option>
                  <option value="Bard">Bard</option>
                  <option value="Cleric">Cleric</option>
                  <option value="Druid">Druid</option>
                  <option value="Fighter">Fighter</option>
                  <option value="Monk">Monk</option>
                  <option value="Paladin">Paladin</option>
                  <option value="Ranger">Ranger</option>
                  <option value="Rogue">Rogue</option>
                  <option value="Sorcerer">Sorcerer</option>
                  <option value="Warlock">Warlock</option>
                  <option value="Wizard">Wizard</option>
                </select>
          </div>

          <div class="form-group">
            <label for="race">Race:</label>
                <select id="race" name="race" class="form-control" required>
                  <option value="Aasimar">Aarakockra</option>
                  <option value="Aasimar">Aasimar</option>
                  <option value="Bugbear">Bugbear</option>
                  <option value="Dragonborn">Dragonborn</option>
                  <option value="Dwarf">Dwarf</option>
                  <option value="Elf">Elf</option>
                  <option value="Firbolg">Firbolg</option>
                  <option value="Genasi">Genasi</option>
                  <option value="Gnome">Gnome</option>
                  <option value="Goblin">Goblin</option>
                  <option value="Goliath">Goliath</option>
                  <option value="Half-Elf">Half-Elf</option>
                  <option value="Half-Orc">Half-Orc</option>
                  <option value="Halfling">Halfling</option>
                  <option value="Hobgoblin">Hobgoblin</option>
                  <option value="Human">Human</option>
                  <option value="Kenku">Kenku</option>
                  <option value="Kobold">Kobold</option>
                  <option value="Lizardfolk">Lizardfolk</option>
                  <option value="Orc">Orc</option>
                  <option value="Tabaxi">Tabaxi</option>
                  <option value="Human">Tiefling</option>
                  <option value="Triton">Triton</option>
                  <option value="Human">Human</option>
                  <option value="Yuan-Ti">Yuan-Ti</option>

                </select>
          </div>

          <div id="sub-race-divs">
            <script type="text/javascript"> 
              $('#race').change(function(){
                if($(this).val() != 'Aasimar'){ 
                  $('#aasimar-subrace').hide();
                } else {
                    $('#aasimar-subrace').show();
                    window.subRaceVar = "sub-Aasimar";
                }
              });
            </script>

       
            <div class="form-group other-subrace" id="aasimar-subrace">
              <label  for="subrace">Sub-Race:</label>
                  <select id="sub-Aasimar" name="subrace" class="form-control">
                    <option value="Protector">Protector</option>
                    <option value="Scourge">Scourge</option>
                    <option value="Fallen">Fallen</option>
                  </select>
            </div>


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

       
            <div class="form-group other-subrace" id="dwarf-subrace">
              <label id="dwarf-label" for="subrace">Sub-Race:</label>
                  <select id="sub-Dwarf" name="subrace" class="form-control">
                    <option value="Hill Dwarf">Hill Dwarf</option>
                    <option value="Mountain Dwarf">Mountain Dwarf</option>
                    <option value="Gray Dwarf">Gray Dwarf</option>
                  </select>
            </div>

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
                    <option value="High Elf">High Elf</option>
                    <option value="Wood Elf">Wood Elf</option>
                    <option value="Drow">Drow</option>
                  </select>
            </div>


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
                    <option value="Air Genasi">Air Genasi</option>
                    <option value="Earth Genasi">Earth Genasi</option>
                    <option value="Drow">Fire Genasi</option>
                    <option value="Drow">Water Genasi</option>
                  </select>
            </div>

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
                    <option value="Forest Gnome">Forest Gnome</option>
                    <option value="Rock Gnome">Rock Gnome</option>
                    <option value="Deep Gnome">Deep Gnome</option>
                  </select>
            </div>

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
                    <option value="Lightfoot Halfling">Lightfoot Halfling</option>
                    <option value="Stout Halfling">Stout Halfling</option>
                  </select>
            </div>

            </div>

            <div class="form-group">
              <label for="level">Level:</label>
              <input type="text" class="form-control" id="level" placeholder="" name="level" required>
            </div>

          </div>



        <div id="char-create-part-2">
          <div class="form-group">
            <label for="strength">Strength:<sup>*</sup></label>
            <input type="text" class="form-control" id="strength" placeholder="" name="strength">
          </div>


          <div class="form-group">
            <label for="dexterity">Dexterity:<sup>*</sup></label>
            <input type="text" class="form-control" id="dexterity" placeholder="" name="dexterity">
          </div>


          <div class="form-group">
            <label for="constitution">Constitution:*</label>
            <input type="text" class="form-control" id="constitution" placeholder="" name="constitution">
          </div>


          <div class="form-group">
            <label for="intelligence">Intelligence:*</label>
            <input type="text" class="form-control"  id="intelligence" placeholder="" name="intelligence">
          </div>


          <div class="form-group">
            <label for="wisdom">Wisdom:*</label>
            <input type="text" class="form-control" id="wisdom" placeholder="" name="wisdom">
          </div>


          <div class="form-group">
            <label for="charisma">Charisma:*</label>
            <input type="text" class="form-control" id="charisma" placeholder="" name="charisma">
          </div>
        </div>


        <div id="char-create-part-3"> 

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
              
        <div id="char-create-part-4"> 
          <div class="col-lg-6">
            <div class="form-group">
              <label for="race">Alignment:</label>
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
              <label for="race">Background:</label>
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
              <input type="text" class="form-control" id="armor-class" placeholder="" name="armor-class" required>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="form-group">
              <label for="initiative">Initiative:</label>
              <input type="text" class="form-control" id="initiative" placeholder="" name="initiative" required>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="form-group">
              <label for="speed">Speed in Feet:</label>
              <input type="text" class="form-control" id="speed" placeholder="" name="speed" required>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="form-group">
              <label for="max-hp">Max HP:</label>
              <input type="text" class="form-control" id="max-hp" placeholder="" name="max-hp" required>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="form-group">
              <label for="hit-dice">Hit Dice:</label>
              <input type="text" class="form-control" id="hit-dice" placeholder="" name="hit-dice" required>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="form-group">
              <label for="saving-throws">Saving Throws:</label>
              <input type="text" class="form-control" id="saving-throws" placeholder="" name="saving-throws" required>
            </div>
          </div>



        </div>

            <!-- These three inputs are invisible. They are populated by scripts below the form, as code needs to be run to figure out what the values should be, eg: JS code loops through all checked skills boxes and puts the checked values into a string, which is blaced in "skillsField" below. -->
            <input type="text" class="form-control" name="skillsField" id="skillsField" style="display:none;">
            <input type="text" class="form-control" name="languagesField" id="languagesField" style="display:none;">
            <input type="text" class="form-control" name="subRaceField" id="subRaceField" style="display:none;">


        <button type="submit" class="btn btn-default" id="submitButton">Submit</button>
      </form>        
  </div>

          <div id="buttons" style="padding-bottom: 35px; padding-top: 35px;"> 
            <button class="btn btn-info" id="rollStats4DropLowest" data-toggle="d6Stats" title="Rolls 4d6 and drops the lowest roll for each stat">Generate random stats</button>
            <button type="button" class="btn btn-warning" id="back1" style="margin-right: 20px;">Back</button>
            <button type="button" class="btn btn-success" style="" id="next1" style="margin-top:35px">Next</button>
            <div class="alert alert-warning" id="validation-1-alert" style="display: inline-block !important; margin-left:30px;">
            <strong>Warning!</strong> <span id="validation-1-span">Please fill in all required fields.</span>
          </div>
    </div>
</div>

      

<script type="text/javascript"> //Code for hover-over tooltips
  $('[data-toggle="d6Stats"]').tooltip(); 
</script>


<!-- This script controls the Next button for moving through the form.
It works using the nextCounter, which represents which stage of the form the user is at.
Every move through the form increments it by one. A Back button decrements it and moves back through the form. -->
<script type="text/javascript">
$(document).ready(function(){
  $('#next1').click(function(){

  if (nextCounter == 0) {
    
  a=document.getElementById("characterName").value;;
  b=document.getElementById("level").value;;
  
  if (a==null || a=="" || b==null || b=="" ) {

    $('#validation-1-alert').show();
    $('#validation-1-span').text("All required fields must be filled.");

  } else if (isNaN(b) == true) {
      $('#validation-1-span').text("'Level' must be a number.");
      $('#validation-1-alert').show();

  } else {             
      $('#char-create-part-1').hide();
      $('#char-create-part-2').show();
      $('#back1').show();
      $('#validation-1-alert').hide ();
      $('#rollStats4DropLowest').show ();
      console.log(window.subRaceVar);

      window.CurrentRace = $( "#race option:selected" ).text();
      if (window.CurrentRace != "Aasimar" && window.CurrentRace != "Dwarf" && window.CurrentRace != "Elf" && window.CurrentRace != "Genasi" && window.CurrentRace != "Gnome" && window.CurrentRace != "Halfling") {
        console.log("Race with no subrace selected");
        $('#subRaceField').val("None");
      } else {
          window.currentSubRace = $( "#" + subRaceVar + " option:selected" ).text();
          console.log("Race with subrace selected: " + window.currentSubRace);
          $('#subRaceField').val(window.currentSubRace);
      }

      nextCounter = 1;
      
    }

} else if (nextCounter == 1) {

  a=document.getElementById("strength").value;;
  b=document.getElementById("dexterity").value;;
  c=document.getElementById("constitution").value;;
  d=document.getElementById("intelligence").value;;
  e=document.getElementById("wisdom").value;;
  f=document.getElementById("charisma").value;;
  
    if (a==null || a=="" || b==null || b=="" || c==null || c=="" || d==null || d=="" || e==null || e=="" || f==null || f=="") {

      $('#validation-1-alert').show ();
      

  
    } else {             
      $('#char-create-part-1').hide ();
      $('#char-create-part-2').hide();
      $('#char-create-part-3').show();
      $('#show').hide();

      $('#validation-1-alert').hide ();
      $('#rollStats4DropLowest').hide ();
      
      nextCounter = 2;

    }

  } else if (nextCounter == 2) { //rmcn
    nextCounter = 3;
    console.log(nextCounter);

 

    $('#validation-1-alert').hide ();

    event.preventDefault();
    var skillsList = $("#skills-div input:checkbox:checked").map(function(){
      return $(this).val();
    }).get(); 


    event.preventDefault();
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
    console.log(skillsVar + ", " + langVar);

    $('#skillsField').val(skillsVar);
    $('#languagesField').val(langVar);

    $('#char-create-part-3').hide();
    $('#char-create-part-4').show();



    

  

 
  } else if (nextCounter == 3) {

    a=document.getElementById("armor-class").value;
    b=document.getElementById("initiative").value;
    c=document.getElementById("speed").value;
    d=document.getElementById("max-hp").value;
    e=document.getElementById("hit-dice").value;
    f=document.getElementById("saving-throws").value;

    if (a==null || a=="" || b==null || b=="" || c==null || c=="" || d==null || d=="" || e==null || e=="" || f==null || f=="") {

    $('#validation-1-alert').show ();
    $('#validation-1-span').text("Ensure all required fields are filled.");

    $('#submitButton').hide();

    } else {

    $('#submitButton').show();

    }

  }




  })

  })
    </script>

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


  <script type="text/javascript">
    $(document).ready(function(){
    $('#back1').click(function(){

      if (nextCounter == 1){

      $('#char-create-part-1').show ();
      $('#char-create-part-2').hide();
      $('#rollStats4DropLowest').hide();
      nextCounter = 0;
    }


    else if (nextCounter == 2){
        
        $('#char-create-part-2').show();
        $('#char-create-part-3').hide();
        $('#rollStats4DropLowest').show ();
        nextCounter = 1;

    } else if (nextCounter == 3) {

        $('#char-create-part-3').show();
        $('#char-create-part-4').hide();
        $('#submitButton').hide ();
        nextCounter = 2;

    }

    })
   })
    </script>

 
      <script type="text/javascript">
    $(document).ready(function(){
    $('#submitButton').click(function(){

      $('#submitButton').hide();

    })
   })
    </script>





</div>


@endsection

