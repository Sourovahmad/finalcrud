

<!doctype html>
@extends('layout.app')

@section('content')

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css')}}" >
+
    <title>crud project</title>
  </head>
  <body>

  @if (session('successMsg'))
	<div class="alert alert-dismissible alert-success">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Well done!</strong> {{ session('successMsg') }}
	</div>
	@endif 

    <div class="container">
        <div class="row">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">descreption</th>
      <th scope="col">comment</th>
      <th scope="col" class="text-center">action </th>
      
    </tr>
  </thead>
  <tbody>
  <?php $i = 1; ?>
                        @foreach($data as $level)
                            <?php $id = $level->id; ?>
                            <tr class="data-row">
                                <td class="iteration">{{$i++}}</td>
                                <td class="  word-break name">{{$level->name}}</td>
                                <td class=" word-break descreption ">{{$level->descreption}}</td>
                                <td class=" word-break comment ">{{$level->comment}}</td>
                             

                             


                                <td class="align-middle">
                                <button type="button" class="btn btn-success" id="level-edit-item" data-item-id={{$id}}> <i class="fa fa-edit" aria-hidden="false"> </i></button>

                                    <form method="POST" action="{{ route('destroy',  $level->id )}} " id="delete-form-{{ $level->id }}" style="display:none; ">
                                        {{csrf_field() }}
                                        {{ method_field("delete") }}
                                    </form>


                                    <button onclick="if(confirm('are you sure to delete this')){
                                        document.getElementById('delete-form-{{ $level->id }}').submit();
                                        }
                                        else{
                                        event.preventDefault();
                                        }
                                        " class="btn btn-danger btn-sm btn-raised">
                                        <i class="fa fa-trash" aria-hidden="false"></i>
                                    </button>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{$data->links()}}
                </div>
            </div>
        </div>

    </div>

 <!-- Attachment Modal -->
    <div class="modal fade" id="level-edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="edit-modal-label ">Edit Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="attachment-body-content">
                    <form id="level-edit-form" class="form-horizontal" method="POST" action="">
                    @csrf
                      
                    <!-- id -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-id">Id </label>
                            <input type="text" name="id" class="form-control" id="modal-input-id" required readonly>
                        </div>
                        <!-- /id -->
                        <!-- name -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-name">name</label>
                            <input type="text" name="name" class="form-control" id="modal-input-name" required autofocus>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-descreption">descreption</label>
                            <input type="text" name="descreption" class="form-control" id="modal-input-descreption" required autofocus>
                        </div>
                        <!-- /name -->  
                        <!-- description -->
                      
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-comment">comment</label>
                            <input type="text" name="comment" class="form-control" id="modal-input-comment" required>
                        </div>
                       
                        <div class="form-group">
                            <input type="submit" value="Submit" class="form-control btn btn-success">
                        </div>
                        <!-- /description -->
                    </form>
                </div>

            </div>
        </div>
    </div>
    
		 <!-- /Attachment Modal -->
         
		 <script>
$(document).ready(function(){

$(document).on('click', "#level-edit-item", function() {

    $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

    var options = {
      'backdrop': 'static'
    };
    
    $('#level-edit-modal').modal(options)
  });

  // on modal show
  $('#level-edit-modal').on('show.bs.modal', function() {
    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
    var row = el.closest(".data-row");

    // get the data
    var id = el.data('item-id');
    var name = row.children(".name").text();
    var descreption = row.children(".descreption").text();
    var comment = row.children(".comment").text();




    var action= $("#indexLink").val()+'/update/'+id;
    console.log(action);
    $("#level-edit-form").attr('action',action);
    

    // fill the data in the input fields
    $("#modal-input-id").val(id);
    $("#modal-input-name").val(name);
    $("#modal-input-descreption").val(descreption);
    $("#modal-input-comment").val(comment);

  });
  //on modal hide
  $('#level-edit-modal').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#level-edit-form").trigger("reset");
  });
}) ;
</script> 


    @endsection
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>

