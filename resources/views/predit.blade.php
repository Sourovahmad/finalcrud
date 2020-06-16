@extends("layout.app")
@section("content")

<div class="container">
    <div class="raw">
<form action="{{route('update',$all->id)}}" method ="POST" >
@csrf_field
  <div class="form-group">
    <label for="exampleInputEmail1"></label>
    <input type="text"  name="name" class="form-control"  value="{{$all->name}}">   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"></label>
    <input type="text"  name="descreption" class="form-control"  value="{{$all->descreption}}">   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"></label>
    <input type="Email"  name="comment" class="form-control"  value="{{$all->comment}}">   
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
</div>
@endsection