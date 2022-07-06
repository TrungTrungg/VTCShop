<?php

    class UserModel extends Model{
        public function __construct()
        {
            parent::__construct();
        }
        public function loginUser($username,$password) {
                $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
                return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addToken($user_id,$token) {
            $query = "INSERT INTO tokens(user_id,token) VALUES ('$user_id', '$token') ";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getDataToken($token) {
            $query = "SELECT users.* FROM users JOIN tokens ON users.id =  tokens.user_id
                                    WHERE tokens.token =  '$token' ";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        }

        public function checkUsername($username) {
            $query = "SELECT * FROM users WHERE username = '$username'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function checkUseremail($email) {
            $query = "SELECT * FROM users WHERE email = '$email'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function checkUserphone($phone_number) {
            $query = "SELECT * FROM users WHERE phone_number = '$phone_number'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function addUser($username, $fullname, $email, $phone_number,$address, $password, $role_id) {
            $query = "INSERT INTO users(username, fullname, email, phone_number, address, password, role_id)
                        VALUES('$username', '$fullname', '$email', '$phone_number','$address', '$password', '$role_id')";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getLastUser() {
            $query = "SELECT MAX(id) FROM users";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getAllUser() {
            $query = "SELECT users.*, role.name FROM users, role WHERE role.id = users.role_id ORDER BY users.role_id ASC";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getUserPerPage($from,$num) {
            $query = "SELECT users.*, role.name FROM users, role WHERE role.id = users.role_id  ORDER BY users.role_id ASC LIMIT $from,$num";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function deleteUser($id) {
            $query ="DELETE FROM users WHERE id = '$id'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function findUser($keyword) {
            $query = "SELECT users.*, role.name FROM users, role WHERE role.id = users.role_id AND users.fullname like '%$keyword%'  ORDER BY users.role_id ASC";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getUserById($id) {
            $query = "SELECT users.*,role.name FROM users, role WHERE role.id = users.role_id AND users.id = '$id'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function editUser($id,$fullname,$email,$phone_number,$address,$password,$role_id) {
            $query = "UPDATE  users SET fullname = '$fullname', 
                                            email = '$email' , 
                                            phone_number = '$phone_number' , 
                                            address = '$address' , 
                                            password = '$password', 
                                            role_id = '$role_id'
                                            WHERE id = '$id'";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);                                                                    
        }
        public function addAdminLogin($fullname,$logintime) {
            $query = "INSERT INTO admin_login(fullname,logintime) VALUES('$fullname','$logintime')";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getAdminLogin() {
            $query = "SELECT * FROM admin_login ORDER BY id DESC";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

    }

?>