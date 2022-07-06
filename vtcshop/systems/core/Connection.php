<?php
    class Connection{
        private static $instance = null;
        private static $connect = null;
        private function __construct($conf) {

            try{
                $dsn = 'mysql:dbname='.$conf['db'].';host='.$conf['host'];
                $options = [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ];
                $conn = new PDO($dsn, $conf['user'], $conf['pass'], $options);
                self::$connect = $conn;
            }catch(Exception $exception) {
                $mess = $exception->getMessage();
                die($mess);
                // if(preg_match('/Access denied for user/', $mess)) {
                //     die('Lỗi kết nối cơ sở dũ liệu');
                // }

                // if(preg_match('/Uknown databasse/', $mess));
                //     die('Không tìm thấy cơ sở dữ liệu');
            }
        }
        
        public static function getInstance($conf) {
            if(self::$instance == null) {
                self::$instance = new Connection($conf);
                self::$instance = self::$connect;
            }
            return self::$instance;
        }
    }

?>