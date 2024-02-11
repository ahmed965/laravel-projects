<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Exercice extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'number_of_repetition'
    ];

    public function trainingPlan(): BelongsToMany
    {
        return $this->belongsToMany(TrainingPlan::class, 'training_plans_exercices');
    }
}
