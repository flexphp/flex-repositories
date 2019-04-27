<?php

namespace FlexPHP\Repositories;

/**
 * Interface RepositoryInterface
 * @package FlexPHP\Repositories
 */
interface RepositoryInterface
{
    /**
     * RepositoryInterface constructor. Accept gateway and next repository to execute
     * @param mixed $gateway
     * @param RepositoryInterface $next
     */
    public function __construct($gateway, ?RepositoryInterface $next = null);

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

    /**
     * Set next repository to execute
     *
     * @param RepositoryInterface $next
     * @return RepositoryInterface
     */
    public function setNext(RepositoryInterface $next): RepositoryInterface;

    /**
     * Get next repository to execute
     *
     * @return RepositoryInterface
     */
    public function getNext(): ?RepositoryInterface;
}
