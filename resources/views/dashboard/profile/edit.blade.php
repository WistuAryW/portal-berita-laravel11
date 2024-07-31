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
        <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('profile.update') }}" method="post">
            @csrf
            @method('patch')

            <div class="form-floating mb-3">
                <input required type="text" name="name" value="{{ $user->name }}" class="form-control"
                    id="name" placeholder="name@example.com">
                <label for="name">Username</label>
            </div>
            <div class="form-floating">
                <input required type="email" name="email" value="{{ $user->email }}" class="form-control"
                    id="email" placeholder="Password">
                <label for="email">Email</label>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-dark">Save</button>
            </div>
        </form>
    </div>
</div>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Password</h6>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')
            <div class="form-floating mb-3">
                <input type="password" name="current_password" id="current_password" class="form-control" required>
                <label for="current_password">Current Password</label>
                @error('current_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">

                <input type="password" name="new_password" id="new_password" class="form-control" required>
                <label for="new_password">New Password</label>
                @error('new_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">

                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                    class="form-control" required>
                <label for="new_password_confirmation">Confirm New Password</label>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-dark">Change Password</button>
            </div>

        </form>
    </div>
</div>

@endsection