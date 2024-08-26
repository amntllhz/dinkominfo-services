<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_id',
        'name',
        'email',
        'phone',
        'instansi_id',
        'report',
        'proof',
    ];

    protected $casts = [
        'proof' => 'array',
    ];

    public function getDocumentsAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setDocumentsAttribute($value)
    {
        $this->attributes['proof'] = json_encode($value);
    }


    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
