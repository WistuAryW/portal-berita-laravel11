@extends('dashboard.main')
@section('content')
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Gejala</h6>
        </div>
        <div class="card-body">
            <form action="{{ url('subcategorie/store') }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <select class="form-control select2" name="categorie_id" id="categorie_id">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label for="categorie_id">--Pilih Categorie--</label>
                </div>
                <div class="form-floating">
                    <input required type="text" name="name" class="form-control" id="name">
                    <label for="name">Sub Categorie</label>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a class="btn btn-dark mx-3" href="{{ url('subcategorie') }}">Back</a>
                    <button type="submit" class="btn btn-danger">Save</button>
                </div>
            </form>
        </div>
        
    </div>
@endsection