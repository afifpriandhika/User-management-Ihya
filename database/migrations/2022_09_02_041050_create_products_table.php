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
       Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name_product', 255);
            $table->integer('unit');
            $table->integer('fundedUnit')->default('0');
            $table->integer('price');
            $table->integer('duration_contract');
            $table->integer('period_margin');
            $table->integer('margin');
            $table->string('tag');
            $table->text('detail');
            $table->text('reason')->nullable();
            $table->string('status', 255);
            $table->text('image')->nullable();
            $table->boolean('verified')->default('0');
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
        Schema::dropIfExists('products');
    }
};
