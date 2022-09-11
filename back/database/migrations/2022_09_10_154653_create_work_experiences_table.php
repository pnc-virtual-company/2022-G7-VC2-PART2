<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->date('start_year');
            $table->date('end_year');
            $table->foreignId('company_id')->constrained()->onDelete('CASCADE');
            // $table->foreignId('alumni_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('position_id')->constrained()->onDelete('CASCADE');
            // $table->integer('alumni_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_experiences');
    }
};
