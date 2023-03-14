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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products')->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->string('type')->comment('donasi/galang dana/zakat')->nullable();
            $table->enum('transaction_type', ['income','outcome'])->nullable();
            $table->foreignId('user_donations_id')->foreign('user_donations_id')->references('id')->on('user_donations')->onDelete('cascade')->nullable();
            $table->unsignedDouble('nominal')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('status')->comment('pending/success/failed')->nullable();
            $table->foreignId('proyek_batch_id')->foreign('proyek_batch_id')->references('id')->on('proyek_batch')->onDelete('cascade')->nullable();
            $table->string('description')->nullable();
            $table->string('payment_token', 255)->nullable();
            $table->string('payment_url', 255)->nullable();
            $table->string('payment_channel', 255)->nullable();
            $table->string('external_id', 255)->nullable();
            $table->integer('long_duration')->nullable();
            $table->integer('number_units')->nullable();
            $table->double('total_price')->nullable();
            $table->double('total_income')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
