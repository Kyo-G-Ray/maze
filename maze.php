<?php

class Maze{
  public $playerY; 
  public $playerX;
  private $tiles = [
    [1, 1, 1, 1, 1, 1],
    [1, 0, 0, 0, 0, 3],
    [1, 0, 0, 0, 1, 1],
    [1, 1, 1, 0, 0, 1],
    [1, 0, 0, 0, 0, 1],
    [1, 1, 2, 1, 1, 1],
  ];


  function __construct(){
    $this->playerY = 4;
    $this->playerX = 2;
  }


  function print(){
    for($y = 0; $y < count($this->tiles); $y++){
      $line = $this->tiles[$y];
      for($x = 0; $x < count($line); $x++){
        $tile = $line[$x];
        if($tile == 0){
          if($this->playerX == $x && $this->playerY == $y){
            echo "＊";
          }
          else{
            echo "　";
          }
        }
        else if($tile == 1){
          echo "壁";
        }
        else if($tile == 2){
          echo "ス";
        }
        else if($tile == 3){
          echo "ゴ";
        }
      }
      echo "\n";
    }
  }


  function errorUp(){
    if($this->tiles[$this->playerY][$this->playerX] == 1){
      $this->playerY += 1;
    }
  }

  function errorDown(){
    if($this->tiles[$this->playerY][$this->playerX] == 1){
      $this->playerY += -1;
    }
  }

  function errorLeft(){
    if($this->tiles[$this->playerY][$this->playerX] == 1){
      $this->playerX += 1;
    }
  }

  function errorRight(){
    if($this->tiles[$this->playerY][$this->playerX] == 1){
      $this->playerX += -1;
    }
  }

  function goal(){
    if($this->playerX == 5 && $this->playerY == 1){
      echo "Goal\n";
      exit;
    }
  }

  function up(){
    $this->playerY += -1;
    $this->errorUp();
  }

  function down(){
    $this->playerY += 1;
    $this->errorDown();
  }
  
  function left(){
    $this->playerX += -1;
    $this->errorLeft();
  }

  function right(){
    $this->playerX += 1;
    $this->errorRight();
  }
}


$maze = new Maze();
$maze->print();

while(true){
  echo "=>";
  $stdin = trim(fgets(STDIN));

  if($stdin == "u"){
    $maze->up();
  }
  else if($stdin == "r"){
    $maze->right();
  }
  else if($stdin == "l"){
    $maze->left();
  }
  else if($stdin == "d"){
    $maze->down();
  }

  $maze->goal();
  $maze->print();
}
