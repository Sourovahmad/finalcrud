@extends("layout.app")
@section("content")

<div class="container">
    <div class="raw">
<form action="{{route('store')}}" method ="POST" >
 @csrf
  <div class="form-group">
    <label for="exampleInputEmail1"></label>
    <input type="text"  name="name" class="form-control"  placeholder="Enter name">   
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"></label>
    <input type="text"  name="descreption" class="form-control"  placeholder="Enter descreption">   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"></label>
    <input type="text"  name="comment" class="form-control"  placeholder="Enter comment">   
  </div>
 
 
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
</div>
@endsection