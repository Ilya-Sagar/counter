<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaysAttend extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function attendType()
    {
        return $this->belongsTo(AttendType::class);
    }
}
