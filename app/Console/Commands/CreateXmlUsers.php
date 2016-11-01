<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Helpers\XmlHelper;

class CreateXmlUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xml:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create xml file with info about users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::all()->toArray();
        $xml = XmlHelper::createXml($users);
        $handle = fopen(storage_path('app/users.xml'), 'w');
        fwrite($handle, $xml);

        $this->info('Xml files about users are created');
    }
}
