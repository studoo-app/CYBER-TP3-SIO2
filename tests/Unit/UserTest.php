<?php

namespace App\Tests\Unit;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    private function makeUser(): User
    {
        $user = new User();

        $user->setName('John Doe');
        $user->setEmail('john.doe@example.com');

        return $user;
    }

    public function testSetGetName(): void
    {

        $user = $this->makeUser();
        $this->assertEquals('John Doe', $user->getName());
    }

    public function testSetGetEmail(): void
    {
        $user = $this->makeUser();
        $this->assertEquals('john.doe@example.com', $user->getEmail());
    }

    public function testGetFullId(): void
    {
        $user = $this->makeUser();
        $this->assertEquals('John Doe (john.doe@example.com)', $user->getFullId());
    }
}
