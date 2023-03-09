<?php
class Student {
    protected string $_firstName;
    protected string $_lastName;
    protected string $_group;
    protected float $_averageMark;

    /**
     * @param string $_firstName
     * @param string $_lastName
     * @param string $_group
     * @param float $_averageMark
     */
    public function __construct(string $_firstName, string $_lastName, string $_group, float $_averageMark)
    {
        $this->_firstName = $_firstName;
        $this->_lastName = $_lastName;
        $this->_group = $_group;
        $this->_averageMark = $_averageMark;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->_firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->_lastName;
    }


    /**
     * @param string $_lastName
     */
    public function setLastName(string $_lastName): void
    {
        $this->_lastName = $_lastName;
    }

    /**
     * @return string
     */
    public function getGroup(): string
    {
        return $this->_group;
    }

    /**
     * @param string $_group
     */
    public function setGroup(string $_group): void
    {
        $this->_group = $_group;
    }

    /**
     * @return float
     */
    public function getAverageMark(): float
    {
        return $this->_averageMark;
    }

    /**
     * @param float $_averageMark
     */
    public function setAverageMark(float $_averageMark): void
    {
        $this->_averageMark = $_averageMark;
    }

    public function getScholarship(): int
    {
        if($this->getAverageMark() == 5){
            return 100;
        }
        else {
            return 80;
        }
    }
}
