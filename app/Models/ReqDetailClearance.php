<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReqDetailClearance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'request_submission_id',
        'purpose',
        'documents',
        'title_req',
        'add_inform',
    ];

    protected $casts = [
        'documents' => 'array',
    ];

    public function getDocumentsAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setDocumentsAttribute($value)
    {
        $this->attributes['documents'] = json_encode($value);
    }

    public function requestSubmission()
    {
        return $this->belongsTo(RequestSubmission::class, 'request_submission_id');
    }
}
