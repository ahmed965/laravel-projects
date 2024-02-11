<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('training_plans_exercices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('training_plan_id')->unsigned();
            $table->unsignedBiginteger('exercice_id')->unsigned();

            $table->foreign('training_plan_id')->references('id')
                ->on('training_plans')->onDelete('cascade');
            $table->foreign('exercice_id')->references('id')
                ->on('exercices')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
