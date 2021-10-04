<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportCard extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function visitors()
    {
        return $this->hasMany(ReportCardVtisitor::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
