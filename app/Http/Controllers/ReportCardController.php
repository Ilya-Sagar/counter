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

        return view('main.reportsList', ['reports' => $reports]);
    }

    public function showReport(int $id)
    {
        $report = ReportCard::find($id);

        return view('main.report.report', ['report' => $report]);
    }

    public function createForm()
    {
        return view('main.createReport');
    }

    public function create(Request $request)
    {
        $rules = [
            'month_ru' => 'required|string|min:3|max:10',
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

        // translate name from Ru to Eng

        $month = mb_strtolower($request->month_ru);

        $ru_eng = [
            'январь' => 'January',
            'февраль' => 'February',
            'март' => 'March',
            'апрель' => 'April',
            'май' => 'May',
            'июнь' => 'June',
            'июль' => 'July',
            'август' => 'August',
            'сентябрь' => 'September',
            'октябрь' => 'October',
            'ноябрь' => 'November',
            'декабрь' => 'December'
        ];

        $month_eng = $ru_eng[$month];

        $user = User::first();

        $created = ReportCard::create(
            array_merge(
                $request->all(),
                [
                    'owner_id' => $user->id,
                    'month_eng' => $month_eng
                ]
            )
        );

        return redirect()->route('home');
    }

    public function update(Request $request, int $id)
    {
        $rules = [
            'month_ru' => 'required|string|min:3|max:10',
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

        // translate name from Ru to Eng

        $month = mb_strtolower($request->month_ru);

        $ru_eng = [
            'январь' => 'January',
            'февраль' => 'February',
            'март' => 'March',
            'апрель' => 'April',
            'май' => 'May',
            'июнь' => 'June',
            'июль' => 'July',
            'август' => 'August',
            'сентябрь' => 'September',
            'октябрь' => 'October',
            'ноябрь' => 'November',
            'декабрь' => 'December'
        ];

        $month_eng = $ru_eng[$month];

        $update = ReportCard::where('id', $id)->update(array_merge(
            $request->all(),
            [
                'month_eng' => $month_eng
            ]
        ));

        return $update;
    }
}
