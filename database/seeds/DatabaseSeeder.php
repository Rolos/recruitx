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
            [
                'descripcion' => 'organizacion',
                'estado' => 'activo'
            ],
            [
                'descripcion' => 'capacidad de analisis',
                'estado' => 'activo'
            ],
            [
                'descripcion' => 'toma de decisiones',
                'estado' => 'activo'
            ],
            [
                'descripcion' => 'creatividad',
                'estado' => 'activo'
            ],
            [
                'descripcion' => 'comunicacion',
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
            [
                'descripcion' => 'Curso de cocina',
                'fecha_desde' => '2017-09-12',
                'fecha_hasta' => '2019-08-24',
                'institucion' => 'Unapec',
            ],
            [
                'descripcion' => 'Tecnologo en anime',
                'fecha_desde' => '2017-09-12',
                'fecha_hasta' => '2019-08-24',
                'institucion' => 'Centu',
            ],
            [
                'descripcion' => 'Curso de Barista',
                'fecha_desde' => '2017-09-12',
                'fecha_hasta' => '2019-08-24',
                'institucion' => 'Centu',
            ],
            [
                'descripcion' => 'Probador de carros',
                'fecha_desde' => '2017-09-12',
                'fecha_hasta' => '2019-08-24',
                'institucion' => 'Centu',
            ],
            [
                'descripcion' => 'Probador de baterias',
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
            [
                'nombre' => 'Probador de baterias',
                'nivel_riesgo' => 'alto',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Organizador de platos',
                'nivel_riesgo' => 'alto',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'CEO',
                'nivel_riesgo' => 'alto',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'CTO',
                'nivel_riesgo' => 'alto',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Cajero de banco',
                'nivel_riesgo' => 'medio',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Matador de vacas',
                'nivel_riesgo' => 'alto',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Cocinero',
                'nivel_riesgo' => 'bajo',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Pastor de iglesia',
                'nivel_riesgo' => 'bajo',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Miembro del PLD',
                'nivel_riesgo' => 'alto',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Director de cine',
                'nivel_riesgo' => 'alto',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Doble de Brad Pitt',
                'nivel_riesgo' => 'bajo',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Payaso',
                'nivel_riesgo' => 'medio',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Asistente de ingenieria',
                'nivel_riesgo' => 'bajo',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Maestro constructor',
                'nivel_riesgo' => 'alto',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Ingeniero de software',
                'nivel_riesgo' => 'bajo',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Compilador',
                'nivel_riesgo' => 'alto',
                'salario_minimo' => 115000,
                'salario_maximo' => 225000,
                'estado' => 'activo',
            ],
        ];
        foreach ($puestos as $puesto) {
            App\Puestos::create($puesto);
        }
        factory(App\Puestos::class, 30)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@recruitx.net',
            'role' => 'admin',
            'password' => Hash::make('adminpassword'),
        ]);

        factory(App\User::class, 50)->create()->each(function ($user) {
            factory(App\Candidatos::class)->create([
                'nombre' => $user->name,
                'user_id' => $user->id,
                'departamento_id' => DB::table('departamentos')->inRandomOrder()->first()->id,
            ])->each(function ($candidate) {
                $competenciaId = DB::table('competencias')->inRandomOrder()->first()->id;
                $candidate->competencias()->sync([$competenciaId]);

                $capa = DB::table('capacitaciones')->inRandomOrder()->first()->id;
                $candidate->capacitaciones()->sync([$capa]);

                $i = DB::table('idiomas')->inRandomOrder()->first()->id;
                $candidate->idiomas()->sync([$i]);

                $puesto = DB::table('puestos')->inRandomOrder()->first()->id;
                $candidate->puestos()->sync([$puesto]);
            });
        });

        App\Candidatos::all()->each(function ($candidato) {
            factory(App\ExperienciaLaboral::class)->create([
                'candidato_id' => $candidato->id,
                'puesto_ocupado_id' => DB::table('puestos')->inRandomOrder()->first()->id,
            ]);
        });
    }
}
