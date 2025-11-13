<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use Carbon\Carbon;

class MorePatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patients = [
            [
                'patient_name' => 'خالد إبراهيم',
                'age' => 45,
                'national_id' => '12345678901234',
                'hospital' => 'مستشفى أسوان الجامعي',
                'doctor' => 'ياسر محمود',
                'account_number' => '2222333344445555',
                'start_date' => Carbon::now()->subDays(15),
                'end_date' => Carbon::now()->addDays(25),
                'birth_certificate' => json_encode(['birth_cert_1.pdf']),
                'patient_photo' => json_encode(['default_patient.jpg']),
                'father_id' => json_encode(['11111111111111']),
                'mother_id' => json_encode(['22222222222222']),
                'x_ray' => json_encode(['xray_1.jpg']),
                'dexa' => json_encode(['dexa_1.jpg']),
                'mri' => json_encode(['mri_1.jpg']),
                'ct_scan' => json_encode(['ct_1.jpg']),
                'blood_test' => json_encode(['blood_1.pdf']),
            ],
            [
                'patient_name' => 'سارة عبد الله',
                'age' => 22,
                'national_id' => '23456789012345',
                'hospital' => 'مستشفى المنيا العام',
                'doctor' => 'نادية حسن',
                'account_number' => '6666777788889999',
                'start_date' => Carbon::now()->subDays(5),
                'end_date' => Carbon::now()->addDays(2),
                'birth_certificate' => json_encode(['birth_cert_2.pdf']),
                'patient_photo' => json_encode(['default_patient.jpg']),
                'father_id' => json_encode(['33333333333333']),
                'mother_id' => json_encode(['44444444444444']),
                'x_ray' => json_encode(['xray_2.jpg']),
                'dexa' => json_encode(['dexa_2.jpg']),
                'mri' => json_encode(['mri_2.jpg']),
                'ct_scan' => json_encode(['ct_2.jpg']),
                'blood_test' => json_encode(['blood_2.pdf']),
            ],
            [
                'patient_name' => 'عمر حسام',
                'age' => 38,
                'national_id' => '34567890123456',
                'hospital' => 'مستشفى بورسعيد العام',
                'doctor' => 'أمل فاروق',
                'account_number' => '3333444455556666',
                'start_date' => Carbon::now()->subDays(40),
                'end_date' => Carbon::now()->addDays(20),
                'birth_certificate' => json_encode(['birth_cert_3.pdf']),
                'patient_photo' => json_encode(['default_patient.jpg']),
                'father_id' => json_encode(['55555555555555']),
                'mother_id' => json_encode(['66666666666666']),
                'x_ray' => json_encode(['xray_3.jpg']),
                'dexa' => json_encode(['dexa_3.jpg']),
                'mri' => json_encode(['mri_3.jpg']),
                'ct_scan' => json_encode(['ct_3.jpg']),
                'blood_test' => json_encode(['blood_3.pdf']),
            ],
        ];

        foreach ($patients as $patient) {
            Patient::create($patient);
        }
    }
}
