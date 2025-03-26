<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialization extends BaseModel
{
    public $timestamps = false;

    protected $fillable = [
        self::NAME,
    ];

    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
}
