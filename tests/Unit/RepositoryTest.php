<?php declare(strict_types=1);
/*
 * This file is part of FlexPHP.
 *
 * (c) Freddie Gar <freddie.gar@outlook.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace FlexPHP\Repositories\Tests\Unit;

use FlexPHP\Repositories\Exception\UndefinedGatewayRepositoryException;
use FlexPHP\Repositories\RepositoryInterface;
use FlexPHP\Repositories\Tests\Mocks\GatewayMock;
use FlexPHP\Repositories\Tests\Mocks\RepositoryMock;
use FlexPHP\Repositories\Tests\TestCase;

class RepositoryTest extends TestCase
{
    public function testItUseInterface(): void
    {
        $repository = new RepositoryMock();

        $this->assertInstanceOf(RepositoryInterface::class, $repository);
    }

    /**
     * @throws UndefinedGatewayRepositoryException
     */
    public function testItInitializeWithGateway(): void
    {
        $gateway = new GatewayMock();

        $repository = new RepositoryMock($gateway);

        $this->assertSame($gateway, $repository->getGateway());
    }

    /**
     * @throws UndefinedGatewayRepositoryException
     */
    public function testItInitializeGatewayUsingSetter(): void
    {
        $gateway = new GatewayMock();

        $repository = new RepositoryMock();

        $this->assertSame($repository, $repository->setGateway($gateway));
        $this->assertSame($gateway, $repository->getGateway());
    }

    /**
     * @throws UndefinedGatewayRepositoryException
     */
    public function testItUseGateway(): void
    {
        $gateway = new GatewayMock();

        $repository = new RepositoryMock();
        $repository->setGateway($gateway);

        $id = 1;
        $item = ['foo'];
        $notExist = 999;

        $this->assertSame($id, $repository->push($item));
        $this->assertSame($item, $repository->get($id));
        $this->assertSame(true, $repository->shift($id, $item));
        $this->assertSame(true, $repository->pop($id));

        $this->assertSame(null, $repository->get($notExist));
        $this->assertSame(false, $repository->shift($notExist, []));
        $this->assertSame(false, $repository->pop($notExist));
    }

    /**
     * @throws UndefinedGatewayRepositoryException
     */
    public function testItGetUndefinedGatewayThrowException(): void
    {
        $this->expectException(UndefinedGatewayRepositoryException::class);

        $repository = new RepositoryMock();
        $repository->getGateway();
    }
}
