@extends('layouts.master')

@section('content')

<style>

.charStat {
padding-right:0px; 
padding-left: 0px; 
margin-right: 0px; 
width:40%;
}

.charStat.right {
  float: right;
}


.charMod {
font-size:30px; 
display:inline;
padding-right: 15px;
padding-top: 5px;
}

.statBox {
padding-right:0px; 
padding-left: 0px;
}

.button-container {
  padding-left: 0px !important;
  padding-right: 0px !important;
}


.button-container .col-xs-4 {
  padding-left: 0px !important;
}

.char-box-main {
  margin-right: 50px !important;
  margin-bottom: 50px !important;
}

.charStatContainer {

}

</style>


@if (Session::has('flash_delete_success'))

<script type="text/javascript">
  
$(window).on('load', function(){ 


window.deleteSuccess = {{ Session::get("flash_delete_success") }};
window.delCharName = "{{ Session::get("flash_deleted_name") }}";


})

</script>

<script type="text/javascript">
  
$(window).on('load', function(){ 

$('#charDelWarningButt').show();



if (window.deleteSuccess == 1) {
  console.log("Character '" + window.delCharName + "' was deleted.");
  $('#charDelWarningSpan').html("Character '" + window.delCharName + "' was deleted.")
}

else {
  console.log("Error: Character does not exist, or does not belong to you.");
  $('#charDelWarningSpan').html("<b>Error:</b> Character does not exist, or does not belong to you.")
}


})

</script>

@elseif (Session::has('flash_restore_success'))


@else 
<script type="text/javascript">
  
$(window).on('load', function(){ 

$('#charDelWarningButt').hide();
console.log("Nothing to flash");
})
</script>

@endif

@if (Session::has('flash_restore_success'))

<script type="text/javascript">
  
$(window).on('load', function(){ 


window.restoreSuccess = {{ Session::get("flash_restore_success") }};
window.restoreCharName = "{{ Session::get("flash_restore_name") }}";


})

</script>

<script type="text/javascript">
  
$(window).on('load', function(){ 

$('#charDelWarningButt').show();



if (window.restoreSuccess == 1) {
  console.log("Character '" + window.restoreCharName + "' was restored.");
  $('#charDelWarningSpan').html("Character '" + window.restoreCharName + "' was restored.")
}

else {
  console.log("Error: Character does not exist, or does not belong to you.");
  $('#charDelWarningSpan').html("<b>Error:</b> Character does not exist, or does not belong to you.")
}


})

</script>


@elseif (Session::has('flash_delete_success'))

@else 
<script type="text/javascript">
  
$(window).on('load', function(){ 

$('#charDelWarningButt').hide();
console.log("Nothing to flash");
})
</script>

@endif





<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Characters <small>{{ Auth::user()->name}}'s Player Characters</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="ra ra-helmet ra-fw"></i> Characters
                            </li>
                        </ol>
                        <div class="row">
                    		<div class="col-lg-12">

                            

                       			<a href="{{ url('/create-character') }}"><button type="button" class="btn btn-success" style="margin-bottom: 0px;">Create a Character</button></a>

                            <div style="padding-right: 10px; padding-left: 5px; display: inline-block">

                            <div class="alert alert-info alert-dismissable" id="charDelWarningButt">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <span id="charDelWarningSpan"></span>
                            </div>


                       		</div>
                       	</div>


                      <div style="padding-top: 10px; padding" class="col-lg-12">
                       	<h2>Your Characters: </h2>

                        @foreach ($characters as $character)


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
                        <p><b>Class: </b>{{ $character->Class }}</p>
                        <p><b>Race: </b>{{ $character->Race }}</p>
                        <p><b>Level: </b>{{ $character->Level }}</p>

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

                        <div class="button-container col-lg-12 text-center btn-group">
                          <div class="col-xs-4">
                            <a href="/dndlaravel/dndlaravel/public/characters/{{ $character->char_id }}"><button type="button" class="btn btn-success">View Character</button></a>
                          </div>

                          <div class="col-xs-4">
                            <a href="/dndlaravel/dndlaravel/public/characters/edit/{{ $character->char_id }}">
                            <button type="button" class="btn btn-info">Edit Character</button></a>
                          </div>

                          <div class="col-xs-4" style="padding-right: 0px;"  data-toggle="modal" data-target="#myModal">
                            <button type="button" class="btn btn-danger" id="deleteCharButton{{ $character->char_id }}">Delete Character</button>
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
                                $("#charDelID").attr("href", "./characters/delete/" + $deleteCharId);
                                console.log($deleteCharName );
                          });
                            });

     

                        </script>

                        @endforeach
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