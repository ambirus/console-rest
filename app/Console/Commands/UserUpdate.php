<?php

namespace App\Console\Commands;

use App\Domain\User\UserRepository;
use Illuminate\Console\Command;

class UserUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update_user {name : Имя пользователя} {info : Новая информация о пользователе}';

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
        $arguments = $this->arguments();

        $userName = $arguments['name'];
        $userInfo = $arguments['info'];

        $data = [
            'info' => $userInfo
        ];

        $userRepository = \App::make(UserRepository::class);
        $userEntity = $userRepository->findOneBy(['name' => $userName]);

        if (!is_null($userEntity)) {
            $user = $userRepository->update($data, $userEntity->getId());
            $userRepository->save($user);

            if ($user->getInfo() == $userInfo) {
                $this->info("Информация о пользователе " . $userName . " успешно изменена!");
            } else $this->error("Не удалось обновить информацию о пользователе " . $userName . "!");
        } else $this->error("Пользователь с именем " . $userName . " не найден!");

        return true;
    }
}
