<?php declare(strict_types=1);
/*
 * This file is part of FlexPHP.
 *
 * (c) Freddie Gar <freddie.gar@outlook.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace FlexPHP\Repositories\Tests\Mocks;

use FlexPHP\Repositories\Repository;

/**
 * @method GatewayMock getGateway()
 */
final class RepositoryMock extends Repository
{
    /**
     * @throws \FlexPHP\Repositories\Exception\UndefinedGatewayRepositoryException
     *
     * @return int
     */
    public function push(array $item)
    {
        return $this->getGateway()->create($item);
    }

    /**
     * @throws \FlexPHP\Repositories\Exception\UndefinedGatewayRepositoryException
     *
     * @return null|array
     */
    public function get(int $id)
    {
        return $this->getGateway()->read($id);
    }

    /**
     * @throws \FlexPHP\Repositories\Exception\UndefinedGatewayRepositoryException
     *
     * @return bool
     */
    public function shift(int $id, array $item)
    {
        return $this->getGateway()->update($id, $item);
    }

    /**
     * @throws \FlexPHP\Repositories\Exception\UndefinedGatewayRepositoryException
     *
     * @return bool
     */
    public function pop(int $id)
    {
        return $this->getGateway()->delete($id);
    }
}
