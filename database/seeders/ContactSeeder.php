<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$contact = new Contact();
        $contact->nome = 'Sistema SG';
        $contact->telefone = '(32) 99999-9999';
        $contact->email = 'contato@sistemasg.com.br';
        $contact->motivo_contato = 1;
        $contact->mensagem = 'Seja bem vindo ao sistema';
        $contact->save();*/

        Contact::factory()->count(100)->create();
    }
}
