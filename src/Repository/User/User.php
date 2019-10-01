<?php

namespace App\Repository\User;

/**
* 
*/
class User implements \JsonSerializable
{
    
    private $id;
    private $username;
    private $name;

    public function __construct(?int $id, string $username, string $name)
    {
        $this->id = $id;
        $this->username = strtolower($username);
        $this->name = ucfirst($name);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'name' => $this->name
        ];
    }
}