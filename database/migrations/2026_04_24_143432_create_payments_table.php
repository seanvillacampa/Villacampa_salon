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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->string('customer_name');
            $table->date('date_schedule');
            $table->time('time_schedule');
            $table->decimal('total_amount', 10, 2);
            $table->string('payment_status')->default('pending'); 
            $table->timestamps();
 

            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
