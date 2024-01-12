<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $guarded = ['id'];

    use HasFactory;

    public function rombel(){
        return $this->belongsTo(Rombel::class);
    }
    public function rayon(){
        return $this->belongsTo(Rayon::class);
    }
    public function lates(){
        return $this->hasMany(Late::class);
    }
}
