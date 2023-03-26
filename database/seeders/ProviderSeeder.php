<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provider;
use Illuminate\Support\Facades\DB;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provider = new Provider();
        $provider->nome = 'Fornecedor 100';
        $provider->site = 'fornecedor100.com.br';
        $provider->uf = 'SP';
        $provider->email = 'contato@fornecedor100.com.br';
        $provider->save();


        Provider::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'RJ',
            'email' => 'contato@fornecedor200.com.br'
        ]);

        DB::table('providers')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor300.com.br',
            'uf' => 'SC',
            'email' => 'contato@fornecedor300.com.br'
        ]);
    }
}
