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
            <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
        </div>
        <div class="card-body">
            <form action="{{ url('user/update/' . $user->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-floating mb-3">
                    <input required type="text" name="name" value="{{ $user->name }}" class="form-control"
                        id="name" placeholder="name@example.com">
                    <label for="name">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="email" name="email" value="{{ $user->email }}" class="form-control"
                        id="email" placeholder="Password">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-control select2" name="role" id="role">
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>user</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>admin</option>
                    </select>
                    <label for="role">--Pilih Role--</label>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a class="btn btn-primary mx-3" href="{{ url('user') }}">Back</a>
                    <button type="submit" class="btn btn-dark">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
