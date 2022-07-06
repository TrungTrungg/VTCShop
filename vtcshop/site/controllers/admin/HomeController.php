<?php 

    class Home extends Controller{
        public $data = [];
        public $homeModel;
        public $userModel;
        public function __construct() {
            $this->homeModel = $this->model('HomeModel');
            $this->userModel = $this->model('UserModel');
        }
        public function index() {
            
            $this->data['content'] = 'home/admHome';
            $this->data['subcontent']['title'] = 'Dashboard';
            $this->data['subcontent']['logintime'] = $this->userModel->getAdminLogin();
            $this->data['subcontent']['countOrder'] = $this->homeModel->countOrder();
            $this->data['subcontent']['countProduct'] = $this->homeModel->countProduct();
            $this->data['subcontent']['countUser'] = $this->homeModel->countUser();
            $this->render('layouts/admin_layout', $this->data);
        }
    }

?>