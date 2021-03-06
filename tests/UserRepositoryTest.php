<?php

use App\Domain\User\UserRepository;

class UserRepositoryTest extends TestCase
{
    protected $repository;
    protected static $user;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->repository = App::make(UserRepository::class);
    }

    public function testCreateAndSave()
    {
        $data = [
            'name' => 'admin',
            'password' => 'admin',
            'info' => 'info'
        ];

        $user = $this->repository->create($data);
        self::$user = $this->repository->save($user);
        $this->seeInDatabase('users', ['id' => self::$user->getId()]);
    }

    public function testUpdateAndSave()
    {
        $data = [
            'password' => 'admin2'
        ];

        $user = $this->repository->update($data, self::$user->getId());
        self::$user = $this->repository->save($user);
        $this->assertEquals($data['password'], self::$user->getPassword());
    }
/*
    public function testDelete()
    {
        $user = $this->repository->find(self::$user->getId());
        $result = $this->repository->delete($user);
        $this->assertTrue($result);
    }*/
}
