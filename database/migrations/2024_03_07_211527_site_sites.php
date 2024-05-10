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
        Schema::create("siteSites",function (Blueprint $table){
            $table->id();
            $table->string("siteImage")->nullable(false);
            $table->string("siteImageWebp")->nullable(false);
            $table->string("siteName")->nullable(false);
            $table->string("sitePermalink")->nullable(false);
            $table->string("siteAbout")->nullable(false);
            $table->string("siteUrl")->nullable(false);
            $table->string("sitePrice")->nullable(false);
            $table->unsignedBigInteger("siteCategoryId")->nullable(false);
            $table->dateTime("created_at")->nullable(false);
            $table->dateTime("updated_at")->nullable(false);
            $table->collation("utf8mb4_general_ci");



            $table->foreign("siteCategoryId")->references("id")->on("siteSitesCategory");


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("sitesites");
    }
};
