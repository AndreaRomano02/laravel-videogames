<?php

namespace Database\Seeders;

use App\Models\Console;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $consoles = ['Playstation', 'Xbox', 'Computer', 'Nintendo'];

        foreach($consoles as $console)
        {
            $new_console = new Console();

            $new_console->label = $console;

            $new_console->save();
        }

    }
}
