<?php

use Illuminate\Database\Seeder;
use App\Ciclo;

class CiclosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cic = new Ciclo();
        $cic->anio = '2020';
        $cic->save();

        $cic = new Ciclo();
        $cic->anio = '2021';
        $cic->save();

        $cic = new Ciclo();
        $cic->anio = '2022';
        $cic->save();

        $cic = new Ciclo();
        $cic->anio = '2023';
        $cic->save();

        $cic = new Ciclo();
        $cic->anio = '2024';
        $cic->save();

        $cic = new Ciclo();
        $cic->anio = '2025';
        $cic->save();
    }
}
