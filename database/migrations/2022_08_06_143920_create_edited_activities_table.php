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
        Schema::create('edited_activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string("description");
            $table->string('image');
            $table->string('interval');
            $table->integer('user_id');
            $table->integer('editedBy');
            $table->integer('activity_id')->constrained('activities');
            $table->enum('type', ['global', 'personal'])->default('personal');
            $table->timestamp('date');
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
        Schema::dropIfExists('edited_activities');
    }
};
