

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
      <th scope="col">first</th>
      <th scope="col">last</th>
      <th scope="col">email</th>
      <th scope="col" class="text-center">action </th>
      
    </tr>
  </thead>
  <tbody>
  <?php $i = 1; ?>
                        @foreach($data as $level)
                            <?php $id = $level->id; ?>
                            <tr class="data-row">
                                <td class="iteration">{{$i++}}</td>
                                <td class="  word-break firstname">{{$level->firstname}}</td>
                                <td class=" word-break lastname ">{{$level->lastname}}</td>
                                <td class=" word-break email ">{{$level->email}}</td>
                             

                             


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
                            <label class="col-form-label" for="modal-input-firstname">firstname</label>
                            <input type="text" name="firstname" class="form-control" id="modal-input-firstname" required autofocus>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-lastname">lastname</label>
                            <input type="text" name="lastname" class="form-control" id="modal-input-lastname" required autofocus>
                        </div>
                        <!-- /name -->  
                        <!-- description -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-email">email</label>
                            <input type="text" name="email" class="form-control" id="modal-input-email" required>
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

    @endsection
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>

