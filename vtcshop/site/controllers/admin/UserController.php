<?php

    class User extends Controller{
        public $data = [];
        public $userModel;

        public function __construct() {
            $this->userModel = $this->model('UserModel');
        }

        public function index() {
            $this->data['content'] = 'users/list';
            $this->data['subcontent']['title'] = 'Danh sách người dùng';
            $from = 0;
            $num = 8;
            $this->data['subcontent']['user'] =  $this->userModel->getUserPerPage($from,$num);
            $allUser = $this->userModel->getAllUser();
            $userCount = count($allUser);
            $this->data['subcontent']['pageTotal'] = ceil($userCount / 8);
            $this->render('layouts/admin_layout', $this->data);
        }

        public function pagination() {
            if(isset($_GET['pageNumber'])) {
                $pageNumber = $_GET['pageNumber'];
                $num = 8;
                $from = ($pageNumber - 1) * $num;
                $pageResult = $this->userModel->getUserPerPage($from,$num);
                $numm = ($num * $pageNumber) - 7;
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
                foreach($pageResult as $user) {
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
                    foreach($pageResult as $user){
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
                    
                    foreach($pageResult as $user){
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
            unset($_SESSION['editUser']);
            $this->data['content'] = 'users/addUser';
            $this->data['subcontent']['title'] = 'Thêm người dùng';
            $this->render('layouts/admin_layout', $this->data);
        }

        public function processAddUser() {
            if($_POST['username'] != "" && $_POST['name'] != "" && $_POST['email'] != "" &&
            $_POST['phone_number'] != "" && $_POST['address'] != "" && $_POST['password'] != "") {
                $username = $_POST['username'];
                $fullname = $_POST['name'];
                $email = $_POST['email'];
                $phone_number = $_POST['phone_number'];
                $address = $_POST['address'];
                $password = md5($_POST['password'].time());
                $role_id = $_POST['role_id'];
                $checkUser = $this->userModel->checkUsername($username);
                if ($checkUser == null) {
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
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $this->userModel->deleteUser($id);
            }
        }

        public function findUser() {
            if(isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
                $dataSearch = $this->userModel->findUser($keyword);
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
                foreach($dataSearch as $user) {
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
                    foreach($dataSearch as $user){
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
                    
                    foreach($dataSearch as $user){
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
            if(isset($_GET['username'])) {
            if($_GET['username'] != "") {
                $username = $_GET['username'];
                $checkUsername = $this->userModel->checkUsername($username);
                if($checkUsername != null) {
                    echo "Tên tài khoản đã được đăng ký!";
                }
            }else {
                echo "Không được để trống tên đăng nhập!";
            }
            }
            if(isset($_GET['email'])) {
            if($_GET['email'] != "") {
                $email = $_GET['email'];
                if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if(empty($_SESSION['editUser'])) {
                    $checkUseremail = $this->userModel->checkUseremail($email);
                        if($checkUseremail != null) {
                            echo "Email đã được đăng ký!";
                        }
                }else {
                    $emailS = $_SESSION['editUser'][0]['email'];
                    if($email != $emailS) {
                        $checkUseremail = $this->userModel->checkUseremail($email);
                        if($checkUseremail != null) {
                            echo "Email đã được đăng ký!";
                        }
                    }
                }
                }else {
                    echo "Đây không phải email!";
                }
            }else {
                echo "Không được để trống email!";
            }
            }

            if(isset($_GET['phone_number'])) {
            if($_GET['phone_number'] != "") {
                $phone_number = $_GET['phone_number'];
                if(preg_match('/^[0-9]{10}+$/', $phone_number)) {
                if(empty($_SESSION['editUser'])) {
                    $checkUserphone = $this->userModel->checkUserphone($phone_number);
                        if($checkUserphone != null) {
                            echo "Số điện thoại đã được đăng ký!";
                        }
                }else {
                    $phone_numberS = $_SESSION['editUser'][0]['phone_number'];
                    if($phone_number != $phone_numberS) {
                        $checkUserphone = $this->userModel->checkUserphone($phone_number);
                        if($checkUserphone != null) {
                            echo "Số điện thoại đã được đăng ký!";
                        }
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

        public function editUser() {
            $request = new Request();
            $data = $request ->getFields();
            $this->data['content'] = 'users/editUser';
            $this->data['subcontent']['title'] = 'Trang sửa thông tin người dùng';
            if(isset($data['id'])) {
                $id = $data['id'];
                $user = $this->data['subcontent']['user'] = $this->userModel->getUserById($id);
                $_SESSION['editUser'] = $user;
            }
            $this->render('layouts/admin_layout', $this->data);
        }

        public function processEditUser() {
            if($_POST['fullname'] != "" && $_POST['email'] != "" &&
            $_POST['phone_number'] != "" && $_POST['address'] != "") {
                $id = $_POST['id'];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $phone_number = $_POST['phone_number'];
                $address = $_POST['address'];
                $password = md5($_POST['password']);
                $role_id = $_POST['role_id'];
                $this->userModel->editUser($id,$fullname,$email,$phone_number,$address,$password,$role_id);
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
            $this->data['content'] = 'users/adminLogin';
            $this->data['subcontent']['title'] = 'Trang đăng nhập quản trị viên';
            $request = new Request();
            $data = $request->getFields();
            if(isset($data['username']) && isset($data['password'])) {
            if($data['username'] != "" && $data['password'] != "") {
                $username = $data['username'];
                $password = md5($data['password']);
                $dataAdmin = $this->userModel->loginUser($username, $password);
                if($dataAdmin == null) {
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
                    if($dataAdmin[0]['role_id'] != 1) {
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
                        $token = md5($dataAdmin[0]['username'].time());
                        $user_id = $dataAdmin[0]['id'];
                        setcookie('adminToken', $token, time() + 24 * 60 * 60,'/');
                        $_SESSION['admin'] = $dataAdmin;
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