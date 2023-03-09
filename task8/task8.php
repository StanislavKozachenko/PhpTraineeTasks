<?php
class Matrix
{
    private int $_colsNum = 0;
    private int $_rowsNum = 0;
    private array $_matrix = [[]];

    /**
     * @param array|array[] $_matrix
     */
    public function __construct(array $_matrix)
    {
        $this->_matrix = $_matrix;
        $this->_colsNum = count($this->_matrix[0]);
        $this->_rowsNum = count($this->_matrix);
    }

    public function getMatrix(): array
    {
        return $this->_matrix;
    }

    public function show($input): string
    {
        $mas = "";
        foreach ($input as $ind => $val){
            $mas1[] = implode(" | ", $val);
            $mas = implode("<br>", $mas1);
        }
        return $mas;
    }

    /**
     * @return int
     */
    public function getColsNum(): int
    {
        return $this->_colsNum;
    }

    /**
     * @param int $colsNum
     */
    public function setColsNum(int $colsNum): void
    {
        $this->_colsNum = $colsNum;
    }

    /**
     * @return int
     */
    public function getRowsNum(): int
    {
        return $this->_rowsNum;
    }

    /**
     * @param int $rowsNum
     */
    public function setRowsNum(int $rowsNum): void
    {
        $this->_rowsNum = $rowsNum;
    }

    /**
     * @throws Exception
     */
    public function add($b): string
    {
        $result=array();
        if (is_array($b)) {
            $bCol=count($b[0]);
            $bRow=count($b);
            if (($this->_rowsNum !== $bRow) || ($bCol !== $this->_colsNum)) {
                throw new Exception("You can only add Matrices with the same number of rows and columns", 0);
            }
            else {

                for ($i=0; $i < $this->_rowsNum; $i++){
                    for($j=0; $j < $bCol; $j++){
                        $result[$i][$j] = $this->_matrix[$i][$j] + $b[$i][$j];
                    }
                }
                return $this->show($result);
            }
        }
        elseif(is_numeric($b)){
            for ($i=0; $i < $this->_rowsNum; $i++){
                for($j=0; $j < $this->_colsNum; $j++){
                    $result[$i][$j] = $this->_matrix[$i][$j] * $b;
                }
            }
            return $this->show($result);
        }
        else {
            throw new Exception("You can only add Matrices with the same number of rows and columns", 0);
        }
    }
    public function multiply($b): string
    {
        $result = array();
        if (is_array($b)) {
            $bCol=count($b[0]);
            $bRow=count($b);
            if($this->_colsNum != $bRow){
                return "Incompatible matrices...";
            }
            for ($i=0; $i < $this->_rowsNum; $i++){
                for($j=0; $j < $bCol; $j++){
                    $result[$i][$j] = 0;
                    for($k=0; $k < $bRow; $k++){
                        $result[$i][$j] += $this->_matrix[$i][$k] * $b[$k][$j];
                    }
                }
            }
        }
        return $this->show($result);
    }

}
