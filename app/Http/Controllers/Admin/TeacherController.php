<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Teacher;
use Helper;
use Illuminate\Http\Request;
use Session;

class TeacherController extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('teacher-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $teacher = Teacher::where('name', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('phone_no', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $teacher = Teacher::latest()->paginate($perPage);
        }

        return view('admin.teacher.index', compact('teacher'));
    }


    public function create()
    {
        if (!Helper::authCheck('teacher-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        return view('admin.teacher.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'address' => 'required',
			'phone_no' => 'required'
		]);
        $requestData = $request->all();
        
        Teacher::create($requestData);
        Session::flash('success','Successfully Saved!');
        return redirect('admin/teacher');
    }


    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('admin.teacher.show', compact('teacher'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('teacher-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $teacher = Teacher::findOrFail($id);

        return view('admin.teacher.edit', compact('teacher'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
			'address' => 'required',
			'phone_no' => 'required'
		]);
        $requestData = $request->all();
        
        $teacher = Teacher::findOrFail($id);
        $teacher->update($requestData);
        Session::flash('success','Successfully Updated!');
        return redirect('admin/teacher');
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('teacher-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Teacher::destroy($id);
        Session::flash('success','Successfully Deleted!');
        return redirect('admin/teacher');
    }
}
