<?php

    class User extends Controller{
        public $data = [];
        public $modelUser;
        public function __construct()
        {
            $this->modelUser = $this->model("UserModel");
        }

        public function login() {
            $request  =  new Request();
            $data = $request->getFields();
            if(isset($data['username']) && isset($data['password'])) {
                $username = $data['username'];
                $password = md5($data['password']);
                
                $dataUser = $this->modelUser->loginUser($username,$password);
            if($dataUser == null || $username == "") {
                echo    '<div class="wrapper">
                            <div class="modal_account js-modal-login open">
                                <div class="modal_content">
                                    <div class="modal_header">
                                        <p>Sai tên đăng nhập hoặc mật khẩu, hãy nhập lại!</p>
                                        <i class="fa fa-times modal_icon js-close-login"></i>
                                    </div>
                                    <div class="modal_footer">
                                        <button  class="js-close-login">Đồng ý!</button>
                                    </div>
                                </div>
                            </div>
                        </div>';
            }else {
                $token = md5($dataUser[0]['username'].time());
                $user_id = $dataUser[0]['id'];
                setcookie('token', $token, time() + 24 * 60 * 60,'/');
                $_SESSION['user'] = $dataUser;
                $dataToken = $this->modelUser->addToken($user_id,$token);
                }
            }

            $this->data['content'] = 'users/login';
            $this->data['subcontent']['title'] = "Trang đăng nhập";
            $this->render('layouts/login_regist', $this->data);
        }
        public function loginUser() {
            
        }

        public function regist() {
            $res = new Response();
            $request  =  new Request();
            $data =  $request->getFields();
            if(isset($data['submit']) && $data['username'] != '' && $data['email'] != '' 
                    && $data['fullname'] != '' && $data['phone_number'] != '' && $data['password'] != '') {
                $username = $data['username'];
                $fullname = $data['fullname'];
                $email = $data['email'];
                $phone_number = $data['phone_number'];
                $password = md5($data['password']);
                $dataUsername = $this->modelUser->checkUsername($username);
                if($dataUsername == null) {
                    $role_id = 2;
                    $address = null;
                    $this->modelUser->addUser($username, $fullname, $email, $phone_number,$address, $password, $role_id);
                    $res->redirect('user/login');
                }else {
                    echo    '<div class="wrapper">
                                <div class="modal_account js-modal-login open">
                                    <div class="modal_content">
                                        <div class="modal_header">
                                            <p>Tạo tài khoản thất bại</p>
                                            <i class="fa fa-times modal_icon js-close-login"></i>
                                        </div>
                                        <div class="modal_footer">
                                            <button  class="js-close-login">Đồng ý!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                }
            } 
            $this->data['content'] = 'users/regist';
            $this->data['subcontent']['title'] = "Trang đăng ký";
            $this->render('layouts/login_regist', $this->data);
        }
        public function checkRegist() {
            
        }
        public function registUser() {
            $request = new Request();
            $data = $request->getFields();
            if(isset($data['username'])) {
                $username =  $data['username'];
                if($username != "") {
                if(preg_match('/^\w{6,}$/', $username)) {
                $dataUsername = $this->modelUser->checkUsername($username);
                if($dataUsername != null)
                echo '<p>Tên tài khoản đã được đăng ký</p>';
                }else {
                    echo '<p>Tài khoản sai định dạng!</p>';    
                }
            } else {
                echo '<p>Không được để trống Tên tài khoản!</p>';    
            }
            }

            if(isset($data['email'])) {
                $email =  $data['email'];
                if($email != "") {
                if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
                $dataUseremail = $this->modelUser->checkUseremail($email);
                if($dataUseremail != null)
                echo '<p>Email đã được đăng ký</p>';
                }else {
                    echo '<p>Đây không phải Email!</p>';    
                }
            } else {
                echo '<p>Không được để trống Email!</p>';    
            }
            }
            if(isset($data['phone_number'])) {
                $phone_number =  $data['phone_number'];
                if($phone_number != "") {
                if(preg_match('/^[0-9]{10}+$/', $phone_number)) {
                $dataUserphone = $this->modelUser->checkUserphone($phone_number);
                if($dataUserphone != null)
                echo '<p>Số điện thoại đã được đăng ký</p>';
                }else {
                    echo '<p>Đây không phải số điện thoại!</p>';    
                }
            } else {
                echo '<p>Không được để trống số điện thoại!</p>';    
            }
            }
            
        }

        public function logout() {
            $res = new Response();
            if(isset($_COOKIE['token'])) {
                $token = $_COOKIE['token'];
                setcookie('token', $token, time() - 24 * 60 * 60, '/');
                unset($_SESSION['user']);
                $res ->redirect('');
            }
        }
    }

?>