<?php

namespace FlexPHP\Repositories;

use FlexPHP\Repositories\Exception\UndefinedGatewayException;

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
        if ($gateway) {
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
     * @throws UndefinedGatewayException
     */
    public function getGateway()
    {
        if (is_null($this->gateway)) {
            throw new UndefinedGatewayException();
        }

        return $this->gateway;
    }
}
