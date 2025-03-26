<?php
namespace App\Models;

class TimeSlot extends BaseModel
{
    public $timestamps = false;

    protected $fillable = [
        self::DOCTOR_ID,
        self::START_TIME,
        self::END_TIME,
        self::IS_AVAILABLE,
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
