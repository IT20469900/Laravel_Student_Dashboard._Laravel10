<!-- resources/views/students/index.blade.php -->
@extends('layout')

@section('content')
    <h1>Students</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->status }}</td>
                    <td>
                        <a href="{{ route('students.show', $student) }}" class="btn btn-info">View</a>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                        </form>
                        <form action="{{ route('students.updateStatus', $student) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-secondary">
                                {{ $student->status == 'active' ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
