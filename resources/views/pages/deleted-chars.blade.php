@extends('layouts.master')

@section('content')

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


@elseif (Session::has('flash_pDelete_success'))

<script type="text/javascript">

window.pDeleteSuccess = {{ Session::get("flash_pDelete_success") }};
window.pDeleteCharName = "{{ Session::get("flash_pDelete_name") }}";
  
$(window).on('load', function(){ 

$('#charDelWarningButt').show();



if (window.pDeleteSuccess == 1) {
  console.log("Character '" + window.pDeleteCharName + "' was permanently deleted. RIP.");
  $('#charDelWarningSpan').html("Character '" + window.pDeleteCharName + "' was permanently deleted. RIP.")
}

else {
  console.log("Error: Character does not exist, or does not belong to you.");
  $('#charDelWarningSpan').html("<b>Error:</b> Character does not exist, or does not belong to you.")
}


})

</script>



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
                            Deleted Characters 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="ra ra-skull ra-fw"></i> Characters / Deleted Characters
                            </li>
                        </ol>

                        <div style="padding-right: 10px; padding-left: 5px; display: inline-block">

                            <div class="alert alert-info alert-dismissable" id="charDelWarningButt">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <span id="charDelWarningSpan"></span>
                        </div>
                        </div>
                        </div>

                        <div class="col-lg-12">

                        @foreach ($deletedChars as $deletedChar)

                        <div class="well col-lg-5 char-box-main" style="margin-right: 20px; margin-right: 20px; padding-left: 10px; padding-right: 10px; padding-top: 0px;">
                            <h2>{{ $deletedChar->character_name }}</h2>
                            <p><b>Class: </b>{{ $deletedChar->Class }}</p>
                            <p><b>Race: </b>{{ $deletedChar->Race }}</p>
                            <p><b>Level: </b>{{ $deletedChar->Level }}</p>
                            <a href="/dndlaravel/dndlaravel/public/characters/restore/{{ $deletedChar->char_id }}">
                            <button 
                            type="button" class="btn btn-warning">Restore Character</button></a>
                            
                             
                            <button data-toggle="modal" data-target="#pDeleteModal"
                            type="button" class="btn btn-danger" id="pDeleteCharButton{{ $deletedChar->char_id }}">Permanently Delete Character</button>
                           
                        </div>

                        <script type="text/javascript">
                          $(document).ready(function(){
                              $('#pDeleteCharButton{{ $deletedChar->char_id }}').click(function(){

                                $pDeleteCharId = {{ $deletedChar->char_id }};
                                $pDeleteCharName = "{{ $deletedChar->character_name }}";

                                $('#charNameDel').html($pDeleteCharName);
                                $("#charpDelID").attr("href", "./characters/pdelete/" + $pDeleteCharId);
                                console.log($pDeleteCharName );
                          });
                            });

     

                        </script>

                        @endforeach


                    </div>
                </div>








            </div>
</div>

<!-- Modal -->
<div class="modal fade" id="pDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d43f3a">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: #ffffff"><b>Confirm permanent deletion</b></h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to <b>permanently</b> delete <b><span id="charNameDel"></span></b>?</p><br>
        <p>(This action cannot be undone, as the character will be banished to the 9 Hells for eternity.)</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
        <a id="charpDelID" href=""><button type="button" class="btn btn-danger">Permanently Delete</button></a>
      </div>
    </div>
  </div>
</div>

@endsection