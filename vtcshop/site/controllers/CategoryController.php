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
            $page_conditions = '';
            foreach($category as $item) {
                $page_conditions .= 'id='.$item['id'].' OR '; 
            }
            $page_conditions = substr($page_conditions, 0, -3);
            $this->data['subcontent']['category'] = $this->modelCategory->getProductByPage($page_conditions,$from);
            $this->data['subcontent']['page_conditions'] = $page_conditions;
            $cate_count = count($category);
            $this->data['subcontent']['page_total'] = ceil($cate_count / 8);
            }
            $this->data['subcontent']['title'] = 'Danh mục sản phẩm';
            $this->render('layouts/client_layout', $this->data);
            
        }

        public function searchProductItem() {
            $req = new Request();
            $data = $req->getFields();
            if(isset($data['keyword'])) {
                $keyword = urldecode($data['keyword']);
                $keyword = $this->modelCategory->searchSuggestions($keyword);
                if($keyword !=  null) {
                    echo '<ul>';
                    foreach($keyword as $value) {
                        $source_img = _WEB_ROOT."/public/assets/styles/IMG/products/".$value['name'].".png";
                        $link_search_result = _WEB_ROOT."/detail?name=".$value['name'];
                        echo    '<li class="search_item">
                                    <a href="'.$link_search_result.'">
                                    <img class="search_img" 
                                            src="'.$source_img.'"
                                            alt="'.$source_img.'">
                                    <p class="search_name">'.$value['name'].'</p>
                                    </a>
                                </li>';
                    }
                    echo '</ul>';
                }
            }
        }
        public function Pagination() {
            $req = new Request();
            $data = $req->getFields();
            if(isset($data['page_number'])) {
                $page_number = $data['page_number'];
                $page_conditions = $data['page_conditions'];
                $from = ($page_number - 1) * 8;
                $page_result = $this->modelCategory->getProductByPage($page_conditions,$from);
                foreach($page_result as $cate_item) {
                    echo '<div class="cate_item">
                    <div class="item_top">
                        <img src="'._WEB_ROOT.'/public/assets/styles/IMG/products/'.$cate_item['name'].'.png" 
                        alt="'.$cate_item['name'].'" />
                        <a href="'._WEB_ROOT.'/detail?name='.$cate_item['name'].'">
                                <div class="item_buy">
                                    <p class="text">Click để xem chi tiết</p>
                                    <div class="btn_buy">Đặt hàng</div>
                                </div>
                        </a>
                    </div>
                    <div class="item_bottom">
                        <h2 class="product_text_lg">'.$cate_item['name'].'</h2>
                        <p class="product_price">'.number_format($cate_item['price'],0," ",".").' VND</p">
                    </div>
                </div>';

                }
            }
        }
    }

?>
            