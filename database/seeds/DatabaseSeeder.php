<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(UsersSeeder::class);
        $this->call(CiclosSeeders::class);
        $this->call(EstadosSeeders::class);
        $this->call(NivelEscolaresSeeders::class);
        $this->call(GradoSeeders::class);
        $this->call(TipoPagoSeeders::class);


        //$this->call(TiposLocalidadesSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
