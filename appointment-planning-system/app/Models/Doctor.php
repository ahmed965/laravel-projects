<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends BaseModel
{
    public $timestamps = false;

    protected $hidden = [self::SPECIALISATION_ID];

    protected $fillable = [
        self::NAME,
        self::SPECIALISATION_ID,
    ];

    public function specialization(): BelongsTo
    {
        return $this->belongsTo(Specialization::class);
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function timeSlots()
    {
        return $this->hasMany(TimeSlot::class);
    }

}
