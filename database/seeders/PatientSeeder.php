<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use Carbon\Carbon;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        $patients = [
            [
                'name' => 'أحمد محمد علي',
                'age' => 35,
                'phone' => '01234567890',
                'address' => 'القاهرة، مصر الجديدة',
                'hospital_name' => 'مستشفى القاهرة الجديدة',
                'doctor_name' => 'أحمد السيد',
                'bank_account' => '1234567890123456',
                'start_date' => Carbon::now()->subDays(30),
                'finish_date' => Carbon::now()->addDays(10),
                'target_amount' => 50000,
                'collected_amount' => 35000,
                'status' => 'active'
            ],
            [
                'name' => 'فاطمة حسن محمود',
                'age' => 28,
                'phone' => '01098765432',
                'address' => 'الإسكندرية، سموحة',
                'hospital_name' => 'مستشفى الإسكندرية الدولي',
                'doctor_name' => 'سارة أحمد',
                'bank_account' => '9876543210987654',
                'start_date' => Carbon::now()->subDays(20),
                'finish_date' => Carbon::now()->addDays(3),
                'target_amount' => 75000,
                'collected_amount' => 60000,
                'status' => 'active'
            ],
            [
                'name' => 'محمد عبد الرحمن',
                'age' => 42,
                'phone' => '01555123456',
                'address' => 'الجيزة، الدقي',
                'hospital_name' => 'مستشفى الجيزة العام',
                'doctor_name' => 'محمد فتحي',
                'bank_account' => '5555666677778888',
                'start_date' => Carbon::now()->subDays(60),
                'finish_date' => Carbon::now()->subDays(5),
                'target_amount' => 40000,
                'collected_amount' => 40000,
                'status' => 'completed'
            ],
            [
                'name' => 'نور الدين أحمد',
                'age' => 19,
                'phone' => '01777888999',
                'address' => 'المنصورة، الدقهلية',
                'hospital_name' => 'مستشفى المنصورة الجامعي',
                'doctor_name' => 'عمرو حسن',
                'bank_account' => '1111222233334444',
                'start_date' => Carbon::now()->subDays(90),
                'finish_date' => Carbon::now()->subDays(15),
                'target_amount' => 30000,
                'collected_amount' => 25000,
                'status' => 'active'
            ],
            [
                'name' => 'مريم سالم',
                'age' => 31,
                'phone' => '01666555444',
                'address' => 'طنطا، الغربية',
                'hospital_name' => 'مستشفى طنطا الجامعي',
                'doctor_name' => 'هالة محمد',
                'bank_account' => '7777888899990000',
                'start_date' => Carbon::now()->subDays(10),
                'finish_date' => Carbon::now()->addDays(50),
                'target_amount' => 60000,
                'collected_amount' => 15000,
                'status' => 'active'
            ]
        ];

        foreach ($patients as $patient) {
            Patient::create($patient);
        }
    }
}