@extends('dashboard.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col d-flex justify-content-start">
                    <h6 class="pt-2 font-weight-bold text-dark">Data Categories</h6>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-dark" href="{{ url('create-categories') }}"> Add Categorie</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>No</th>
                            <th style="width: 70%">Categorie</th>
                            <th class="d-flex justify-content-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="d-flex justify-content-center">
                                    <div class="row">
                                        <div class="col">
                                            <a class=" form-control btn btn-warning"
                                                href="{{ url('edit-categories-' . $item->id) }}">Edit</a>
                                        </div>
                                        <div class="col">
                                            <form action="{{ url('/categories/destroy/' . $item->id) }}"
                                                id="delete-form-{{ $item->id }}" style="display: inline;"
                                                method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" onclick="confirmDelete({{ $item->id }})"
                                                    class=" form-control btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links('pagination::bootstrap-5') }}
            </div>
        </div>

       
    </div>
@endsection
