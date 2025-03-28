<?php

namespace App\Models;

use App\Services\OwaspZapService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getScanStatusAttribute($value)
    {
        if ($value == 'Scan Completed') {
            return 'Completed';
        } elseif ($value == 'initialized') {
            return 'Initialized Scan';
        } else {
            return $value;
        }
    }

    /**
     * Get the domain that owns the scan.
     */
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    /**
     * Get the user that owns the scan.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the scan results for the scan.
     */
    public function scanResults()
    {
        return $this->hasOne(ScanResult::class);
    }

    /**
     * Get the scan alerts for the scan.
     */
    public function scanAlerts()
    {
        return $this->hasMany(ScanAlerts::class, 'id', 'scan_id');
    }

    /**
     * Get the report for the scan.
     */
    public function generateReport()
    {

    }

    public function getScoreAttribute()
    {
        $score = $this->scanResults()->latest()->pluck('score')->first();
        return $score;
    }

    public function isComplete()
    {
        return $this->scan_status == 'Completed';
    }

}
