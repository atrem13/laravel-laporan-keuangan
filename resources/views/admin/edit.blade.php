@extends('template.main')

@section('body')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.index') }}" class="btn btn-secondary mb-3"><i class="fa fa-fw fa-arrow-left"></i>Back</a>
            <div class="card m-b-30 card-body">
                <h4 class="card-title font-16 mt-0">Edit</h4>
                <form action="{{ route('admin.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $data->name) }}">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="{{ old('username', $data->username) }}">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success mr-2">Update</button>
                        <button type="reset" class="btn btn-danger mr-2">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
