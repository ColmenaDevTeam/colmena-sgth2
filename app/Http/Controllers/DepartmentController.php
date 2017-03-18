<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Carbon\Carbon;
use Validator;

class DepartmentController extends Controller
{
	public function index(){
		return view('modules.departments.list')->with('departments', Department::all());
	}

    public function showDataForm(){
		return view('modules.departments.forms.data-form');
	}

	public function register(Request $request){
		Validator::make($request->input(), [
			'name' => 'required|min:3|max:45|string',
			'slug' => 'required|min:3|max:45',
			'description' => 'min:10|max:255'
		])->validate();

		$department = new Department();
		$department->name = $request->name;
		$department->slug = $request->slug;
		$department->description = $request->description;
		$department->save();
		\Session::push('success' , true);
		return redirect("departamentos/registrar");
	}

	public function showUpdateForm(Request $request){
		$department = Department::find($request->id);
		if (!$department) return view('errors.404');
		return view('modules.departments.forms.data-form')->with('department', $department);
	}

	public function update(Request $request){
		$department = Department::find($request->id);
		if (!$department) return view('errors.404');
		Validator::make($request->input(), [
			'name' => 'required|min:3|max:45|string',
			'slug' => 'required|min:3|max:45',
			'description' => 'min:10|max:255'
		])->validate();

		$department->name = $request->name;
		$department->slug = $request->slug;
		$department->description = $request->description;
		$department->save();
		$departments = Department::all();
		\Session::push('success', true);
		return redirect("departamentos/listar")->with('departments', $departments);
	}
}
