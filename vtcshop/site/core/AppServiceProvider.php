<?php

class AppServiceProvider extends ServiceProvider {
        public function __construct() {
            parent::__construct();
        }
        public function boot() {
            $query = "SELECT * FROM client_menu";
            $data['subcontent']['client_menu']  = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
            if(!isset($_SESSION['user'])) {
                if(isset ($_COOKIE['token'])) {
                $token = $_COOKIE['token'];
                $query = "SELECT users.* FROM users JOIN tokens ON users.id =  tokens.user_id
                                    WHERE tokens.token =  '$token' ";
                $getDataToken = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['user'] = $getDataToken;
                }
            }
            if(!isset($_SESSION['admin'])) {
                if(isset ($_COOKIE['adminToken'])) {
                $token = $_COOKIE['adminToken'];
                $query = "SELECT users.* FROM users JOIN tokens ON users.id =  tokens.user_id
                                    WHERE tokens.token =  '$token' ";
                $getDataToken = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['admin'] = $getDataToken;
                }
            }
            if(isset($_SESSION['cart'])) {
                $data_cart = $_SESSION['cart'];
                setcookie('data_cart', json_encode($data_cart), time() + 24 * 60 * 60, '/');
            }
            if(!isset($_SESSION['cart'])) {
                if(isset($_COOKIE['data_cart'])) {
                    $data_cart = json_decode($_COOKIE['data_cart'], true);
                    $_SESSION['cart'] = $data_cart;
                }
            }
            
            View::share($data);
        }
    }

?>