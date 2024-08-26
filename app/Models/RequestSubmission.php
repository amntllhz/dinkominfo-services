<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class RequestSubmission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'applicant',
        'email',
        'phone',
        'instansi_id',
        'status',
        'receipt',
        'service_id',
        'message',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->receipt = 'RCPT-' . now()->format('YmdHis') . '-' . Str::upper(Str::random(5));
        });
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function reqDetailDomains(): HasOne
    {
        return $this->hasOne(ReqDetailDomain::class);
    }

    public function reqDetailClearances(): HasOne
    {
        return $this->hasOne(ReqDetailClearance::class);
    }

    public function reqDetailVPSs(): HasOne
    {
        return $this->hasOne(ReqDetailVPS::class);
    }

    public function reqDetailHostings(): HasOne
    {
        return $this->hasOne(ReqDetailHosting::class);
    }
}
