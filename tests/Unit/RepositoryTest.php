<?php

namespace FlexPHP\Repositories\Tests\Unit;

use FlexPHP\Repositories\Exception\UndefinedGatewayException;
use FlexPHP\Repositories\RepositoryInterface;
use FlexPHP\Repositories\Tests\Mocks\RepositoryMock;
use FlexPHP\Repositories\Tests\TestCase;

class RepositoryTest extends TestCase
{
    public function testItUseInterface()
    {
        $repository = new RepositoryMock();

        $this->assertInstanceOf(RepositoryInterface::class, $repository);
    }

    /**
     * @throws UndefinedGatewayException
     */
    public function testItInitializeWithoutAttributes()
    {
        $repository = new RepositoryMock();

        $this->assertSame(null, $repository->getNext());
        $this->expectException(UndefinedGatewayException::class);
        $repository->getGateway();
    }

    /**
     * @throws UndefinedGatewayException
     */
    public function testItInitializeWithGateway()
    {
        $gateway = new \stdClass();

        $repository = new RepositoryMock($gateway);

        $this->assertSame($gateway, $repository->getGateway());
    }

    /**
     * @throws UndefinedGatewayException
     */
    public function testItInitializeGatewayUsingSetter()
    {
        $gateway = new \stdClass();

        $repository = new RepositoryMock();

        $this->assertSame($repository, $repository->setGateway($gateway));
        $this->assertSame($gateway, $repository->getGateway());
    }

    /**
     * @throws UndefinedGatewayException
     */
    public function testItGetUndefinedGatewayThrowException()
    {
        $this->expectException(UndefinedGatewayException::class);

        $repository = new RepositoryMock();
        $repository->getGateway();
    }

    public function testItInitializeWithNext()
    {
        $gateway = new \stdClass();
        $next = new RepositoryMock();

        $repository = new RepositoryMock($gateway, $next);

        $this->assertSame($next, $repository->getNext());
    }

    public function testItInitializeNextUsingSetter()
    {
        $next = new RepositoryMock();

        $repository = new RepositoryMock();

        $this->assertSame($repository, $repository->setNext($next));
        $this->assertSame($next, $repository->getNext());
    }
}
