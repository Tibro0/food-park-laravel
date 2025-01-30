@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Create Admin</title>
@endpush

@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Admin Management</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Admin</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.admin-management.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control">
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
