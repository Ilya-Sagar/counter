<?php

namespace App\Models;

use Facade\FlareClient\Report;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reportCards()
    {
        return $this->hasMany(ReportCardVtisitor::class);
    }

    public function countAttends($attendTypeId, $reportCardId)
    {
        $asdf = DaysAttend::
                            where('reportCard_id', $reportCardId)->
                            where('attendType_id', $attendTypeId)->
                            count();
        dump($asdf);
    }

    public function countMissDays(ReportCard $reportCard)
    {
        $attends = DaysAttend::
                            where('reportCard_id', $reportCard->id)->
                            where('visitor_id', $this->id)->
                            get();

        if ($attends->isEmpty()) {
            return null;
        }

        $miss = 0;

        foreach ($attends as $attend) {
            if ($attend->type->is_miss) {
                $miss++;
            }
        }

        return $miss;
    }

    public function countDaysWithAttendType(ReportCard $reportCard, AttendType $attendType)
    {
        return DaysAttend::
                        where('reportCard_id', $reportCard->id)->
                        where('attendType_id', $attendType->id)->
                        where('visitor_id', $this->id)->
                        count();
    }
}
