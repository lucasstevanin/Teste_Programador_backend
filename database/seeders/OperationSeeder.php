<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Operation;

class OperationSeeder extends Seeder
{
    public function run(): void
    {
        Operation::create(['name' => 'Operação 1', 'type' => 'Tipo A']);
        Operation::create(['name' => 'Operação 2', 'type' => 'Tipo B']);
        Operation::create(['name' => 'Operação 3', 'type' => 'Tipo C']);
    }
}
