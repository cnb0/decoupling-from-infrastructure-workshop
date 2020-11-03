<?php
declare(strict_types=1);

namespace DevPro\Infrastructure\Database;

use DevPro\Domain\Model\User\User;
use DevPro\Domain\Model\User\UserRepository;
use DevPro\Infrastructure\AdapterTestServiceContainer;
use PHPUnit\Framework\TestCase;

final class UserRepositoryUsingDbalTest extends TestCase
{
    private AdapterTestServiceContainer $container;

    private UserRepository $repository;

    protected function setUp(): void
    {
        $this->container = new AdapterTestServiceContainer();
        $this->container->boot();

        $this->repository = $this->container->userRepository();
    }

    /**
     * @test
     */
    public function it_can_save_and_retrieve_a_normal_user(): void
    {
        $user = User::createNormalUser($this->repository->nextIdentity(), 'Username');

        $this->repository->save($user);

        $fromDatabase = $this->repository->getById($user->userId());

        self::assertEquals($user, $fromDatabase);
    }

    /**
     * @test
     */
    public function it_can_save_and_retrieve_an_organizer(): void
    {
        $organizer = User::createOrganizer($this->repository->nextIdentity());

        $this->repository->save($organizer);

        $fromDatabase = $this->repository->getById($organizer->userId());

        self::assertEquals($organizer, $fromDatabase);
    }
}
