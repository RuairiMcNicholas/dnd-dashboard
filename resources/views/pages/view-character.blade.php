@extends('layouts.master')

@section('content')

<style type="text/css">
  .huge {
    font-size: 40px;
    display: inline-block;
    float: right;
}
</style>

<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        @if ($character->player_id != \Auth::user()->id)
        <p>Could not find character.</p>
        @else
        <h1 class="page-header">View Character:</h1>
                  
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


       
                        <div class="well col-lg-5 char-box-main" style="margin-right: 20px; margin-right: 20px; padding-left: 10px; padding-right: 10px; padding-top: 0px;">
                          <h2>{{ $character->character_name }}</h2>
                          <div class="col-lg-6">
                            <p><b>Class: </b>{{ $character->Class }}</p>
                            <p><b>Race: </b>{{ $character->Race }}</p>
                            <p><b>Sub-Race: </b>{{ $character->Sub_Race }}</p>
                            <p><b>Background: </b>{{ $character->Background }}</p>
                          </div>
                          <div class="col-lg-6" style="padding-top: 0px; height:120px;">

                            <p><b>Level: </b>{{ $character->Level }}</p>
                            <p><b>Alignment: </b>{{ $character->Alignment }}</p>
                          </div>

                          <div class="col-lg-12 well" style="background-color: #555555">
                            <div style="padding-bottom: 120px;">
                              <div class="col-lg-6">
                                <i class="ra ra-health ra-3x" style="display:inline; color:#FE0000;"></i>
                                <div class="huge charMod" style="color:#ffffff; float:none; padding-left: 10px;">{{$character->max_HP}}</div>
                                <p style="color:#ffffff; padding-top: 10px; font-style: italic; ">Max HP</p>
                              </div>

                              <div class="col-lg-6">
                                <i class="ra ra-perspective-dice-two ra-3x" style="display:inline; color:#ffffff;"></i>
                                <div class="huge charMod" style="color:#ffffff; float:none; padding-left: 10px;">{{$character->Hit_Die}}</div>
                                <p style="color:#ffffff; padding-top: 10px; font-style: italic;">Hit Dice</p>
                              </div>
                            </div>

                            <div class="col-lg-4">
                              <i class="ra ra-shield ra-3x" style="display:inline; color:#ffffff;"></i>
                              <div class="huge charMod" style="color:#ffffff;">{{$character->Armor_Class}}</div>
                              <p style="color:#ffffff; padding-top: 10px; font-style: italic; float: left;">Armor Class</p>
                            </div>

                            <div class="col-lg-4">
                              <i class="ra ra-lightning-bolt ra-3x" style="display:inline; color:#ffffff;"></i>
                              <div class="huge charMod" style="color:#ffffff;">+{{$character->Initiative}}</div>
                              <p style="color:#ffffff; padding-top: 10px; font-style: italic; float: left;">Initiative</p>
                            </div>

                            <div class="col-lg-4">
                              <i class="ra ra-boot-stomp ra-3x" style="display:inline; color:#ffffff;"></i>
                              <div class="huge charMod" style="color:#ffffff;">{{$character->Speed}}</div>
                              <p style="color:#ffffff; padding-top: 10px; font-style: italic; float: left;">Speed</p>
                            </div>

                          </div>

                        <div class="charStatContainer">
                          <!-- STRENGTH -->
                          <div class="col-lg-6 charStat">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-12 statBox">
                                            <i class="ra ra-muscle-up ra-3x" style="display:inline;"></i>
                                            <div class="huge charMod">{{$strMod}}</div>
                                        </div>
                                        <div class="col-xs-12 text-right">
                                            
                                            <div><p><b>Strength: </b>{{ $strVal }}</p></div>
                                        </div>
                                    </div>
                                </div>
                          
                            </div>
                          </div>

                        <!-- DEXTERITY -->
                         <div class="col-lg-6 charStat right">
                          <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <div class="row">
                                      <div class="col-xs-12 statBox">
                                          <i class="ra ra-player-dodge ra-3x" style="display:inline;"></i>
                                          <div class="huge charMod">{{ $dexMod }}</div>
                                      </div>
                                      <div class="col-xs-12 text-right">
                                          
                                          <div><p><b>Dexterity: </b>{{ $character->Dexterity }}</p></div>
                                      </div>
                                  </div>
                              </div>
                        
                           </div>
                         </div>

                        <!-- CONSTITUTION -->   
                            <div class="col-lg-6 charStat">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12 statBox">
                                                <i class="ra ra-hearts ra-3x" style="display:inline;"></i>
                                                <div class="huge charMod">{{ $conMod }}</div>
                                            </div>
                                            <div class="col-xs-12 text-right">
                                                
                                                <div><p><b>Constitution: </b>{{ $character->Constitution }}</p></div>
                                            </div>
                                        </div>
                                    </div>
                          
                                </div>
                            </div>

                            <!-- INTELLIGENCE -->   
                        <div class="col-lg-6 charStat right">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-12 statBox">
                                            <i class="ra ra-book ra-3x" style="display:inline;"></i>
                                            <div class="huge charMod">{{ $intMod }}</div>
                                        </div>
                                        <div class="col-xs-12 text-right">
                                            
                                            <div><p><b>Intelligence: </b>{{ $character->Intelligence }}</p></div>
                                        </div>
                                    </div>
                                </div>
                        
                                </div>
                            </div>



                            <!-- WISDOM --> 
                        <div class="col-lg-6 charStat ">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-12 statBox">
                                            <i class="ra ra-ball ra-3x" style="display:inline;"></i>
                                            <div class="huge charMod">{{ $wisMod }}</div>
                                        </div>
                                        <div class="col-xs-12 text-right">
                                            
                                            <div><p><b>Wisdom: </b>{{ $character->Wisdom }}</p></div>
                                        </div>
                                    </div>
                                </div>
                        
                                </div>
                            </div>



                            <!-- CHARISMA -->   
                        <div class="col-lg-6 charStat right">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-12 statBox">
                                            <i class="ra ra-speech-bubble ra-3x" style="display:inline;"></i>
                                            <div class="huge charMod">{{ $chaMod }}</div>
                                        </div>
                                        <div class="col-xs-12 text-right">
                                            
                                            <div><p><b>Charisma: </b>{{ $character->Charisma }}</p></div>
                                              
                                        </div>
                                    </div>
                                </div> 
                        
                                </div>
                            </div>

                        <div class="button-container col-lg-12 text-center">
                          

                          <div class="col-xs-6" style="padding-right: 0px; padding-left: 0px; width: 30% !important">
                            <a href="/characters/edit/{{ $character->char_id }}" style="float:left;">
                            <button type="button" class="btn btn-info">Edit Character</button></a>
                          </div>

                          <div class="col-xs-6" style="float: right; margin-right: 0px; padding-right: 0px;"  data-toggle="modal" data-target="#myModal">
                            <button style="float: right;" type="button" class="btn btn-danger" id="deleteCharButton{{ $character->char_id }}">Delete Character</button>
                          </div>

                          <div class="col-xs-12" style="padding-right: 0px; padding-top: 20px; padding-left: 0px;">
                            <a href="/characters/print/{{ $character->char_id }}">
                            <button type="button" class="btn btn-success" id="printCharButton{{ $character->char_print_id }}">Print Character Sheet</button></a>
                          </div>

                        </div>

                        </div>

                        </div>

                        <script type="text/javascript">
                          $(document).ready(function(){
                              $('#deleteCharButton{{ $character->char_id }}').click(function(){

                                $deleteCharId = {{ $character->char_id }};
                                $deleteCharName = "{{ $character->character_name }}";

                                $('#charNameDel').html($deleteCharName);
                                $("#charDelID").attr("href", "/characters/delete/" + $deleteCharId);
                                console.log($deleteCharName );
                          });
                            });

                            </script>



                   
                





    <div class="well col-lg-5 char-box-main" style="margin-right: 20px; margin-right: 20px; padding-left: 10px; padding-right: 10px; padding-top: 0px;">


    <script type="text/javascript">
    $(document).ready(function(){
      var skillsArray = "{{ $character -> Trained_Skills}}";

      skillsArray = skillsArray.split(",");
      skillsArray = skillsArray.join(", ");
      $("#ListSkills").html(skillsArray);
      console.log(skillsArray);


      var languagesArray = "{{ $character -> Languages}}";

      languagesArray = languagesArray.split(",");
      languagesArray = languagesArray.join(", ");
      $("#ListLanguages ").html(languagesArray);
      console.log(charCampaigns);
    });




    </script>

                 <h2>Skills:</h2>
                 <p><span id="ListSkills"></span></p>
                 <br>
                 <h2>Languages:</h2>
                 <p><span id="ListLanguages"></span></p>





                </div>


            @endif
                </div>
                </div>

            </div>
            </div>



            
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d43f3a">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: #ffffff"><b>Confirm deletion</b></h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete <b><span id="charNameDel"></span></b>?</p><br>
        <p>(Characters can be recovered from the Deleted Characters section)</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
        <a id="charDelID" href=""><button type="button" class="btn btn-danger">Delete</button></a>
      </div>
    </div>
  </div>
</div>


@endsection