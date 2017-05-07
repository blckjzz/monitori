<?php

use Illuminate\Database\Seeder;
use App\User;

class MonitoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Faker\Generator $faker */
        $faker = app(Faker\Generator::class);
        $users = User::all();
        $disciplinas = \App\Disciplina::all();
        for ($i = 0; $i < 20; $i++) {
            $monitoria = new \App\Monitoria;
            $monitoria->monitor_id = $users->random()->id;
            $monitoria->monitorado_id = $users->random()->id;
            $monitoria->disciplina_id = $disciplinas->random()->id;
            $monitoria->aceita = $faker->boolean(80);
            if ($monitoria->aceita) {
                $finalizada = $faker->boolean(60);
                if ($finalizada) {
                    $monitoria->finalizada = $faker->dateTimeThisYear;
                    $monitoria->nota = $faker->numberBetween(0, 5);
                }
            }
            $monitoria->save();
        }

    }
}
