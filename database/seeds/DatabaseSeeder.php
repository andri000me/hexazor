<?php

defined('DS') or exit('No direct script access allowed.');

use System\Database\Migrations\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Panggil seluruh daftar seeder database.
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
    }
}
