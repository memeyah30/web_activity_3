@extends('base')

@section('title', 'Student List')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h4><strong>Student List</strong></h4>
        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
    </div>
    <hr>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow-lg">
        <div class="card-body">
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addNewModal">
                Add New Student
            </button>

            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $std)
                    <tr>
                        <td>{{ $std->id }}</td>
                        <td>{{ $std->name }}</td>
                        <td>{{ $std->age }}</td>
                        <td>{{ $std->gender }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('std.updateView', $std->id) }}">Edit</a>
                            <a class="btn btn-sm btn-danger" href="{{ route('std.studentDelete', $std->id) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addNewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('std.addNewStudent') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input type="number" class="form-control" name="age" placeholder="Enter age">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select class="form-control" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Save Student</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
