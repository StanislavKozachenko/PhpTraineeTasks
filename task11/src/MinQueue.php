<?php

class MinQueue implements \Countable
{
    /**
     * @var SplPriorityQueue
     */
    private $queue;

    /**
     * @var \SplObjectStorage
     */
    private SplObjectStorage $register;

    /**
     * MinQueue constructor.
     */
    public function __construct()
    {
        $this->queue = new class extends SplPriorityQueue
        {
            public function compare($p, $q): int
            {
                return $q <=> $p;
            }
        };

        $this->register = new \SplObjectStorage();
    }

    /**
     * @param object $value
     * @param mixed  $priority
     */
    public function insert(object $value, mixed $priority)
    {
        $this->queue->insert($value, $priority);
        $this->register->attach($value);
    }

    /**
     * @return object
     */
    public function extract(): object
    {
        $value = $this->queue->extract();
        $this->register->detach($value);

        return $value;
    }

    public function contains($value): bool
    {
        return $this->register->contains($value);
    }

    public function count(): int
    {
        return count($this->queue);
    }
}