<?php


    class HomeModel extends Model{
        public function __construct() {
            parent::__construct();
        }

        public function getListBrand() {
            $query = "SELECT * FROM categories WHERE is_brand = 1";
            return  $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getListLaptop() {
            $query = "SELECT id, name, price, is_trend 
                        FROM products 
                        WHERE is_trend = 1 
                        OR is_trend = 2";
            return  $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        }
        public function getListPC() {
            $query = "SELECT products.id, products.name, products.price 
                        FROM products 
                        JOIN product_categories 
                        ON products.id = product_categories.product_id 
                        JOIN categories
                        ON product_categories.category_id = categories.id 
                        WHERE categories.name = 'PC'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getListKeyboard() {
            $query = "SELECT products.id, products.name, products.price 
                        FROM products 
                        JOIN product_categories 
                        ON products.id = product_categories.product_id 
                        JOIN categories 
                        ON product_categories.category_id = categories.id 
                        WHERE categories.name = 'Bàn phím'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        }

        public function getListMouse() {
            $query = "SELECT products.id, products.name, products.price
                        FROM products JOIN product_categories 
                        ON products.id = product_categories.product_id 
                        JOIN categories 
                        ON product_categories.category_id = categories.id 
                        WHERE categories.name = 'Chuột'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function countOrder() {
            $query = "SELECT COUNT(id) FROM orders";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function countProduct() {
            $query = "SELECT COUNT(id) FROM products";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function countUser() {
            $query = "SELECT COUNT(id) FROM users";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>