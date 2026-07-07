<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testEmailGetterAndSetter(): void
    {
        $user = new User();
        $user->setEmail('jean.dupont@example.com');

        $this->assertSame('jean.dupont@example.com', $user->getEmail());
        $this->assertSame('jean.dupont@example.com', $user->getUserIdentifier());
    }

    public function testRolesAlwaysContainRoleUser(): void
    {
        $user = new User();

        // Même sans rôle explicite, ROLE_USER doit toujours être présent.
        $this->assertContains('ROLE_USER', $user->getRoles());
    }

    public function testAdminRoleIsPreserved(): void
    {
        $user = new User();
        $user->setRoles(['ROLE_ADMIN']);

        $this->assertContains('ROLE_ADMIN', $user->getRoles());
        $this->assertContains('ROLE_USER', $user->getRoles());
    }

    public function testIsActiveDefaultsToTrue(): void
    {
        $user = new User();

        $this->assertTrue($user->isActive());
    }
}
