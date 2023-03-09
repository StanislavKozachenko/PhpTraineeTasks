<?php

class Maze
{
    /**
     * @var array
     */
    private array $tiles = [];

    /**
     * Maze constructor.
     *
     * @param array $tiles
     */
    private function __construct(array $tiles = [])
    {
        $this->tiles = $tiles;
    }

    /**
     * @param string $maze
     * @param string $rowDelimiter
     *
     * @return Maze
     */
    public static function fromString(string $maze, string $rowDelimiter = "\n"): Maze
    {
        $tiles = [];

        foreach (explode($rowDelimiter, $maze) as $r => $row) {
            $rowTiles = [];
            foreach (str_split(trim($row)) as $c => $value) {
                $rowTiles[] = (object)[
                    'row' => $r,
                    'col' => $c,
                    'value' => $value
                ];
            }

            $tiles[] = $rowTiles;
        }

        return new self($tiles);
    }

    /**
     * @param callable|null $renderer
     * @param string $rowDelimiter
     *
     * @return string
     */
    public function toString(callable $renderer = null, string $rowDelimiter = "<br>"): string
    {
        $renderer = $renderer ?: function ($tile) { return $tile->value; };

        $result = [];
        foreach ($this->tiles as $r => $row) {
            if (!isset($result[$r])) {
                $result[$r] = [];
            }

            foreach ($row as $c => $tile) {
                $result[$r][$c] = $renderer($tile);
            }
        }

        return implode($rowDelimiter, array_map('implode', $result));
    }

    /**
     * @param string $value
     *
     * @return object
     */
    public function find(string $value): ?object
    {
        foreach ($this->tiles as $row) {
            foreach ($row as $tile) {
                if ($tile->value === $value) {
                    return $tile;
                }
            }
        }

        return null;
    }

    /**
     * @param object $tile
     * @param array  $filter
     *
     * @return array
     */
    public function getNeighbors(object $tile, array $filter = []): array
    {
        $neighbors = [];
        foreach ([
                     [-1, -1], [-1, 0], [-1, 1],
                     [ 0, -1],          [ 0, 1],
                     [ 1, -1], [ 1, 0], [ 1, 1],
                 ] as $transformation) {
            $r = $tile->row + $transformation[0];
            $c = $tile->col + $transformation[1];

            if (isset($this->tiles[$r][$c]) && !in_array($this->tiles[$r][$c]->value, $filter, true)) {
                $neighbors[] = $this->tiles[$r][$c];
            }
        }

        return $neighbors;
    }

    /**
     * @param object $a
     * @param object $b
     *
     * @return float
     */
    public function getDistance(object $a, object $b): float
    {
        $p = $b->row - $a->row;
        $q = $b->col - $a->col;

        return sqrt($p * $p + $q * $q);
    }

}