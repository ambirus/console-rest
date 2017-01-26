<?php

namespace App\Console\Commands;

use App\Domain\User\UserRepository;
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

        $data = [
            'name' => $userName,
            'password' => $userPassword,
            'info' => $userInfo
        ];

        $userRepository = \App::make(UserRepository::class);
        $userEntity = $userRepository->findOneBy(['name' => $userName]);

        if (is_null($userEntity)) {
            $userEntity = $userRepository->create($data);
            $user = $userRepository->save($userEntity);

            if (!is_null($user->getId())) {
                $this->info("Пользователь " . $userName . " успешно добавлен!");
            } else $this->error("Ошибка добавления пользователя " . $userName . "!");
        } else $this->error("Пользователь с таким именем " . $userName . " уже существует!");


        return true;
    }
}
