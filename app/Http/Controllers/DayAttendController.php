<?php

namespace App\Http\Controllers;

use App\Models\DaysAttend;
use App\Models\ReportCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DayAttendController extends Controller
{
    public function makeReport(Request $request)
    {
        //
    }

    public function create(Request $request)
    {
        $rules = [
            'day' => 'required|int',
            'attendType_id' => 'required|int|digits:1',
            'visitor_id' => 'required|int|digits:1',
            'reportCard_id' => 'required|int',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'incorrect data',
                'details' => $validator->errors(),
            ]);
        }

        $reportCard = ReportCard::find($request->reportCard_id);

        $dataInsert = $request->all();
        $dataInsert['day'] = strtotime($request->day . ' ' . $reportCard->month . ' ' . $reportCard->year);

        $create = DaysAttend::create($dataInsert);

        return $create;
    }

    public function update(Request $request, int $id)
    {
        $rules = [
            'day' => 'required|int',
            'attendType_id' => 'required|int|digits:1',
            'visitor_id' => 'required|int|digits:1',
            'reportCard_id' => 'required|int',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'incorrect data',
                'details' => $validator->errors(),
            ]);
        }

        $reportCard = ReportCard::find($request->reportCard_id);

        $dataUpdate = $request->all();
        $dataUpdate['day'] = strtotime($request->day . ' ' . $reportCard->month . ' ' . $reportCard->year);

        $create = DaysAttend::where('id', $id)->update($dataUpdate);

        return $create;
    }
}
