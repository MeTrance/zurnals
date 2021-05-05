<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;
class Repair extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getReport(){
        return $this->hasOne(\App\Models\Report::class, "id", "report_id");
    }

    public function getState(){
        return $this->hasOne(State::class, 'id', 'state_id');
    }

    public function getUser(){
        return $this->hasOne(User::class, 'id', 'person_id');
    }
}
