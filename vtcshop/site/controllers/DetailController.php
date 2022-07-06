<?php
    class Detail extends Controller {
        public $data = [];
        public $detailModel;

        public function __construct() {

            $this->detailModel = $this->model('DetailModel');
        }
        public function index() {
            $this->data['content'] = 'product/detail';
            $this->data['subcontent']['productDetail'] = $this->detailModel->getDetailProduct();
            $this->data['subcontent']['title'] = 'Chi tiết sản phẩm';
            $this->render('layouts/client_layout', $this->data);

        }


    }


?>