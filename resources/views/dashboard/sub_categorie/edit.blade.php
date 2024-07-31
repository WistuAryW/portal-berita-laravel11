@extends('dashboard.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Sub Categirie</h6>
        </div>
        <div class="card-body">
            <form action="{{ url('subcategorie/update/' . $subCategorie->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <select class="form-control select2" name="categorie_id" id="categorie_id">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ $subCategorie->categorie_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label for="categorie_id">--Pilih Categorie--</label>
                </div>
                <div class="form-floating">
                    <input required type="text" name="name" value="{{ $subCategorie->name }}" class="form-control"
                        id="floatingPassword">
                    <label for="floatingPassword">Sub Categorie</label>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a class="btn btn-dark mx-3" href="{{ url('subcategorie') }}">Back</a>
                    <button type="submit" class="btn btn-danger">Save</button>
                </div>
            </form>
        </div>

    </div>
@endsection
