<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array( // row #0
                'id' => 1,
                'name' => 'Amazonas',
            ),
            array( // row #1
                'id' => 2,
                'name' => 'Antioquia',
            ),
            array( // row #2
                'id' => 3,
                'name' => 'Arauca',
            ),
            array( // row #3
                'id' => 4,
                'name' => 'Atlántico',
            ),
            array( // row #4
                'id' => 5,
                'name' => 'Bolívar',
            ),
            array( // row #5
                'id' => 6,
                'name' => 'Boyacá',
            ),
            array( // row #6
                'id' => 7,
                'name' => 'Caldas',
            ),
            array( // row #7
                'id' => 8,
                'name' => 'Caquetá',
            ),
            array( // row #8
                'id' => 9,
                'name' => 'Casanare',
            ),
            array( // row #9
                'id' => 10,
                'name' => 'Cauca',
            ),
            array( // row #10
                'id' => 11,
                'name' => 'Cesar',
            ),
            array( // row #11
                'id' => 12,
                'name' => 'Chocó',
            ),
            array( // row #12
                'id' => 13,
                'name' => 'Córdoba',
            ),
            array( // row #13
                'id' => 14,
                'name' => 'Cundinamarca',
            ),
            array( // row #14
                'id' => 15,
                'name' => 'Güainia',
            ),
            array( // row #15
                'id' => 16,
                'name' => 'Guaviare',
            ),
            array( // row #16
                'id' => 17,
                'name' => 'Huila',
            ),
            array( // row #17
                'id' => 18,
                'name' => 'La Guajira',
            ),
            array( // row #18
                'id' => 19,
                'name' => 'Magdalena',
            ),
            array( // row #19
                'id' => 20,
                'name' => 'Meta',
            ),
            array( // row #20
                'id' => 21,
                'name' => 'Narińo',
            ),
            array( // row #21
                'id' => 22,
                'name' => 'Norte de Santander',
            ),
            array( // row #22
                'id' => 23,
                'name' => 'Putumayo',
            ),
            array( // row #23
                'id' => 24,
                'name' => 'Quindio',
            ),
            array( // row #24
                'id' => 25,
                'name' => 'Risaralda',
            ),
            array( // row #25
                'id' => 26,
                'name' => 'San Andrés y Providencia',
            ),
            array( // row #26
                'id' => 27,
                'name' => 'Santander',
            ),
            array( // row #27
                'id' => 28,
                'name' => 'Sucre',
            ),
            array( // row #28
                'id' => 29,
                'name' => 'Tolima',
            ),
            array( // row #29
                'id' => 30,
                'name' => 'Valle del Cauca',
            ),
            array( // row #30
                'id' => 31,
                'name' => 'Vaupés',
            ),
            array( // row #31
                'id' => 32,
                'name' => 'Vichada',
            ),
        );

        foreach ($data as $key => $value) {
            Department::updateOrCreate([
                'id'    => $value['id']
            ], $value);
        }
    }
}
