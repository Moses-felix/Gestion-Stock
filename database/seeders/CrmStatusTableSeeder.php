<?php

namespace Database\Seeders;

use App\Models\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => 1,
                'name'       => 'Lead',
                'created_at' => '2021-08-05 10:57:43',
                'updated_at' => '2021-08-05 10:57:43',
            ],
            [
                'id'         => 2,
                'name'       => 'Customer',
                'created_at' => '2021-08-05 10:57:43',
                'updated_at' => '2021-08-05 10:57:43',
            ],
            [
                'id'         => 3,
                'name'       => 'Partner',
                'created_at' => '2021-08-05 10:57:43',
                'updated_at' => '2021-08-05 10:57:43',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
