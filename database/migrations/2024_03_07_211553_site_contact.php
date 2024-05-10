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
        Schema::create("siteContact",function (Blueprint $table){
            $table->id();
            $table->string("nameSurname")->nullable(false);
            $table->string("email")->nullable(false);
            $table->string("subject")->nullable(false);
            $table->string("message",500)->nullable(false);
            $table->smallInteger("mailSystem")->nullable(false);
            $table->smallInteger("mailAdmin")->nullable(false)->default(0);
            $table->datetime("created_at")->nullable(false);
            $table->dateTime("updated_at")->nullable(false);
            $table->collation("utf8mb4_general_ci");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("sitecontact");
    }
};
