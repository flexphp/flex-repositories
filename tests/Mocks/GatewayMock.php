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

final class GatewayMock
{
    /**
     * @var array<int, array>
     */
    private $collection = [];

    /**
     * Add item in collection and return id assigned
     */
    public function create(array $item): int
    {
        $identifier = $this->count() + 1;
        $this->collection[$identifier] = $item;

        return $identifier;
    }

    /**
     * Get item in collection
     */
    public function read(int $identifier): ?array
    {
        if (!$this->exist($identifier)) {
            return null;
        }

        return $this->collection[$identifier];
    }

    /**
     * Edit item in collection
     */
    public function update(int $identifier, array $item): bool
    {
        if (!$this->exist($identifier)) {
            return false;
        }

        $this->collection[$identifier] = $item;

        return true;
    }

    /**
     * Remove item in collection
     */
    public function delete(int $identifier): bool
    {
        if (!$this->exist($identifier)) {
            return false;
        }

        unset($this->collection[$identifier]);

        return true;
    }

    private function exist(int $identifier): bool
    {
        return !empty($this->collection[$identifier]);
    }

    private function count(): int
    {
        return \count($this->collection);
    }
}
