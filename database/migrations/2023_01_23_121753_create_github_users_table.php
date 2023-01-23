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
        Schema::create('github_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("github_id");
            $table->string("login");
            $table->string("name");
            $table->string("avatar_url");
            $table->string("type");
            $table->string("bio")->nullable();
            $table->integer("public_repos");
            $table->integer("public_gists");

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
        Schema::dropIfExists('github_users');
    }
};
