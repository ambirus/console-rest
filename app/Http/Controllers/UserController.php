<?php
namespace App\Http\Controllers;

use App\Domain\User\UserRepository;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = \App::make(UserRepository::class);
    }

    public function getInfo($name)
    {
        $userEntity = $this->userRepository->findOneBy(['name' => $name]);

        if (!is_null($userEntity)) {
            $result = ['info' => $userEntity->getInfo()];
        } else $result = ['error' => 'Пользователь ' . $name . ' не найден!'];

        return response()->json($result);
    }
}
