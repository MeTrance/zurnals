<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Repair;
use App\Models\Device;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getRepair(){
        return $this->hasMany(\App\Models\Repair::class, 'report_id', 'id');
    }

    public function getDevice(){
        return $this->hasOne(\App\Models\Device::class, 'id', 'device_id');
    }

    public function getSource(){
        return $this->hasOne(\App\Models\Source::class, 'id', 'source_id');
    }

    public function getLocation(){
        return $this->hasOne(Location::class, 'id', 'obj_id');
    }

    public function getIssue(){
        return $this->hasOne(Issue::class, 'id', 'issue_id');
    }

    public function getUser(){
        return $this->hasOne(User::class, 'id', 'person_id');
    }

    //public function scopeGetNextId(){
    //    $statement = DB::select("show table status like 'reports'");
    //    return $statement[0]->Auto_increment;
    //}

}
