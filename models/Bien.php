<?php
class Bien extends Model{
    public function __construct(){
        $this->table = 'bien';
        $this->dbConnect();
    }
}