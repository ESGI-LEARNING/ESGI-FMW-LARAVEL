<?php

namespace Database\Seeders;

use App\Enum\RolesEnum;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name' => RolesEnum::SUPER_ADMIN,
            ],
            [
                'name' => RolesEnum::MODERATOR,
            ],
            [
                'name' => RolesEnum::USER,
            ],
            [
                'name' => RolesEnum::AUTHOR,
            ],
        ];

        foreach ($datas as $data) {
            Role::query()->create($data);
        }
    }
}
