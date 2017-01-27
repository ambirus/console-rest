<?php
namespace App\Http\Controllers;

use App\Domain\User\UserRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = \App::make(UserRepository::class);
    }

    public function getInfo($name)
    {
        $result = ['error' => 'Пользователь ' . $name . ' не найден!'];

        if (Cache::has('get-user-' . $name)) {
            $info = Cache::get('get-user-' . $name);
            $result = ['info' => $info];
        } else {
            $userEntity = $this->userRepository->findOneBy(['name' => $name]);

            if (!is_null($userEntity)) {
                $info = $userEntity->getInfo();
                $result = ['info' => $info];
                Cache::add('get-user-' . $name, $info, Config::get('settinngs.cache_expiration'));
            }
        }

        return response()->json($result);
    }
}
