<?php
    class Database{

        private $__conn;
        public function __construct() {
            global $db_conf;
            $this->__conn = Connection::getInstance($db_conf);
        }
        public function query($sql) {

            $statement = $this->__conn->prepare($sql);
            $statement->execute();
            
            return $statement;
        }

        public function lastInsertID() {
            return $this->__conn->lastInsertID();
        }
    }

?>