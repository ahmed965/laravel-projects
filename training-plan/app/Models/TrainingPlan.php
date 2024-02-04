<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrainingPlan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'time_per_week',
        'level',
        'goal',
        'started_at',
        'finished_at',
    ];

    public function exercices(): HasMany
    {
        return $this->hasMany(Exercice::class, 'training_plan_id');
    }
}
