<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReqDetailDomain extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'request_submission_id',
        'site',
        'ip',
        'add_inform',
        'app_name',
        'document',
        'desc_name',
    ];

    public function requestSubmission()
    {
        return $this->belongsTo(RequestSubmission::class, 'request_submission_id');
    }
}
