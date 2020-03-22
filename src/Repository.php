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

use FlexPHP\Repositories\Exception\UndefinedGatewayRepositoryException;

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

    public function setGateway($gateway): void
    {
        $this->gateway = $gateway;
    }

    /**
     * @throws UndefinedGatewayRepositoryException
     *
     * @return mixed
     */
    public function getGateway()
    {
        if (\is_null($this->gateway)) {
            throw new UndefinedGatewayRepositoryException();
        }

        return $this->gateway;
    }
}
