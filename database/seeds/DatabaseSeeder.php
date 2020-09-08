<?php

use Illuminate\Database\Seeder;

use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $competencias = [
            [
                'descripcion' => 'trabajo en equipo',
                'estado' => 'activo'
            ],
            [
                'descripcion' => 'proactividad',
                'estado' => 'activo'
            ],
            [
                'descripcion' => 'emprendedurismo',
                'estado' => 'activo'
            ],
            [
                'descripcion' => 'trabajo bajo presion',
                'estado' => 'activo'
            ],
        ];
        foreach ($competencias as $competencia) {
            App\Competencias::create($competencia);
        }
        $idiomas = [
            [
                'nombre' => 'Ingles',
                'estado' => 'activo'
            ],
            [
                'nombre' => 'Italiano',
                'estado' => 'activo'
            ],
            [
                'nombre' => 'Japones',
                'estado' => 'activo'
            ],
            [
                'nombre' => 'Aleman',
                'estado' => 'activo'
            ],
            [
                'nombre' => 'Mandarin',
                'estado' => 'activo'
            ]
        ];
        foreach ($idiomas as $idioma) {
            App\Idiomas::create($idioma);
        }
        $departamentos = [
            [
                'nombre' => 'Ventas',
            ],
            [
                'nombre' => 'Compras',
            ],
            [
                'nombre' => 'Ingenieria',
            ],
            [
                'nombre' => 'Servicio al cliente',
            ],
            [
                'nombre' => 'Caja',
            ],
        ];
        foreach ($departamentos as $departamento) {
            App\Departamentos::create($departamento);
        }
        $niveles = [
            [
                'nombre' => 'Grado',
            ],
            [
                'nombre' => 'Post-Grado',
            ],
            [
                'nombre' => 'Maestria',
            ],
            [
                'nombre' => 'Doctorado',
            ],
            [
                'nombre' => 'Tecnico',
            ],
            [
                'nombre' => 'Gerencia',
            ],
        ];
        foreach ($niveles as $nivel) {
            App\NivelesCapacitaciones::create($nivel);
        }

        $capacitaciones = [
            [
                'descripcion' => 'Curso de lavar autos',
                'fecha_desde' => '2020-08-12',
                'fecha_hasta' => '2020-08-24',
                'institucion' => 'Infotep',
            ],
            [
                'descripcion' => 'Ingenieria',
                'fecha_desde' => '2016-08-12',
                'fecha_hasta' => '2019-08-24',
                'institucion' => 'Unapec',
            ],
            [
                'descripcion' => 'Tecnico en computadoras',
                'fecha_desde' => '2017-09-12',
                'fecha_hasta' => '2019-08-24',
                'institucion' => 'Centu',
            ],
        ];
        foreach ($capacitaciones as $capacitacion) {
            $nivel = DB::table('niveles_capacitaciones')->inRandomOrder()->first();
            $capacitacion['nivel_id'] = $nivel->id;
            App\Capacitaciones::create($capacitacion);
        }

        $puestos = [
            [
                'nombre' => 'Limpiador de ventanas',
                'nivel_riesgo' => 'alto',
                'salario_minimo' => 15000,
                'salario_maximo' => 25000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Trapeador de pisos',
                'nivel_riesgo' => 'medio',
                'salario_minimo' => 15000,
                'salario_maximo' => 25000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Negociador',
                'nivel_riesgo' => 'alto',
                'salario_minimo' => 65000,
                'salario_maximo' => 125000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Programador',
                'nivel_riesgo' => 'bajo',
                'salario_minimo' => 55000,
                'salario_maximo' => 125000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Ingeniero',
                'nivel_riesgo' => 'alto',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
        ];
        foreach ($puestos as $puesto) {
            App\Puestos::create($puesto);
        }

        User::create([
            'name' => 'admin',
            'email' => 'admin@recruitx.net',
            'role' => 'admin',
            'password' => Hash::make('adminpassword'),
        ]);
    }
}
