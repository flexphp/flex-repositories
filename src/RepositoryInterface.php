<?php declare(strict_types=1);
/*
 * This file is part of FlexPHP.
 *
 * (c) Freddie Gar <freddie.gar@outlook.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace FlexPHP\Repositories;

/**
 * Interface RepositoryInterface
 */
interface RepositoryInterface
{
    /**
     * @param mixed $gateway
     */
    public function __construct($gateway);

    /**
     * Set client|connection to use in repository
     *
     * @param mixed $gateway
     *
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
