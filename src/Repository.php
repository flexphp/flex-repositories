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

    /**
     * @var RepositoryInterface
     */
    private $next;

    public function __construct($gateway = null, ?RepositoryInterface $next = null)
    {
        if ($gateway) {
            $this->setGateway($gateway);
        }

        if ($next) {
            $this->setNext($next);
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

    public function setNext(RepositoryInterface $next): RepositoryInterface
    {
        $this->next = $next;

        return $this;
    }

    public function getNext(): ?RepositoryInterface
    {
        return $this->next;
    }
}
