<?php

namespace App\Repository\User;

/**
* 
*/
interface UserRepository
{
    
    public function findAll(): array;

    public function findUserOfId(int $id): User;
}