<?php

    class Category extends Controller {
        public $modelCategory;
        public $data = [];
        public function __construct() {
            $this->modelCategory = $this->model('CategoryModel');
        }

        public function index() {
            $this->data['content'] = 'category/category';
            $category = $this->modelCategory->getCate();
            if($category != null) {
            $from = 0;
            $pageConditions = '';
            foreach($category as $item) {
                $pageConditions .= 'id='.$item['id'].' OR '; 
            }
            $pageConditions = substr($pageConditions, 0, -3);
            $this->data['subcontent']['category'] = $this->modelCategory->getProductByPage($pageConditions,$from);
            $this->data['subcontent']['pageConditions'] = $pageConditions;
            $cateCount = count($category);
            $this->data['subcontent']['pageTotal'] = ceil($cateCount / 8);
            }
            $this->data['subcontent']['title'] = 'Danh mục sản phẩm';
            $this->render('layouts/client_layout', $this->data);
            
        }

        public function searchProductItem() {
            if(isset($_GET['keyword'])) {
                $keyword = urldecode($_GET['keyword']);
                $dataSearch = $this->modelCategory->searchSuggestions($keyword);
                if($dataSearch !=  null) {
                    echo '<ul>';
                    foreach($dataSearch as $value) {
                        $srcImg = _WEB_ROOT."/public/assets/styles/IMG/products/".$value['name'].".png";
                        $linkSearch = _WEB_ROOT."/detail?name=".$value['name'];
                        echo    '<li class="search_item">
                                    <a href="'.$linkSearch.'">
                                    <img class="search_img" 
                                            src="'.$srcImg.'"
                                            alt="'.$srcImg.'">
                                    <p class="search_name">'.$value['name'].'</p>
                                    </a>
                                </li>';
                    }
                    echo '</ul>';
                }
            }
        }
        public function Pagination() {
            if(isset($_GET['pageNumber'])) {
                $pageNumber = $_GET['pageNumber'];
                $pageConditions = $_GET['pageConditions'];
                $from = ($pageNumber - 1) * 8;
                $pageResult = $this->modelCategory->getProductByPage($pageConditions,$from);
                foreach($pageResult as $cateItem) {
                    echo '<div class="cate_item">
                    <div class="item_top">
                        <img src="'._WEB_ROOT.'/public/assets/styles/IMG/products/'.$cateItem['name'].'.png" 
                        alt="'.$cateItem['name'].'" />
                        <a href="'._WEB_ROOT.'/detail?name='.$cateItem['name'].'">
                                <div class="item_buy">
                                    <p class="text">Click để xem chi tiết</p>
                                    <div class="btn_buy">Đặt hàng</div>
                                </div>
                        </a>
                    </div>
                    <div class="item_bottom">
                        <h2 class="product_text_lg">'.$cateItem['name'].'</h2>
                        <p class="product_price">'.number_format($cateItem['price'],0," ",".").' VND</p">
                    </div>
                </div>';

                }
            }
        }
    }

?>
            