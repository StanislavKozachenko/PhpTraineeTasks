<?php
include_once 'MinQueue.php';
include_once 'Dijkstra.php';
include_once 'Maze.php';

class Path {
    private int $_dimension = 10;
    private array $_array = [[]];
    private array $_A = [];
    private array $_B = [];
    public function __construct()
    {
        $this->_A = [
            "x"=>rand(0,9),
            "y"=>rand(0,9)
        ];
        $this->_B = [
            "x"=>rand(0,9),
            "y"=>rand(0,9)
        ];
        for($i = 0; $i < $this->_dimension; $i++){
            for($j = 0; $j < $this->_dimension; $j++){
                $this->_array[$i][$j] = rand(0,1);
            }
        }
        $this->_array[$this->_A["x"]][$this->_A["y"]] = "A";
        $this->_array[$this->_B["x"]][$this->_B["y"]] = "B";
        $file = fopen("task11/src/file.txt", "w") or die("Unable to open file!");
        fwrite($file, $this->writeToFile());
    }
    public function writeToFile(): string
    {
        $mas = "";
        foreach ($this->_array as $val){
            $mas1[] = implode("", $val);
            $mas = implode("\n", $mas1);
        }
        return $mas;
    }
    public function __toString()
    {
        $mas = "";
        foreach ($this->_array as $val){
            $mas1[] = implode(" | ", $val);
            $mas = implode("<br>", $mas1);
        }
        return $mas;
    }

    /**
     * @return string
     */
    public function getA(): string
    {
        return implode(" | ", $this->_A);
    }

    /**
     * @return string
     */
    public function getB(): string
    {
        return implode(" | ", $this->_B);
    }

    public function solve(): string
    {
        $mazeStrWithPath = "";
        foreach (glob('task11/src/file.txt') as $file) {
            $maze = Maze::fromString(file_get_contents($file));;
            $start = $maze->find('A');
            $goal = $maze->find('B');

            $helper = new Dijkstra(
                function ($a) use ($maze) {
                    return $maze->getNeighbors($a, ['1']);
                },
                function ($a, $b) use ($maze) {
                    return $maze->getDistance($a, $b);
                }
            );
            $path = $helper->findPath($start, $goal);
            $mazeStrWithPath = $maze->toString(function ($tile) use ($path) {
                return in_array($tile, $path) && !in_array($tile->value, ['A', 'B'])
                    ? '*'
                    : $tile->value
                    ;
            });
            $mazeStrWithPath = str_replace(array('1','0','A','B',"*"), array(' 1 | ', ' 0 | ', ' A | ',' B | ',' * | '), $mazeStrWithPath);
            $toFile = str_replace("<br>", "\n", $mazeStrWithPath);
            $file = fopen("task11/src/result.txt", "w") or die("Unable to open file!");
            fwrite($file, $toFile);
        }
        return $mazeStrWithPath;
    }
}