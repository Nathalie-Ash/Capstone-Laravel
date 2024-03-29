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
            $table->string('school');
            $table->string('major');
            $table->string('minor')->nullable();
            $table->string('outdoor_activity_1');
            $table->string('outdoor_activity_2');
            $table->string('outdoor_activity_3');
            $table->string('indoor_activity_1');
            $table->string('indoor_activity_2');
            $table->string('indoor_activity_3');

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

