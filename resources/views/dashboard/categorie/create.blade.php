@extends('dashboard.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Tambah Categorie</h6>
        </div>
        <div class="card-body">
            <form action="{{ url('categories/store') }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input required type="text" name="name" class="form-control" id="name">
                    <label for="name">Categorie</label>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a class="btn btn-dark mx-3" href="{{ url('categories') }}">Back</a>
                    <button type="submit" class="btn btn-danger">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
