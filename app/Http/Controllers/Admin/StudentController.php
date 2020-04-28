<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Student;
use Helper;
use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('student-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $student = Student::where('name', 'LIKE', "%$keyword%")
                ->orWhere('class', 'LIKE', "%$keyword%")
                ->orWhere('roll', 'LIKE', "%$keyword%")
                ->orWhere('id_no', 'LIKE', "%$keyword%")
                ->orWhere('blood_group', 'LIKE', "%$keyword%")
                ->orWhere('father', 'LIKE', "%$keyword%")
                ->orWhere('monther', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $student = Student::latest()->paginate($perPage);
        }

        return view('admin.student.index', compact('student'));
    }


    public function create()
    {
        if (!Helper::authCheck('student-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        return view('admin.student.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'class' => 'required',
			'roll' => 'required',
			'id_no' => 'required',
			'blood_group' => 'required',
			'father' => 'required',
			'monther' => 'required'
		]);
        $requestData = $request->all();
        
        Student::create($requestData);
        Session::flash('success','Successfully Saved!');
        return redirect('admin/student');
    }


    public function show($id)
    {
        $student = Student::findOrFail($id);

        return view('admin.student.show', compact('student'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('student-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $student = Student::findOrFail($id);

        return view('admin.student.edit', compact('student'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
			'class' => 'required',
			'roll' => 'required',
			'id_no' => 'required',
			'blood_group' => 'required',
			'father' => 'required',
			'monther' => 'required'
		]);
        $requestData = $request->all();
        
        $student = Student::findOrFail($id);
        $student->update($requestData);
        Session::flash('success','Successfully Updated!');
        return redirect('admin/student');
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('student-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Student::destroy($id);
        Session::flash('success','Successfully Deleted!');
        return redirect('admin/student');
    }
}
