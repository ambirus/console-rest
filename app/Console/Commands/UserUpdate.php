<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UserUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update_user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Команда редактирования существующего пользователя';

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
        /*
        $user = $om->find('User', 1);
        echo $user->getUsername(); // prints "jwage"

        $user->setUsername('jonwge'); // change the obj in memory

        $om->flush(); // updates the object in the database*/
        //
    }
}
