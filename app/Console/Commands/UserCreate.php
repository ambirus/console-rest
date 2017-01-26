<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UserCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create_user {name : Имя пользователя} {password : Пароль пользователя} {info : Информация о пользователе}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Команда добавления нового пользователя';

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
        $arguments = $this->arguments();

        $userName = $arguments['name'];
        $userPassword = $arguments['password'];
        $userInfo = $arguments['info'];
/*
        $user = new User();
        $user->setId(1);
        $user->setUsername('jwage');

        $om = $this->getYourObjectManager();
        $om->persist($user);
        $om->flush(); // insert the new document
        */
        $this->info("Пользователь успешно добавлен!");
        $this->error("Ошибка добавления пользователя " . $userName . "!");
        //
    }
}
