<?php

namespace FlexPHP\Repositories\Tests\Mocks;

use FlexPHP\Repositories\Repository;

/**
 * Class RepositoryMock
 * @package FlexPHP\Repositories\Tests\Mocks
 * @method GatewayMock getGateway()
 */
class RepositoryMock extends Repository
{
    /**
     * @param array $item
     * @return int
     * @throws \FlexPHP\Repositories\Exception\UndefinedGatewayRepositoryException
     */
    public function push(array $item)
    {
        return $this->getGateway()->create($item);
    }

    /**
     * @param int $id
     * @return array|null
     * @throws \FlexPHP\Repositories\Exception\UndefinedGatewayRepositoryException
     */
    public function get(int $id)
    {
        return $this->getGateway()->read($id);
    }

    /**
     * @param int $id
     * @param array $item
     * @return bool
     * @throws \FlexPHP\Repositories\Exception\UndefinedGatewayRepositoryException
     */
    public function shift(int $id, array $item)
    {
        return $this->getGateway()->update($id, $item);
    }

    /**
     * @param int $id
     * @return bool
     * @throws \FlexPHP\Repositories\Exception\UndefinedGatewayRepositoryException
     */
    public function pop(int $id)
    {
        return $this->getGateway()->delete($id);
    }
}
