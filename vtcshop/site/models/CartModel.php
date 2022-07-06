<?php 
    class CartModel extends Model{
        public function getProductById($product_id) {
            $query = "SELECT * FROM products WHERE id = '$product_id'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function saveOrder($user_id,$fullname,$email,$phone_number,$address,$order_date) {
            $query ="INSERT INTO orders(user_id, fullname, email, phone_number, address, order_date) VALUES('$user_id','$fullname','$email','$phone_number','$address','$order_date')";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getOrder(){
            $query = "SELECT MAX(id) FROM orders";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function saveOrderDetail($order_id,$product_id,$price,$quantity) {
            $query ="INSERT INTO order_details(order_id, product_id, price, quantity) VALUES('$order_id','$product_id','$price','$quantity')";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getOrderDetail($order_id) {
            $query ="SELECT order_details.*,products.name FROM order_details JOIN products    
                                            ON order_details.product_id = products.id
                                            WHERE order_id ='$order_id'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>