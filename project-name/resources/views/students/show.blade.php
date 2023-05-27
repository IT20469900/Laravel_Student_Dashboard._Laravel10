<!-- resources/views/students/show.blade.php -->
@extends('layout')

@section('content')
    <h1>Student Details</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $student->name }}</h5>
            <p class="card-text">Age: {{ $student->age }}</p>
            <p class="card-text">Status: {{ $student->status }}</p>
            <img src="{{ asset('storage/' . $student->image) }}" alt="{{ $student->name }}" class="img-fluid">
        </div>
    </div>

    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
@endsection
