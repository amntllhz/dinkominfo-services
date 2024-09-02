<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instansi extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'sector',
        'phone',
    ];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function requestSubmissions()
    {
        return $this->hasMany(RequestSubmission::class);
    }
}
