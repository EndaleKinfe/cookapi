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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("first_name");
            $table->string("last_name");
            $table->string("phone_number");
            $table->dateTime("birthday");
            $table->string("gender");
            $table->string("city");
            $table->string("country");
            $table->text("bio")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_infos');
    }
};
