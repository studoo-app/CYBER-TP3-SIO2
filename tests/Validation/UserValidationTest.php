<?php

namespace App\Tests\Validation;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserValidationTest extends KernelTestCase
{
    private function makeUser(): User
    {
        $user = new User();
        $user->setName('John Doe');
        $user->setEmail('john.doe@mail.dev');

        return $user;
    }

    public function testUserWithInvalidEmail(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $user = $this->makeUser();

        $user->setEmail('invalid-email');

        $errors = $validator->validate($user);

        $this->assertCount(1, $errors);
    }

    public function testUserWithBlankEmail(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $user = $this->makeUser();

        $user->setEmail('');

        $errors = $validator->validate($user);

        $this->assertCount(1, $errors);
    }

    public function testUserWithBlankName(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $user = $this->makeUser();

        $user->setName('');

        $errors = $validator->validate($user);

        $this->assertCount(1, $errors);
    }
}
