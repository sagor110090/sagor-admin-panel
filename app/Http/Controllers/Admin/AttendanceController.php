<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Helper;
use Illuminate\Http\Request;
use Session;

class AttendanceController extends Controller
{

     public function index(Request $request)
    {
        // dd(Helper::isAdmin());
        if (!Helper::authCheck('attendance-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $attendance = Attendance::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('phone_no', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $attendance = Attendance::latest()->paginate($perPage);
        }

        return view('admin.attendance.index', compact('attendance'));
    }


    public function create()
    {
        if (!Helper::authCheck('attendance-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        return view('admin.attendance.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'email' => 'required',
			'phone_no' => 'required',
			'address' => 'required'
		]);
        $requestData = $request->all();
        
        Attendance::create($requestData);
        Session::flash('success','Successfully Saved!');
        return redirect('admin/attendance');
    }


    public function show($id)
    {
        $attendance = Attendance::findOrFail($id);

        return view('admin.attendance.show', compact('attendance'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('attendance-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $attendance = Attendance::findOrFail($id);

        return view('admin.attendance.edit', compact('attendance'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
			'email' => 'required',
			'phone_no' => 'required',
			'address' => 'required'
		]);
        $requestData = $request->all();
        
        $attendance = Attendance::findOrFail($id);
        $attendance->update($requestData);
        Session::flash('success','Successfully Updated!');
        return redirect('admin/attendance');
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('attendance-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Attendance::destroy($id);
        Session::flash('success','Successfully Deleted!');
        return redirect('admin/attendance');
    }
}
