<?php 
    class OrderModel extends Model{
        public function __construct()
        {
            parent::__construct();
        }
        public function getAllOrder() {
            $query = "SELECT  orders.*, SUM(order_details.price) as totalPrice, 
                                                    SUM(order_details.quantity) as totalQty
                                                    FROM orders, order_details 
                                                    WHERE orders.id = order_details.order_id 
                                                    GROUP BY orders.id;";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOrderPerPage($from, $num) {
            $query = "SELECT orders.*, SUM(order_details.price) as totalPrice,
                                        SUM(order_details.quantity) as totalQty
                                        FROM orders, order_details
                                        WHERE orders.id = order_details.order_id
                                        GROUP BY orders.id
                                        ORDER BY orders.id DESC
                                        LIMIT $from, $num
                                        ";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>