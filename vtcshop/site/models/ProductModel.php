<?php
    class ProductModel extends Model {
        public function __construct() {
            parent::__construct();
        }

        public function getAllProduct() {
            $query = "SELECT products.*, categories.name as brand FROM products JOIN product_categories
                                            ON products.id = product_categories.product_id
                                            JOIN categories
                                            ON product_categories.category_id = categories.id
                                            WHERE categories.is_brand = 1 
                                            OR categories.is_brand = 2";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getProductPerPage($from,$num) {
            $query = "SELECT products.*, categories.name as brand 
                                            FROM products 
                                            JOIN product_categories
                                            ON products.id = product_categories.product_id
                                            JOIN categories
                                            ON product_categories.category_id = categories.id
                                            WHERE categories.is_brand = 1 
                                            OR categories.is_brand = 2
                                            ORDER BY products.name ASC
                                            LIMIT $from, $num";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getProductBrand() {
            $query = "SELECT * FROM categories WHERE is_brand = 1 or is_brand =  2";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProductCat() {
            $query = "SELECT * FROM categories LIMIT 0,5";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addProduct($name, $price, $qty) {
            $query = "INSERT INTO products(name, price, quantity) VALUES('$name', '$price', '$qty')";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getLastProduct(){
            $query = "SELECT MAX(id) FROM products";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function deleteProduct($id) {
            $query = "DELETE FROM products WHERE id = '$id'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        } 

        public function findProduct($keyword) {
            $query = "SELECT products.*, categories.name as brand FROM products JOIN product_categories
                                                                ON products.id = product_categories.product_id
                                                                JOIN categories
                                                                ON product_categories.category_id = categories.id
                                                                WHERE products.name LIKE '%$keyword%'
                                                                AND categories.is_brand = 1 
                                                                OR categories.is_brand = 2
                                                                ORDER BY products.name ASC
                                                                LIMIT 0, 8";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
                                            
        }

        public function checkProduct($name) {
            $query = "SELECT name FROM products WHERE name = '$name'";
            return $this->db ->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProductById($id) {
            $query = "SELECT products.*, categories.name as brand, categories.id as cat_id 
                                                                FROM products 
                                                                JOIN product_categories
                                                                ON products.id = product_categories.product_id
                                                                JOIN categories
                                                                ON product_categories.category_id = categories.id
                                                                AND products.id = '$id'";
            return $this->db ->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProductByIdC($product_id) {
            $query = "SELECT * FROM products WHERE id = '$product_id'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function editProduct($id,$name,$price,$quantity,$sold) {
            $query = "UPDATE products SET name = '$name', price = '$price', quantity = '$quantity', sold = '$sold' WHERE id = '$id'";
            return $this->db ->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function updateProductSold($product_id,$sold) {
            $query = "UPDATE products SET quantity = quantity - '$sold',
                                            sold = sold + '$sold' 
                                        WHERE id = '$product_id'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>