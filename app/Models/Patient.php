<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Patient extends Model
{
    protected $fillable = [
        'patient_name', 'age', 'national_id', 'hospital', 'doctor',
        'account_number', 'start_date', 'end_date', 'birth_certificate',
        'patient_photo', 'father_id', 'mother_id', 'x_ray', 'dexa', 'mri', 'ct_scan', 'blood_test'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'birth_certificate' => 'array',
        'patient_photo' => 'array',
        'father_id' => 'array',
        'mother_id' => 'array',
        'x_ray' => 'array',
        'dexa' => 'array',
        'mri' => 'array',
        'ct_scan' => 'array',
        'blood_test' => 'array'
    ];

    public function getDaysRemainingAttribute()
    {
        return Carbon::now()->diffInDays($this->end_date, false);
    }

    public function getProgressPercentageAttribute()
    {
        // مؤقتاً - سنضيف هذه الحقول لاحقاً
        return rand(30, 90);
    }
}
