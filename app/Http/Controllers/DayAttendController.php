<?php

namespace App\Http\Controllers;

use App\Models\AttendType;
use App\Models\DaysAttend;
use App\Models\ReportCard;
use App\Models\Visitor;
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
        $dataInsert['day'] = strtotime($request->day . ' ' . $reportCard->month_eng . ' ' . $reportCard->year);

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
        $dataUpdate['day'] = strtotime($request->day . ' ' . $reportCard->month_eng . ' ' . $reportCard->year);

        $create = DaysAttend::where('id', $id)->update($dataUpdate);

        return $create;
    }

    public function createOrUpdateForm($id)
    {
        $reportCard = ReportCard::find($id);
        $visitors = Visitor::all();
        $attendTypes = AttendType::all();

        return view('main.report.manageData.editReport', [
            'report' => $reportCard,
            'visitors' => $visitors,
            'attendTypes' => $attendTypes,
        ]);
    }

    public function createOrUpdate(Request $request)8000
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

        $data = $request->all();
        $data['day'] = strtotime($request->day . ' ' . $reportCard->month_eng . ' ' . $reportCard->year);

        $dayAttend = DaysAttend::
            where('day', $data['day'])->
            where('visitor_id', $data['visitor_id'])->
            where('reportCard_id', $data['reportCard_id'])->
            first();

        if ($dayAttend === null) {
            $dayAttend = DaysAttend::create($data);
        } else {
            $dayAttend->attendType_id = $request->attendType_id;
            $dayAttend->save();
        }

        return redirect()->route('home');

    }

    public function showReport($reportId)
    {
        $reportCard = ReportCard::find($reportId);
        $attends = DaysAttend::where('reportCard_id', $reportId)->get();
        $visitors = Visitor::all();
        $attendTypes = AttendType::all();

        $daysInMonth = date('t', $attends[0]->day);

        // main array
        $visits = [];

        foreach ($attends as $attend) {
            // limit days range
            for ($day = 1; $day <= $daysInMonth; $day++) {

                // check for a day of attend is(equals) a day of iteration
                if ($day == date('j', $attend->day)) {
                    $visits[$attend->visitor->name]['days'][$day] = $attend->type->name;
                }

                if (!isset($visits[$attend->visitor->name]['days'][$day])) {
                    $visits[$attend->visitor->name]['days'][$day] = '';
                }
            }

            // fill all attend types
            foreach ($attendTypes as $attendType) {
                $visits[$attend->visitor->name]['attend'][$attendType->name] = $attend->visitor->countDaysWithAttendType($reportCard, $attendType);
            }

            $visits[$attend->visitor->name]['attend']['общ.нет'] = $attend->visitor->countMissDays($reportCard);
            $visits[$attend->visitor->name]['attend']['общ.есть'] = $daysInMonth - $visits[$attend->visitor->name]['attend']['общ.нет'];
        }

            return view('main.report.manageData.detailReport', [
            'visits' => $visits,
            'daysInMonth' => $daysInMonth,
            'attendTypes' => $attendTypes,
            'visitors' => array_keys($visits),
        ]);
    }
}
