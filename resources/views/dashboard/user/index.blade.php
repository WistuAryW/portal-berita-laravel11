@extends('dashboard.main')
@section('content')
@if (session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000
        });
    });
</script>
@endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Data User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead >
                        <tr class="bg-dark text-white" >
                            <th>No</th>
                            <th>Username</th>
                            <th style="width: 20%">Email</th>
                            <th style="width: 45%">Rore</th>
                            <th class="d-flex justify-content-center" >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->role}}</td>
                            <td class="d-flex justify-content-center"  >
                                <div class="row">
                                    <div class="col mb-3">
                                        <a class="form-control btn btn-warning" href="{{url('edit-user-'. $item->id)}}" >Edit</a>
                                    </div>
                                    <div class="col ">
                                        <form action="{{url('/user/destroy/' .$item->id)}}"  id="delete-form-{{ $item->id }}" style="display: inline;" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $item->id }})"   class="form-control btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection 