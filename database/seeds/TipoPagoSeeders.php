<?php

use Illuminate\Database\Seeder;
use App\TipoPago;

class TipoPagoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tp = new TipoPago();
        $tp->nombre = 'Mensualidad';
        $tp->save();

        $tp = new TipoPago();
        $tp->nombre = 'Excursiones';
        $tp->save();

        $tp = new TipoPago();
        $tp->nombre = 'Mora';
        $tp->save();

        $tp = new TipoPago();
        $tp->nombre = 'Inscripción';
        $tp->save();

        $tp = new TipoPago();
        $tp->nombre = 'Otros';
        $tp->save();
    }
}
