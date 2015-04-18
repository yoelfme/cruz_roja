<?php
namespace App\Support;

use Illuminate\Database\Seeder as BaseSeeder;
use Illuminate\Support\Facades\DB;

abstract class Truncate extends BaseSeeder
{

    /**
     * Function to truncate table
     * @param string $table
     */
    protected function truncateTable($table)
    {
        $this->checkForeignKeys(false);
        DB::table($table)->truncate();
        $this->checkForeignKeys(true);
    }

    /**
     * Enable or disable the check foreign keys
     * @param $check
     */
    protected function checkForeignKeys($check)
    {
        $check = $check ? '1' : '0';
        DB::statement("SET FOREIGN_KEY_CHECKS = $check;");
    }

}