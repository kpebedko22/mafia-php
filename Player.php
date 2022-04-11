<?php

namespace mafia;

class Player
{
    private string $name;
    public Role $role;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setRole(Role $role): void
    {
        $this->role = $role;
    }

    public function __toString(): string
    {
        return $this->name . " | " . $this->role;
    }
}