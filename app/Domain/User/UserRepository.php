<?php
namespace App\Domain\User;

interface UserRepository
{
    public function create($data);
    public function update($data, $id);
    public function save($object);
    public function delete($object);
    public function find($id);
}