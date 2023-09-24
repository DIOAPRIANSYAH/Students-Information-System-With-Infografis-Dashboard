<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city'; // Specify table name
    protected $fillable = ['city_name', 'state'];

    public function students()
    {
        return $this->hasMany(Student::class, 'id', 'city_id');
    }
}
