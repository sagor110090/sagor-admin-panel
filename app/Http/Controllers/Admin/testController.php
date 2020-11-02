<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\test;
use Illuminate\Http\Request;
use Toastr;
use Helpers;

class testController extends Controller
{

    public function index(Request $request)
    {
        $test = test::all();
        return view('admin.test.index', compact('test'));
    }


    public function create()
    {
        return view('admin.test.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required'
		]);
        $requestData = $request->all();
        
        test::create($requestData);
        Toastr::success('test added!', 'Done', ["positionClass" => "toast-top-right"]);
        return redirect('admin/test');
    }


    public function show($id)
    {
        $test = test::findOrFail($id);

        return view('admin.test.show', compact('test'));
    }

    public function edit($id)
    {
        $test = test::findOrFail($id);

        return view('admin.test.edit', compact('test'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required'
		]);
        $requestData = $request->all();
        
        $test = test::findOrFail($id);
        $test->update($requestData);

        Toastr::success('test updated!', 'Done', ["positionClass" => "toast-top-right"]);
        return redirect('admin/test');
    }


    public function destroy($id)
    {
        test::destroy($id);
        Toastr::success('test deleted!', 'Done', ["positionClass" => "toast-top-right"]);
        return redirect('admin/test');
    }
}
