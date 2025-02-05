<?php

namespace Arthu\TestUnitaire\tp2;

use Arthu\TestUnitaire\tp2\UserManager;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use Exception;

class UserManagerTest extends TestCase
{
    private UserManager $userManager;

    protected function setUp(): void
    {
        $this->userManager = new UserManager();
    }

    public function testAddUserWithValidEmail(): void
    {
        $this->userManager->resetTable();
        $name = 'John Doe';
        $email = 'john.doe@example.com';

        $this->userManager->addUser($name, $email);

        $user = $this->userManager->getUser(1);
        $this->assertEquals('John Doe', $user['name']);
        $this->assertEquals('john.doe@example.com', $user['email']);
    }

    public function testAddUserWithInvalidEmail(): void
    {
        $this->userManager->resetTable();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Email invalide.");

        $this->userManager->addUser('John Doe', 'invalid-email');
    }

    public function testRemoveUser(): void
    {
        $this->userManager->resetTable();

        $this->userManager->addUser('Jane Doe', 'jane.doe@example.com');
        $this->userManager->removeUser(1);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Utilisateur introuvable.");
        $this->userManager->getUser(1);
    }

    public function testInvalidDeleteThrowsException(): void
    {
        $this->userManager->resetTable();

        $this->userManager->addUser('Jane Doe', 'jane.doe@example.com');

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Utilisateur introuvable.");
        $this->userManager->removeUser(40);
    }

    public function testGetUsers(): void
    {
        $this->userManager->resetTable();

        $this->userManager->addUser('John Doe', 'john.doe@example.com');
        $this->userManager->addUser('Jane Doe', 'jane.doe@example.com');

        $users = $this->userManager->getUsers();

        $this->assertCount(2, $users);
    }

    public function testGetUserWithExistingId(): void
    {
        $this->userManager->resetTable();

        $this->userManager->addUser('John Doe', 'john.doe@example.com');

        $user = $this->userManager->getUser(1);

        $this->assertEquals('John Doe', $user['name']);
        $this->assertEquals('john.doe@example.com', $user['email']);
    }

    public function testGetUserWithNonExistingId(): void
    {
        $this->userManager->resetTable();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Utilisateur introuvable.");

        $this->userManager->getUser(999); // ID inexistant
    }

    public function testUpdateUser(): void
    {
        $this->userManager->resetTable();

        $this->userManager->addUser('John Doe', 'john.doe@example.com');

        $this->userManager->updateUser(1, 'John Updated', 'john.updated@example.com');

        $user = $this->userManager->getUser(1);
        $this->assertEquals('John Updated', $user['name']);
        $this->assertEquals('john.updated@example.com', $user['email']);
    }

    public function testInvalidUpdateThrowsException(): void
    {
        $this->userManager->resetTable();

        $this->userManager->addUser('John Doe', 'john.doe@example.com');

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Utilisateur introuvable.");

        $this->userManager->updateUser(50, 'John Updated', 'john.updated@example.com');
    }
}
