<?php
    abstract class ServiceProvider extends Database{
        protected $db;
        public function __construct(){
            $this->db =  new Database();
        }
        abstract public function boot();
    }
?>