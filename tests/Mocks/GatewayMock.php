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
    private $collection = [];

    /**
     * Add item in collection and return id assigned
     */
    public function create(array $item): int
    {
        $id = $this->count() + 1;
        $this->collection[$id] = $item;

        return $id;
    }

    /**
     * Get item in collection
     */
    public function read(int $id): ?array
    {
        if (!$this->exist($id)) {
            return null;
        }

        return $this->collection[$id];
    }

    /**
     * Edit item in collection
     */
    public function update(int $id, array $item): bool
    {
        if (!$this->exist($id)) {
            return false;
        }

        $this->collection[$id] = $item;

        return true;
    }

    /**
     * Remove item in collection
     */
    public function delete(int $id): bool
    {
        if (!$this->exist($id)) {
            return false;
        }

        unset($this->collection[$id]);

        return true;
    }

    private function exist(int $id)
    {
        return !empty($this->collection[$id]);
    }

    private function count()
    {
        return \count($this->collection);
    }
}
