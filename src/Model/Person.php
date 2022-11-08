<?php

namespace App\Model;

class Person
{
    public function __construct(public readonly string $email, public readonly string $name) {}
}
