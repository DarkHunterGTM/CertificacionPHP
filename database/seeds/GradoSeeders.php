<?php

use Illuminate\Database\Seeder;
use App\Grado;

class GradoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gra = new Grado();
        $gra->nombre = 'Primero';
        $gra->nivelEscolarId = 1;
        $gra->save();

        $gra = new Grado();
        $gra->nombre = 'Segundo';
        $gra->nivelEscolarId = 1;
        $gra->save();

        $gra = new Grado();
        $gra->nombre = 'Tercero';
        $gra->nivelEscolarId = 1;
        $gra->save();

        $gra = new Grado();
        $gra->nombre = 'Cuarto';
        $gra->nivelEscolarId = 2;
        $gra->save();

        $gra = new Grado();
        $gra->nombre = 'Quinto';
        $gra->nivelEscolarId = 2;
        $gra->save();
    }
}
