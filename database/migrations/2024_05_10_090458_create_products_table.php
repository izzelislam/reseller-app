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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("category_id");
            $table->string("name");
            $table->text("describtion");
            $table->string("image")->nullable();
            $table->float("price", 30, 2)->default(0.0);
            $table->float("reseller_price", 30, 2)->nullable();
            $table->float("reseller_comission", 30, 2)->nullable();
            $table->integer("stock");
            $table->string("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
