<?php

    class User extends Controller{
        public $data = [];
        public $userModel;

        public function __construct() {
            $this->userModel = $this->model('UserModel');
        }

        public function index() {
            $from = 0;
            $num = 8;
            $this->data['content'] = 'users/list';
            $this->data['subcontent']['title'] = 'Danh sách người dùng';
            $this->data['subcontent']['user'] =  $this->userModel->getUserPerPage($from,$num);
            $all_user = $this->userModel->getAllUser();
            $user_count = count($all_user);
            $this->data['subcontent']['page_total'] = ceil($user_count / 8);
            $this->render('layouts/admin_layout', $this->data);
        }

        public function pagination() {
            $req = new Request();
            $data = $req->getFields();
            if(isset($data['page_number'])) {
                $page_number = $data['page_number'];
                $num = 8;
                $from = ($page_number - 1) * $num;
                $page_result = $this->userModel->getUserPerPage($from,$num);
                $numm = ($num * $page_number) - 7;
                echo '<table class="dashboard_content_table">
                <thead>
                    <tr>
                        <th class="c1">STT</th>
                        <th class="c2">Quyền hạn</th>
                        <th class="c3">Họ tên</th>
                        <th class="c4">Tên đăng nhập</th>
                        <th class="c5">Email</th>
                        <th class="c6">Số điện thoại</th>
                    </tr>
                </thead>
                <tbody class="table-scroll">';
                foreach($page_result as $user) {
                echo '<tr>
                        <td class="c1">'.$numm.'</td>
                        <td class="c2">'.$user['name'].'</td>
                        <td class="c3">'.$user['fullname'].'</td>
                        <td class="c4">'.$user['username'].'</td>
                        <td class="c5">'.$user['email'].'</td>
                        <td class="c6">'.$user['phone_number'].'</td>
                        <td class="c7 btn-delete" id="btn-open-modal-'.$user['id'].'">Xóa</td>';
                echo  $user['name'] !== 'Khách'?'<td class="c7 btn-edit"><a href="'._WEB_ROOT.'/admin/user/editUser?id='.$user['id'].'">Sửa</a></td>' : false;
                echo  '</tr>';
                    $numm +=1; };
                    echo '</tbody>
                        </table>';
                    foreach($page_result as $user){
                    echo '<div class="modalSuccess">
                    <div class="modalS modalD-'.$user['id'].'">
                        <div class="modal_content">
                            <div class="modal_content_header">Thông báo</div>
                            <div class="modal_content_body">
                                <p>Xác nhận xóa người dùng này!</p>
                            </div>
                            <div class="modal_content_footer">
                                <div class="btn-close" id="btn-close-'.$user['id'].'">Hủy</div>
                                <div class="btn-delete" id="btn-delete-'.$user['id'].'"><a href="'._WEB_ROOT.'/admin/user">Xác nhận</a></div>
                            </div>
                        </div>
                    </div>
                </div>';
                    }
                echo '<script type="text/javascript">
                $(document).ready(function() {';
                    
                    foreach($page_result as $user){
                echo  'const modal'.$user['id'].' = document.querySelector(".modalD-'.$user['id'].'");
                $("#btn-open-modal-'.$user['id'].'").click(function() {
                    modal'.$user['id'].'.classList.add("open");
                });
                $("#btn-close-'.$user['id'].'").click(function() {
                    modal'.$user['id'].'.classList.remove("open");
                });
                $("#btn-delete-'.$user['id'].'").click(function() {
                    let id = '.$user['id'].';
                    $.ajax({
                        url: "'._WEB_ROOT.'/admin/user/deleteUser",
                        method: "GET",
                        data: {id:id}
                    });
                });';
                    }
                echo '});
                    </script>';
            }
        }

        public function addUser() {
            $this->data['content'] = 'users/addUser';
            $this->data['subcontent']['title'] = 'Thêm người dùng';
            $this->render('layouts/admin_layout', $this->data);
        }

        public function processAddUser() {
            $req = new Request();
            $data = $req->getFields();
            if($data['username'] != "" && $data['name'] != "" && $data['email'] != "" &&
            $data['phone_number'] != "" && $data['address'] != "" && $data['password'] != "") {
                $username = $data['username'];
                $fullname = $data['name'];
                $email = $data['email'];
                $phone_number = $data['phone_number'];
                $address = $data['address'];
                $password = md5($data['password'].time());
                $role_id = $data['role_id'];
                $check_user = $this->userModel->checkUsername($username);
                if ($check_user == null) {
                $this->userModel->addUser($username, $fullname, $email, $phone_number,$address, $password, $role_id);
                echo '<div class="modal open">
                        <div class="modal_content">
                            <div class="modal_content_header">Thông báo</div>
                            <div class="modal_content_body">
                                <p>Thêm người dùng thành công!</p>
                            </div>
                            <div class="modal_content_footer">
                                <div class="btn-list"><a href="'._WEB_ROOT.'/admin/user">Xem danh sách</a></div>
                                <div class="btn-close" id="btn-close">Tiếp tục thêm</div>
                            </div>
                        </div>
                    </div>';
                echo '<script src="'._WEB_ROOT.'/public/assets/JS/modalSuccess.js"></script>';
            }
            else {
                echo '<div class="modal open">
                        <div class="modal_content">
                            <div class="modal_content_header">Thông báo</div>
                            <div class="modal_content_body">
                                <p>Thêm người dùng thất bại!</p>
                            </div>
                            <div class="modal_content_footer">
                                <div class="btn-list"><a href="'._WEB_ROOT.'/admin/user">Xem danh sách</a></div>
                                <div class="btn-close" id="btn-close">Tiếp tục thêm</div>
                            </div>
                        </div>
                    </div>';
                echo '<script src="'._WEB_ROOT.'/public/assets/JS/modalSuccess.js"></script>';
            }
        } else {
            echo '<div class="modal open">
                        <div class="modal_content">
                            <div class="modal_content_header">Thêm thất bại</div>
                            <div class="modal_content_body">
                                <p>Tên tài khoản đã tồn tại!</p>
                            </div>
                            <div class="modal_content_footer">
                                <div class="btn-list"><a href="'._WEB_ROOT.'/admin/user">Xem danh sách</a></div>
                                <div class="btn-close" id="btn-close">Tiếp tục thêm</div>
                            </div>
                        </div>
                    </div>';
                echo '<script src="'._WEB_ROOT.'/public/assets/JS/modalSuccess.js"></script>';
        }
        }

        public function deleteUser() {
            $req = new Request();
            $data = $req->getFields();
            if(isset($data['id'])) {
                $id = $data['id'];
                $this->userModel->deleteUser($id);
            }
        }

        public function findUser() {
            $req = new Request();
            $data = $req->getFields();
            if(isset($data['keyword'])) {
                $keyword = $data['keyword'];
                $data_search = $this->userModel->findUser($keyword);
                $numm = 1;
                echo '<table class="dashboard_content_table">
                <thead>
                    <tr>
                        <th class="c1">STT</th>
                        <th class="c2">Quyền hạn</th>
                        <th class="c3">Họ tên</th>
                        <th class="c4">Tên đăng nhập</th>
                        <th class="c5">Email</th>
                        <th class="c6">Số điện thoại</th>
                    </tr>
                </thead>
                <tbody class="table-scroll">';
                foreach($data_search as $user) {
                echo '<tr>
                        <td class="c1">'.$numm.'</td>
                        <td class="c2">'.$user['name'].'</td>
                        <td class="c3">'.$user['fullname'].'</td>
                        <td class="c4">'.$user['username'].'</td>
                        <td class="c5">'.$user['email'].'</td>
                        <td class="c6">'.$user['phone_number'].'</td>
                        <td class="c7 btn-delete" id="btn-open-modal-'.$user['id'].'">Xóa</td>';
                echo  $user['name'] !== 'Khách'?'<td class="c7 btn-edit"><a href="'._WEB_ROOT.'/admin/user/editUser?id='.$user['id'].'">Sửa</a></td>' : false;
                echo  '</tr>';
                    $numm +=1; };
                    echo '</tbody>
                        </table>';
                    foreach($data_search as $user){
                    echo '<div class="modalSuccess">
                    <div class="modalS modalD-'.$user['id'].'">
                        <div class="modal_content">
                            <div class="modal_content_header">Thông báo</div>
                            <div class="modal_content_body">
                                <p>Xác nhận xóa người dùng này!</p>
                            </div>
                            <div class="modal_content_footer">
                                <div class="btn-close" id="btn-close-'.$user['id'].'">Hủy</div>
                                <div class="btn-delete" id="btn-delete-'.$user['id'].'"><a href="'._WEB_ROOT.'/admin/user">Xác nhận</a></div>
                            </div>
                        </div>
                    </div>
                </div>';
                    }
                echo '<script type="text/javascript">
                $(document).ready(function() {';
                    
                    foreach($data_search as $user){
                echo  'const modal'.$user['id'].' = document.querySelector(".modalD-'.$user['id'].'");
                $("#btn-open-modal-'.$user['id'].'").click(function() {
                    modal'.$user['id'].'.classList.add("open");
                });
                $("#btn-close-'.$user['id'].'").click(function() {
                    modal'.$user['id'].'.classList.remove("open");
                });
                $("#btn-delete-'.$user['id'].'").click(function() {
                    let id = '.$user['id'].';
                    $.ajax({
                        url: "'._WEB_ROOT.'/admin/user/deleteUser",
                        method: "GET",
                        data: {id:id}
                    });
                });';
                    }
                echo '});
                    </script>';
            }
        }

        public function checkUser() {
            $req = new Request();
            $data = $req->getFields();
            if(isset ($data['id'])) {
            $user_id = $data['id'];
            $user_info = $this->userModel->getUserById($user_id)[0];
            $user_email = $user_info['email'];
            $user_phone = $user_info['phone_number'];
            if(isset($data['username'])) {
                if($data['username'] != "") {
                    $username = $data['username'];
                    $check_username = $this->userModel->checkUsername($username);
                    if($check_username != null) {
                        echo "Tên tài khoản đã được đăng ký!";
                    }
                }else {
                    echo "Không được để trống tên đăng nhập!";
                }
            }
            if(isset($data['email'])) {
                if($data['email'] != "") {
                    $email = $data['email'];
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        if($email != $user_email) {
                            $check_email = $this->userModel->checkUseremail($email);
                            if($check_email != null) {
                                echo "Email đã được đăng ký!";
                            }
                        }
                    }else {
                        echo "Đây không phải email!";
                    }
                }else {
                    echo "Không được để trống email!";
                }
            }

            if(isset($data['phone_number'])) {
                if($data['phone_number'] != "") {
                    $phone_number = $data['phone_number'];
                    if(preg_match('/^[0-9]{10}+$/', $phone_number)) {
                        if($phone_number != $user_phone) {
                            $check_phone = $this->userModel->checkUserphone($phone_number);
                            if($check_phone != null) {
                                echo "Số điện thoại đã được đăng ký!";
                            }
                        }
                    }else {
                        echo "Số điện thoại không đúng!";
                    }
                }else {
                    echo "Không được để trống số điện thoại!";
                }
            }
        }
        }

        public function editUser() {
            $req = new Request();
            $data = $req ->getFields();
            $this->data['content'] = 'users/editUser';
            $this->data['subcontent']['title'] = 'Trang sửa thông tin người dùng';
            if(isset($data['id'])) {
                $id = $data['id'];
                $this->data['subcontent']['user_info'] = $this->userModel->getUserById($id);
            }
            $this->render('layouts/admin_layout', $this->data);
        }

        public function processEditUser() {
            $req = new Request();
            $data = $req ->getFields();
            if($data['fullname'] != "" && $data['email'] != "" &&
            $data['phone_number'] != "" && $data['address'] != "") {
                $id = $data['id'];
                $fullname = $data['fullname'];
                $email = $data['email'];
                $phone_number = $data['phone_number'];
                $address = $data['address'];
                $role_id = $data['role_id'];
                if($data['password'] != "")
                {
                    $password = md5($data['password']);
                    $this->userModel->editUser($id,$fullname,$email,$phone_number,$address,$password,$role_id);
                }else {
                    $this->userModel->editUserWithoutPassword($id,$fullname,$email,$phone_number,$address,$role_id);
                }
                echo '<div class="modalE open">
                        <div class="modal_content">
                            <div class="modal_content_header">Thông báo</div>
                            <div class="modal_content_body">
                                <p>Sửa người dùng thành công!</p>
                            </div>
                            <div class="modal_content_footer">
                                <div class="btn-list"><a href="'._WEB_ROOT.'/admin/user">Xem danh sách</a></div>
                                <div class="btn-close" id="btn-closeE">Tiếp tục Sửa</div>
                            </div>
                        </div>
                    </div>';
                echo '<script>
                    $(document).ready(function() {
                        const modal = document.querySelector(".modalE");
                        $("#btn-closeE").click(function() {
                            modal.classList.remove("open");
                        })
                    })
                
                </script>';
            }
            else {
                echo '<div class="modalE open">
                        <div class="modal_content">
                            <div class="modal_content_header">Thông báo</div>
                            <div class="modal_content_body">
                                <p>Sửa người dùng thất bại!</p>
                            </div>
                            <div class="modal_content_footer">
                                <div class="btn-list"><a href="'._WEB_ROOT.'/admin/user">Xem danh sách</a></div>
                                <div class="btn-close" id="btn-closeE">Tiếp tục sửa</div>
                            </div>
                        </div>
                    </div>';
                echo '<script>
                $(document).ready(function() {
                    const modal = document.querySelector(".modalE");
                    $("#btn-closeE").click(function() {
                        modal.classList.remove("open");
                    })
                })
            
            </script>';
            }
        }

        public function login() {
            $req = new Request();
            $data = $req->getFields();
            $this->data['content'] = 'users/adminLogin';
            $this->data['subcontent']['title'] = 'Trang đăng nhập quản trị viên';
            if(isset($data['username']) && isset($data['password'])) {
            if($data['username'] != "" && $data['password'] != "") {
                $username = $data['username'];
                $password = md5($data['password']);
                $admin_data = $this->userModel->loginUser($username, $password);
                if($admin_data == null) {
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
                        </div>
                        <script>
                            $(document).ready(function() {
                                const modal = document.querySelector(".js-modal-login");
                                $(".js-close-login").click(function() {
                                    modal.classList.remove("open");
                                })
                            })
                        </script>';
                } else {
                    if($admin_data[0]['role_id'] != 1) {
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
                        </div>
                        <script>
                            $(document).ready(function() {
                                const modal = document.querySelector(".js-modal-login");
                                $(".js-close-login").click(function() {
                                    modal.classList.remove("open");
                                })
                            })
                        </script>';
                    }else {
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $token = md5($admin_data[0]['username'].time());
                        $user_id = $admin_data[0]['id'];
                        setcookie('adminToken', $token, time() + 24 * 60 * 60,'/');
                        $_SESSION['admin'] = $admin_data;
                        $fullname = $_SESSION['admin'][0]['fullname'];
                        $logintime = date('Y-m-d H:i:s');
                        $this->userModel->addAdminLogin($fullname, $logintime);
                        $this->userModel->addToken($user_id,$token);
                    }
                }
            }else {
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
                        </div>
                        <script>
                            $(document).ready(function() {
                                const modal = document.querySelector(".js-modal-login");
                                $(".js-close-login").click(function() {
                                    modal.classList.remove("open");
                                })
                            })
                        </script>';
            }
        }
            $this->render('layouts/login_regist', $this->data);
        }

        public function loginUser() {
            
        }

        public function logout() {
            $res = new Response();
            if(isset($_COOKIE['adminToken'])) {
                $token = $_COOKIE['adminToken'];
                setcookie('adminToken', $token, time() - 24 * 60 * 60, '/');
                unset($_SESSION['admin']);
                $res ->redirect('admin/user/login');
            }
        }
    }
?>