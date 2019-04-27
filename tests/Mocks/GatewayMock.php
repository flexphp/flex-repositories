<?php

namespace FlexPHP\Repositories\Tests\Mocks;

/**
 * Class GatewayMock
 * @package FlexPHP\Repositories\Tests\Mocks
 */
class GatewayMock
{
    private $collection = [];

    /**
     * Add item in collection and return id assigned
     *
     * @param array $item
     * @return int
     */
    public function create(array $item): int
    {
        $id = $this->count() + 1;
        $this->collection[$id] = $item;

        return $id;
    }

    /**
     * Get item in collection
     *
     * @param int $id
     * @return array|null
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
     *
     * @param int $id
     * @param array $item
     * @return bool
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
     *
     * @param int $id
     * @return bool
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
