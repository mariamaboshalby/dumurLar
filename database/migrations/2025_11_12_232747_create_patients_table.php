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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('phone');
            $table->text('address');
            $table->string('hospital_name');
            $table->string('doctor_name');
            $table->string('bank_account');
            $table->date('start_date');
            $table->date('finish_date');
            $table->string('patient_photo')->nullable();
            $table->decimal('target_amount', 10, 2)->default(0);
            $table->decimal('collected_amount', 10, 2)->default(0);
            $table->enum('status', ['active', 'completed', 'expired'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
