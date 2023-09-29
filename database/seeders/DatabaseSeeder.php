<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                [
                    'code' => Str::uuid(),
                    'name' => 'Plano de Saúde',
                    'description' => 'Plano de Sáude por Assinatura com periodicidade mensal.',
                    'description_services' => json_encode([
                        'Cobertura nacional',
                        'Pronto Socorro 24/7',
                        'Exames Médicos',
                        'Pequenas Cirugias',
                        'Desconto em Medicamentos'
                    ]),

                    'max_quantity' => 2,
                    'category' => 'Plano Ondontológico',
                    'type' => 'subscription',
                    'value' => 99.90,
                    'status' => 'active',
                    'stripe_prod' => 'prod_Np9rzMIQFQDeIm',
                    'img' => 'https://cdn-icons-png.flaticon.com/512/2024/2024230.png'
                ],
                [
                    'code' => Str::uuid(),
                    'name' => 'Plano Odontológico',
                    'description' => 'Plano Odontológico por Assinatura com periodicidade mensal.',
                    'description_services' => json_encode([
                        'Cobertura nacional',
                        'Pronto Socorro 24/7',
                        'Exames Médicos',
                        'Pequenas Cirugias',
                        'Desconto em Medicamentos'
                    ]),
                    'max_quantity' => 2,
                    'category' => 'Plano Ondontológico',
                    'type' => 'subscription',
                    'value' => 77.90,
                    'status' => 'active',
                    'stripe_prod' => 'prod_Np9rzMIQFQDeIf',
                    'img' => 'https://cdn-icons-png.flaticon.com/512/2818/2818366.png'
                ],
                [
                    'code' => Str::uuid(),
                    'name' => 'Plano Telemedicina',
                    'description' => 'Plano de Telemedicina por Assinatura com periodicidade mensal.',
                    'description_services' => json_encode([
                        'A partir de 2 vidas (Max. 9)',
                        'Cobertura nacional',
                        'Pronto Atendimento 24/7',
                        'Encaminhamento Hospitalar',
                        'Desconto em Medicamentos',
                    ]),
                    'max_quantity' => 5,
                    'category' => 'Plano Ondontológico',
                    'type' => 'subscription',
                    'value' => 59.90,
                    'status' => 'active',
                    'stripe_prod' => 'prod_Np9rzMIQFQDeIf',
                    'img' => 'https://cdn-icons-png.flaticon.com/512/7310/7310703.png'
                ],
            ]
        );
    }
}
