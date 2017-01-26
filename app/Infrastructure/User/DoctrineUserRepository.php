<?php
namespace App\Infrastructure\User;

use App\Domain\User\UserRepository;
use App\Infrastructure\DoctrineBaseRepository;

class DoctrineUserRepository extends DoctrineBaseRepository implements UserRepository
{

}