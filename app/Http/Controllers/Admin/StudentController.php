<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Session;
use Helper;
use Storage;

class StudentController extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('student-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $student = Student::where('name', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $student = Student::latest()->paginate($perPage);
        }
        Helper::activityStore('Show','student  Show All Record');
        return view('admin.student.index', compact('student'));
    }


    public function create()
    {
        if (!Helper::authCheck('student-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Helper::activityStore('Create','student Add New button clicked');
        return view('admin.student.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'address' => 'required'
		]);
        $requestData = $request->all();
        
        Student::create($requestData);
        Session::flash('success','Successfully Saved!');
        Helper::activityStore('Store','student Record Saved');
        return redirect('admin/student');
    }


    public function show($id)
    {
        $student = Student::findOrFail($id);
        Helper::activityStore('Store','student Single Record showed');
        return view('admin.student.show', compact('student'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('student-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $student = Student::findOrFail($id);
        Helper::activityStore('Edit','student Edit button clicked');
        return view('admin.student.edit', compact('student'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
			'address' => 'required'
		]);
        $requestData = $request->all();
        
        $student = Student::findOrFail($id);
        $student->update($requestData);
        Session::flash('success','Successfully Updated!');
        Helper::activityStore('Update','student Record Updated');
        return redirect('admin/student');
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('student-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Student::destroy($id);
        Session::flash('success','Successfully Deleted!');
        Helper::activityStore('Delete','student Delete button clicked');
        return redirect('admin/student');
    }
}
