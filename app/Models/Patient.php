<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Patient extends Model
{
    protected $fillable = [
        'name', 'age', 'phone', 'address', 'hospital_name', 'doctor_name',
        'bank_account', 'start_date', 'finish_date', 'patient_photo',
        'target_amount', 'collected_amount', 'status'
    ];

    protected $casts = [
        'start_date' => 'date',
        'finish_date' => 'date',
        'target_amount' => 'decimal:2',
        'collected_amount' => 'decimal:2'
    ];

    public function getDaysRemainingAttribute()
    {
        return Carbon::now()->diffInDays($this->finish_date, false);
    }

    public function getProgressPercentageAttribute()
    {
        if ($this->target_amount == 0) return 0;
        return min(100, ($this->collected_amount / $this->target_amount) * 100);
    }
}
