<?php

use Illuminate\Database\Seeder;
use App\Estado;

class EstadosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $est = new Estado();
        $est->nombre = 'Activo';
        $est->save();

        $est = new Estado();
        $est->nombre = 'Retirado';
        $est->save();

        $est = new Estado();
        $est->nombre = 'Graduado';
        $est->save();

    }
}
