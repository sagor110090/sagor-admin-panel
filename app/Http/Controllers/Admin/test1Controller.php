<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\test1;
use Illuminate\Http\Request;
use Session;
use Helper;
use Storage;

class test1Controller extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('test1-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $test1 = test1::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $test1 = test1::latest()->paginate($perPage);
        }
        Helper::activityStore('Show','test1  Show All Record');
        return view('admin.test1.index', compact('test1'));
    }


    public function create()
    {
        if (!Helper::authCheck('test1-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Helper::activityStore('Create','test1 Add New button clicked');
        return view('admin.test1.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'email' => 'required'
		]);
        $requestData = $request->all();
        
        test1::create($requestData);
        Session::flash('success','Successfully Saved!');
        Helper::activityStore('Store','test1 Record Saved');
        return redirect('admin/test1');
    }


    public function show($id)
    {
        $test1 = test1::findOrFail($id);
        Helper::activityStore('Store','test1 Single Record showed');
        return view('admin.test1.show', compact('test1'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('test1-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $test1 = test1::findOrFail($id);
        Helper::activityStore('Edit','test1 Edit button clicked');
        return view('admin.test1.edit', compact('test1'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
			'email' => 'required'
		]);
        $requestData = $request->all();
        
        $test1 = test1::findOrFail($id);
        $test1->update($requestData);
        Session::flash('success','Successfully Updated!');
        Helper::activityStore('Update','test1 Record Updated');
        return redirect('admin/test1');
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('test1-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        test1::destroy($id);
        Session::flash('success','Successfully Deleted!');
        Helper::activityStore('Delete','test1 Delete button clicked');
        return redirect('admin/test1');
    }
}
