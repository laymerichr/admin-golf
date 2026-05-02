<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Clubes;

class FillIdColumnclubes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clubes = Clubes::all();
        foreach ($clubes as $club)
        {
            Clubes::where('CodClub', '=', $club->CodClub)->update(['id' => random_int(1, PHP_INT_MAX)]);
        }
    }
}
