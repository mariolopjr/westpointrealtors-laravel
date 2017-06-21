<?php

use Illuminate\Database\Seeder;
use App\Agent;

class AgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agent::truncate();
        factory(Agent::class, 10)->create();
    }
}
