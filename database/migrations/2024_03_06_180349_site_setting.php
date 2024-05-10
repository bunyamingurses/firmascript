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
        Schema::create("site_setting",function (Blueprint $table){
            $table->id();
            $table->string("logoHeader")->nullable(false);
            $table->string("logoHeaderWebp")->nullable(false);
            $table->string("logoFooter")->nullable(false);
            $table->string("logoFooterWebp")->nullable(false);
            $table->string("siteUrl")->nullable(false);
            $table->string("title")->nullable(false);
            $table->string("description")->nullable(false);
            $table->string("keyword")->nullable(false);
            $table->string("author")->nullable(false);
            $table->string("phoneNumber")->nullable(false);
            $table->string("email")->nullable(false);
            $table->string("googleMap")->nullable(false);
            $table->string("googleAnalytics")->nullable(false);
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
        Schema::dropIfExists("site_setting");
    }
};
