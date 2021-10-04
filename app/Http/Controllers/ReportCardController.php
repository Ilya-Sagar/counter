<?php

namespace App\Http\Controllers;

use App\Models\ReportCard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportCardController extends Controller
{
    public function index()
    {
        $user = User::first();

        $reports = ReportCard::where('owner_id', $user->id)->get();

        return $reports;
    }

    public function create(Request $request)
    {
        $rules = [
            'month' => 'required|string|min:3|max:10',
            'year' => 'required|int|digits:4',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return [
                'status' => 'error',
                'message' => 'incorrect data',
                'details' => $validator->errors(),
            ];
        }

        $user = User::first();

        $created = ReportCard::create(
            array_merge(
                $request->all(),
                ['owner_id' => $user->id]
            )
        );

        return $created;
    }

    public function update(Request $request, int $id)
    {

        $rules = [
            'month' => 'required|string|min:3|max:10',
            'year' => 'required|int|digits:4',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return [
                'status' => 'error',
                'message' => 'incorrect data',
                'details' => $validator->errors(),
            ];
        }

        $update = ReportCard::where('id', $id)->update($request->all());

        return $update;
    }
}
