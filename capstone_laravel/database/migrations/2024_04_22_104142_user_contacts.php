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
        Schema::create('user_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('state');
            $table->boolean('sent');
            $table->unsignedBigInteger('connection_id');
            $table->foreign('connection_id')->references('id')->on('users')->onDelete('cascade'); // assuming users table name is 'users'
            $table->string('phone_number')->nullable()->default("Not Available");
            $table->string('instagram')->nullable()->default("Not Available");
            $table->string('tiktok')->nullable()->default("Not Available");
            $table->string('linkedIn')->nullable()->default("Not Available");
            $table->timestamps(); 
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
