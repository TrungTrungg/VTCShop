<?php

    class CategoryModel extends Model{
        public function __construct() {
            parent::__construct();
        }

        public function getCate() {
            $request = new Request();
            $data = $request->getFields();
            if(isset($data['nameSearch'])) {
                $dataSearch = urldecode($data['nameSearch']);
                $query = "SELECT * FROM products WHERE products.name LIKE '%$dataSearch%' ; ";
            }
            if(isset($data['category'])) {
                $data1 = urldecode($data['category']);
                $query = "SELECT products.* FROM products JOIN product_categories 
                                                ON products.id = product_categories.product_id 
                                                JOIN categories 
                                                ON product_categories.category_id = categories.id 
                                                WHERE categories.name = '$data1'";
            }
            if( isset ($data['category2'])){
                $data2 = urldecode($data['category2']);
                $query = "SELECT products.* FROM products JOIN product_categories 
                                                ON products.id = product_categories.product_id 
                                                JOIN categories 
                                                ON product_categories.category_id = categories.id 
                                                WHERE categories.name = '$data1' AND products.id 
                                                IN ( SELECT products.id FROM products JOIN product_categories 
                                                                                        ON products.id = product_categories.product_id 
                                                                                        JOIN categories 
                                                                                        ON product_categories.category_id = categories.id 
                                                                                        WHERE categories.name = '$data2')";
            } 
            if( isset ($data['name'])){
                $data2 =  urldecode($data['name']);
                $query = "SELECT products.* FROM products JOIN product_categories 
                                                ON products.id = product_categories.product_id 
                                                JOIN categories 
                                                ON product_categories.category_id = categories.id 
                                                WHERE categories.name = '$data1' 
                                                AND products.name = '$data2'";
            }
            if( isset ($data['price1'])){
                $data2 =  urldecode($data['price1']);
                $query = "SELECT products.* FROM products JOIN product_categories 
                                                ON products.id = product_categories.product_id 
                                                JOIN categories 
                                                ON product_categories.category_id = categories.id 
                                                WHERE categories.name = '$data1' 
                                                AND products.price < $data2";
            }
            if( isset ($data['price2'])){
                $data2 =  urldecode($data['price2']);
                $query = "SELECT products.* FROM products JOIN product_categories 
                                                ON products.id = product_categories.product_id 
                                                JOIN categories 
                                                ON product_categories.category_id = categories.id 
                                                WHERE categories.name = '$data1' 
                                                AND products.price > $data2";
            }
            if( isset ($data['price3']) && isset($data['price4'])){
                $data2 =  urldecode($data['price3']);
                $data3 =  urldecode($data['price4']);
                $query = "SELECT products.* FROM products JOIN product_categories 
                                                ON products.id = product_categories.product_id 
                                                JOIN categories 
                                                ON product_categories.category_id = categories.id 
                                                WHERE categories.name = '$data1' 
                                                AND products.price >= $data2 
                                                AND products.price <= $data3";
            }
            if(!isset($query)) {
                $query = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
            };
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function searchSuggestions($keyword) {
            $query = "SELECT * FROM products WHERE products.name LIKE '%$keyword%' LIMIT 4 ";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProductByPage($conditions,$from) {
            $query = "SELECT * FROM products WHERE $conditions LIMIT $from,8";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addProductCategories($product_id,$categories_id) {
            $query = "INSERT INTO product_categories(product_id,category_id) VALUES('$product_id','$categories_id')";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function deleteProductCat($product_id) {
            $query = "DELETE product_categories FROM product_categories, products 
                                                    WHERE product_categories.product_id = products.id 
                                                    AND products.id = '$product_id';";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>