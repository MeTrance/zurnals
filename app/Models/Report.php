<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Repair;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
    use HasFactory;

    public function repair(){
        return $this->belongsTo(Repair::class, 'report_id', 'id');
    }

    //public function scopeGetNextId(){
    //    $statement = DB::select("show table status like 'reports'");
    //    return $statement[0]->Auto_increment;
    //}

}
