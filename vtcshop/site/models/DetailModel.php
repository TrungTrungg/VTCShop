<?php
    class DetailModel extends Model{
        public function __construct() {
            parent::__construct();
        }

        public function getDetailProduct($name) {
                $query = "SELECT products.id, products.name, products.price, categories.name as cate_name 
                            FROM categories 
                            JOIN product_categories 
                            ON categories.id = product_categories.category_id
                            JOIN products 
                            ON product_categories.product_id = products.id
                            WHERE products.name ='$name' 
                            AND categories.name 
                            IN (SELECT categories.name 
                                FROM categories 
                                WHERE categories.is_brand = 1 
                                OR categories.is_brand = 2)";
                return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>