<?php
    class Detail extends Controller {
        public $data = [];
        public $detailModel;

        public function __construct() {

            $this->detailModel = $this->model('DetailModel');
        }
        public function index() {
            $req = new Request();
            $data = $req->getFields();
            $name = $data['name'];
            $this->data['content'] = 'product/detail';
            $this->data['subcontent']['product_detail'] = $this->detailModel->getDetailProduct($name);
            $this->data['subcontent']['title'] = 'Chi tiết sản phẩm';
            $this->render('layouts/client_layout', $this->data);
        }
    }
?>