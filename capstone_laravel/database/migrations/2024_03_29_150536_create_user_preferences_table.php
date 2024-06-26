<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_preferences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // assuming users table name is 'users'
            $table->string('school');
            $table->string('major');
            $table->string('minor')->nullable()->default('N/A');
            $table->string('campus');
            $table->string('outdoorItem1');
            $table->string('outdoorItem2');
            $table->string('outdoorItem3');
            $table->string('indoorItem1');
            $table->string('indoorItem2');
            $table->string('indoorItem3');
            $table->string('movieItem1');
            $table->string('movieItem2');
            $table->string('movieItem3');
            $table->string('musicItem1');
            $table->string('musicItem2');
            $table->string('musicItem3');
            $table->string('description');
            $table->string('avatar')->default('');
            $table->string('timetable_path')->nullable();
            $table->timestamps(); // Add timestamps columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_preferences');    
        
    }
};

