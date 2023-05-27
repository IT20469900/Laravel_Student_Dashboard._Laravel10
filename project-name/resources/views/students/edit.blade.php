<!-- resources/views/students/edit.blade.php -->
@extends('layout')

@section('content')
    <h1>Edit Student</h1>

    <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}" required>
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ $student->age }}" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control-file">
            <small class="form-text text-muted">Leave blank to keep the existing image.</small>
        </div>

        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
@endsection
