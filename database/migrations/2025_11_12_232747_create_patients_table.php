<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('national_id')->unique();
            $table->integer('age');
            $table->string('hospital');
            $table->string('doctor');
            $table->string('account_number');
            $table->date('start_date');
            $table->date('end_date');

            // ملفات مطلوبة كلها
            $table->json('birth_certificate');
            $table->json('patient_photo');
            $table->json('father_id');
            $table->json('mother_id');
            $table->json('x_ray');
            $table->json('dexa');
            $table->json('mri');
            $table->json('ct_scan');
            $table->json('blood_test');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
