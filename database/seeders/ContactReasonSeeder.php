<?php

namespace Database\Seeders;

use App\Models\ContactReason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactReason::create(['motivo_contato' => 'Dúvida']);
        ContactReason::create(['motivo_contato' => 'Elogio']);
        ContactReason::create(['motivo_contato' => 'Reclamação']);
        ContactReason::create(['motivo_contato' => 'Sugestão']);
    }
}
