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
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number');
            $table->mediumText('desc');
            $table->string('country');
            $table->mediumText('address');
            $table->string('email');
            $table->mediumText('soci_desc');
            $table->string('facebook_url');
            $table->string('twitter_url');
            $table->string('linkedIn_url');
            $table->string('instagram_url');
            $table->string('copyrightText');
            $table->string('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
