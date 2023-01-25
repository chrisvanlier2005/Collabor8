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
        Schema::create('team_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId("team_id")->constrained()->on("teams")->onDelete("cascade");
            $table->foreignId("user_id")->constrained()->on("users")->onDelete("cascade");
            $table->string("message", 255);
            $table->enum("media_type", ["image", "video", "audio", "file"])->nullable();
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
        Schema::dropIfExists('team_messages');
    }
};
