<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportCardVtisitor extends Model
{
    use HasFactory;

    public function reportCard()
    {
        return $this->belongsTo(ReportCard::class);
    }

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
}
