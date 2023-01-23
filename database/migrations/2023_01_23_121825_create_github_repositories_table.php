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
        Schema::create('github_repositories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("github_user_id");
            $table->bigInteger("github_id");
            $table->string("name");
            $table->string("full_name");
            $table->boolean("private");
            $table->string("description")->nullable();
            $table->string("language");
            $table->integer("subscribers_count");
            $table->integer("network_count");
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
        Schema::dropIfExists('github_repositories');
    }
};
