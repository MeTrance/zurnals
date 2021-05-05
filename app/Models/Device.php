<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;

class Device extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getReport(){
        return $this->belongsTo(Report::class, 'device_id', 'id');
    }
}
