<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VisitorController extends Controller
{
    public function createForm()
    {
        return view('main.report.manageData.addVisitor');
    }

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return [
                'status' => 'error',
                'message' => 'incorrect data',
                'details' => $validator->errors(),
            ];
        }

        Visitor::create($request->all());

        return redirect()->route('home');
    }

    public function update(Request $request, int $id)
    {
        $rules = [
            'name' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return [
                'status' => 'error',
                'message' => 'incorrect data',
                'details' => $validator->errors(),
            ];
        }

        $update = Visitor::where('id', $id)->update($request->all());

        return $update;
    }

    public function search(Request $request)
    {
        $rules = [
            'name' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'incorrect data',
                'details' => $validator->errors(),
            ], 400);
        }

        $visitors = Visitor::where('name', 'like', '%'.$request->name.'%')->get();

        return $visitors;
    }
}
