<?php
namespace App\Models;

class Appointment extends BaseModel
{
    public $timestamps = false;

    protected $hidden = [self::DOCTOR_ID];

    protected $fillable = [
        self::DOCTOR_ID,
        self::PATIENT_NAME,
        self::PATIENT_EMAIL,
        self::DATE_TIME,
        self::STATUS,
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
