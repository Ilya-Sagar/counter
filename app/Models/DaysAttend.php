<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaysAttend extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(AttendType::class, 'attendType_id', 'id');
    }

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
}
