<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{

    public function myView()
    {
        
       $students = Students::paginate(5);
        $users = User::all();

        return view('dashboard', compact('students', 'users'));
    }

    
    public function search(Request $request)
    {
        $search = $request->input('search'); 
       $students = Students::where('name', 'like', "%{$search}%")->paginate(5)->appends(['search' => $search]); 

        return view('dashboard', compact('students')); 
    }


    public function addNewStudent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
        ]);

        //students
        $add_new = new Students;
        $add_new->id = $request->id;
        $add_new->name = $request->name;
        $add_new->age = $request->age;
        $add_new->gender = $request->gender;
        $add_new->save();

        return back()->with('success', 'Student added successfully');
    }

    public function index(Request $request)
    {
      
       $students = Students::paginate(5);  
       $totalStudents = Students::count();
       return view('dashboard', compact('students')); 
    }



    public function edit($id)
    {
        $student = Students::find($id);
        return view('students.edit', compact('student'));
    }

            public function update(Request $request, $id)
        {

            $request->validate([
                'name' => 'required',
                'age' => 'required',
                'gender' => 'required',
            ]);

            

            // Update the student's data
            $student->update([
                'name' => $request->name,
                'age' => $request->age,
                'gender' => $request->gender,
            ]);

            // Redirect back with a success message
            return redirect()->route('students.index')->with('success', 'Student updated successfully!');
        }

           

    //to delete 
    public function destroy($id)
    {
        $student = Students::findOrFail($id);
        $student->delete();

        return redirect('/')->with('success', 'Student deleted successfully.');
    
    }


}