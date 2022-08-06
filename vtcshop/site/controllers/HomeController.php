<?php
    class Home extends Controller{
        public $modelHome;
        public $data = [];
        public function __construct() {
            $this->modelHome = $this->model('HomeModel'); 
        }
        public function index() {
            
            $this->data['content'] = 'home/index';
            
            $this->data['subcontent']['title'] = 'CVT SHOP';
            $this->data['subcontent']['brand_data'] = $this->modelHome->getListBrand();
            $this->data['subcontent']['nav-right'] = '
            <div class="nav_right">
                            <a href="#brand">
                                <i class="nav_icon far fa-copyright"></i>Thương hiệu</a>
                        </div>
                        <div class="nav_right">
                            <a href="#laptop">
                                <i class="nav_icon fas fa-laptop-code"></i>Laptop nổi bật</a>
                        </div>
                        <div class="nav_right">
                            <a href="#pc">
                                <i class="nav_icon fas fa-desktop"></i>PC bán chạy</a>
                        </div>
                        <div class="nav_right">
                            <a href="#keyboard">
                                <i class="nav_icon fas fa-keyboard"></i>Bàn phím giá rẻ</a>
                        </div>
                        <div class="nav_right">
                            <a href="#mouse">
                                <i class="nav_icon fas fa-mouse"></i>Chuột siêu rẻ</a>
                        </div>
            ';
            $this->data['subcontent']['laptop_data'] = $this->modelHome->getListLaptop();
            $this->data['subcontent']['pc_data'] = $this->modelHome->getListPC();
            $this->data['subcontent']['keyboard_data'] = $this->modelHome->getListKeyboard();
            $this->data['subcontent']['mouse_data'] = $this->modelHome->getListMouse();
            $this->render('layouts/client_layout', $this->data);

        }
    }
?>