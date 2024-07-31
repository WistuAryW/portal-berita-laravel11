@extends('dashboard.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Edit Categorie</h6>
        </div>
       <div class="card-body">
        <form action="{{url('categories/update/' .$categories->id)}}" method="post">
            @csrf
            @method('PUT')
    
              <div class="form-floating mb-3">
                <input required type="text" name="name" value="{{$categories->name}}" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Categorie</label>
              </div>
              <div class="d-flex justify-content-end mt-3">
                <a  class="btn btn-dark mx-3" href="{{url('categories')}}">Back</a> 
                <button type="submit" class="btn btn-danger ">Save</button>
            </div>
           </form>
       </div>
    </div>
    @endsection 