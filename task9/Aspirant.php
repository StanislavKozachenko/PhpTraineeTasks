<?php

class Aspirant extends Student {
  public function getScholarship(): int
  {
      if($this->getAverageMark() == 5){
          return 200;
      }
      else {
          return 180;
      }
  }
}