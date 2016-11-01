<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('hash_algorithms')->insert([
            ['name' => 'md5'],
            ['name' => 'sha1'],
            ['name' => 'crc32'],
            ['name' => 'crypt'],
            ['name' => 'sha256']
        ]);

         DB::table('vocabularies')->insert([
            ['word' => 'Code'],
            ['word' => 'Care'],
            ['word' => 'Semen'],
            ['word' => 'Helen'],
            ['word' => 'Laravel']
        ]);
    }
}
