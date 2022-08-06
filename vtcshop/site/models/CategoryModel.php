<?php

    class CategoryModel extends Model{
        public function __construct() {
            parent::__construct();
        }

        public function getCate() {
            $req = new Request();
            $data = $req->getFields();
            if(isset($data['keyword'])) {
                $keyword = urldecode($data['keyword']);
                $query = "SELECT products.id,products.name,
                                products.price,products.quantity,
                                products.sold, products.is_trend 
                                FROM products 
                                WHERE products.name 
                                LIKE '%$keyword%' ; ";
            }
            if(isset($data['category'])) {
                $data_cate = urldecode($data['category']);
                $query = "SELECT products.id,products.name,
                                products.price,products.quantity,
                                products.sold, products.is_trend FROM products JOIN product_categories 
                                                ON products.id = product_categories.product_id 
                                                JOIN categories 
                                                ON product_categories.category_id = categories.id 
                                                WHERE categories.name = '$data_cate'";
            }
            if( isset ($data['category2'])){
                $data_brand = urldecode($data['category2']);
                $query = "SELECT products.id,products.name,
                                products.price,products.quantity,
                                products.sold, products.is_trend FROM products JOIN product_categories 
                                                ON products.id = product_categories.product_id 
                                                JOIN categories 
                                                ON product_categories.category_id = categories.id 
                                                WHERE categories.name = '$data_cate' AND products.id 
                                                IN ( SELECT products.id FROM products JOIN product_categories 
                                                                        ON products.id = product_categories.product_id 
                                                                        JOIN categories 
                                                                        ON product_categories.category_id = categories.id 
                                                                        WHERE categories.name = '$data_brand')";
            } 
            if( isset ($data['name'])){
                $data_name =  urldecode($data['name']);
                $query = "SELECT products.id,products.name,
                                products.price,products.quantity,
                                products.sold, products.is_trend FROM products JOIN product_categories 
                                                ON products.id = product_categories.product_id 
                                                JOIN categories 
                                                ON product_categories.category_id = categories.id 
                                                WHERE categories.name = '$data_cate' 
                                                AND products.name = '$data_name'";
            }
            if( isset ($data['price1'])){
                $data_price_max1 =  urldecode($data['price1']);
                $query = "SELECT products.id,products.name,
                                products.price,products.quantity,
                                products.sold, products.is_trend FROM products JOIN product_categories 
                                                ON products.id = product_categories.product_id 
                                                JOIN categories 
                                                ON product_categories.category_id = categories.id 
                                                WHERE categories.name = '$data_cate' 
                                                AND products.price < $data_price_max1";
            }
            if( isset ($data['price2'])){
                $data_price_min1 =  urldecode($data['price2']);
                $query = "SELECT products.id,products.name,
                                products.price,products.quantity,
                                products.sold, products.is_trend FROM products JOIN product_categories 
                                                ON products.id = product_categories.product_id 
                                                JOIN categories 
                                                ON product_categories.category_id = categories.id 
                                                WHERE categories.name = '$data_cate' 
                                                AND products.price > $data_price_min1";
            }
            if( isset ($data['price3']) && isset($data['price4'])){
                $data_price_min2 =  urldecode($data['price3']);
                $data_price_max2 =  urldecode($data['price4']);
                $query = "SELECT products.id,products.name,
                                products.price,products.quantity,
                                products.sold, products.is_trend FROM products JOIN product_categories 
                                                ON products.id = product_categories.product_id 
                                                JOIN categories 
                                                ON product_categories.category_id = categories.id 
                                                WHERE categories.name = '$data_cate' 
                                                AND products.price >= $data_price_min2 
                                                AND products.price <= $data_price_max2";
            }
            if(!isset($query)) {
                return null;
            }else{
                return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
            }
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