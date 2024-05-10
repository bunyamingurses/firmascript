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
        Schema::create("siteSitesCategory",function(Blueprint $table){
           $table->id();
            $table->string("categoryPhoto")->nullable(false);
            $table->string("categoryPhotoWebp")->nullable(false);
            $table->string("categoryName")->nullable(false);
            $table->string("categoryPermalink")->nullable(false);
            $table->dateTime("created_at")->nullable(false);
            $table->dateTime("updated_at")->nullable(false);
            $table->collation("utf8mb4_general_ci");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("siteSitesCategory");
    }
};
