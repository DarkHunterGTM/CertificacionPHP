<?php

use Illuminate\Database\Seeder;
use App\NivelEscolar;

class NivelEscolaresSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ne = new NivelEscolar;
        $ne->nombre = 'Basico';
        $ne->save();

        $ne = new NivelEscolar;
        $ne->nombre = 'Diversificado';
        $ne->save();
    }
}
