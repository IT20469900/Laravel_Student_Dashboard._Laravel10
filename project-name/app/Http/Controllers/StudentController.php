<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $imagePath = $image->storeAs('images', $imageName, 'public');
        }

        $student = Student::create([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'status' => 'inactive',
            'image' => $imagePath,
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $imagePath = $image->storeAs('images', $imageName, 'public');

            if ($student->image) {
                Storage::disk('public')->delete($student->image);
            }

            $student->update([
                'image' => $imagePath,
            ]);
        }

        $student->update([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        if ($student->image) {
            Storage::disk('public')->delete($student->image);
        }

        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    public function updateStatus(Student $student)
    {
        $student->status = ($student->status == 'active') ? 'inactive' : 'active';
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student status updated successfully.');
    }
}
