<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academician extends Model
{
    protected $primaryKey = 'staff_number';

    protected $fillable = ['staff_number', 'name', 'email', 'college', 'department', 'position'];

    // public function guardian(){
    //     return $this->belongsTo(Guardian::class);
    // }
}
