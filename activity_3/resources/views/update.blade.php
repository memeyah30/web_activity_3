@extends('base')

@section('title', 'Update Student')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-4">
                <h4 class="text-center"><strong>Update Student</strong></h4>
                <hr>

                @foreach($students as $std)
                <form method="post" action="{{ route('std.studentUpdate') }}">
                    @csrf

                    <input type="hidden" name="id" value="{{ $std->id }}">

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $std->name }}" placeholder="Enter name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input type="number" class="form-control" name="age" value="{{ $std->age }}" placeholder="Enter age">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select class="form-control" name="gender">
                            <option value="Male" {{ $std->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $std->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>
                @endforeach

                <hr>
                <div class="text-center">
                    <a class="btn btn-secondary" href="{{ route('std.myView') }}">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
