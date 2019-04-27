<?php

namespace FlexPHP\Repositories;

/**
 * Interface RepositoryInterface
 * @package FlexPHP\Repositories
 */
interface RepositoryInterface
{
    /**
     * RepositoryInterface constructor.
     * @param mixed $gateway
     */
    public function __construct($gateway);

    /**
     * Set client|connection to use in repository
     *
     * @param mixed $gateway
     * @return RepositoryInterface
     */
    public function setGateway($gateway): self;

    /**
     * Get client|connection setup by constructor or setGateway method
     *
     * @return mixed
     */
    public function getGateway();
}
