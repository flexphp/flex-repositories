<?php

namespace FlexPHP\Repositories;

use FlexPHP\Repositories\Exception\UndefinedGatewayRepositoryException;

/**
 * Class Repository
 * @package FlexPHP\Repositories
 */
abstract class Repository implements RepositoryInterface
{
    /**
     * @var mixed
     */
    private $gateway;

    public function __construct($gateway = null)
    {
        if (!\is_null($gateway)) {
            $this->setGateway($gateway);
        }
    }

    public function setGateway($gateway): RepositoryInterface
    {
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * @return mixed
     * @throws UndefinedGatewayRepositoryException
     */
    public function getGateway()
    {
        if (\is_null($this->gateway)) {
            throw new UndefinedGatewayRepositoryException();
        }

        return $this->gateway;
    }
}
