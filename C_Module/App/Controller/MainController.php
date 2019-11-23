<?php

namespace App\Controller;

use App\DB;

class MainController extends MasterController
{
    public function index(){
        $category = "SELECT * FROM shopping_category";
        $brand = "SELECT * FROM shopping_brand";
        $sales = "SELECT * FROM shopping_sale";
        $this -> render("main", ['category'=>DB::fetchAll($category), 'brand'=>DB::fetchAll($brand), 'sale'=>DB::fetchAll($sales)]);
    }

    public function all(){
        $sql = "SELECT * FROM shopping_category";
        $result = DB::fetchAll($sql);
        $this-> render("all", ['result'=> $result]);
    }

    public function brand(){
        $sql = "SELECT * FROM shopping_brand";
        $result = DB::fetchAll($sql);
        $this -> render("brand", ['result'=>$result]);
    }

    public function sale(){
        $sql = "SELECT * FROM shopping_sale";
        $result = DB::fetchAll($sql);
        $this -> render("sale", ["result"=>$result]);
    }

    public function signIn(){
        $this -> render("signIn");
    }

    public function signUp(){
        $this -> render("signUp");
    }

    public function cart(){
        $this -> render("cart");
    }

    public function purchase(){
        $sql = "SELECT shopping_list.count, shopping_list.delivery_cost, shopping_list.size, shopping_product.* FROM shopping_list, shopping_product WHERE shopping_list.purchase_number = ? AND shopping_list.product_idx = shopping_product.idx";
        $result = DB::fetchAll($sql, [$_SESSION['purchase'][0]->purchase_number]);
        $sql = "SELECT SUM(shopping_product.current - (shopping_product.current * shopping_product.sale_per / 100)) AS sum_current FROM shopping_product, shopping_list WHERE shopping_list.purchase_number = ? AND shopping_list.product_idx = shopping_product.idx";
        $sum = DB::fetch($sql, [$_SESSION['purchase'][0]->purchase_number]);
        $this -> render("purchase", ['result'=>$result, 'sum'=>$sum, 'delivery'=>$sum->sum_current > 50000 ? 0 : 2000]);
    }

    public function myPage(){
        $sql = "SELECT * FROM shopping_user WHERE idx = ?";
        $user = DB::fetch($sql, [$_SESSION['user']->idx]);
        $sql = "SELECT * FROM shopping_list, shopping_product WHERE user_idx = ? AND purchase = 1 AND shopping_list.product_idx = shopping_product.idx";
        $result = DB::fetchAll($sql, [$_SESSION['user']->idx]);
        $sql = "SELECT shopping_product.*, shopping_likes.id FROM shopping_product, shopping_likes WHERE shopping_likes.user_idx = ? AND shopping_likes.product_idx = shopping_product.idx";
        $result2 = DB::fetchAll($sql, [$_SESSION['user']->idx]);
        $this -> render("proflie", ['user'=>$user,'result'=>$result, 'like'=>$result2]);
    }

    public function view(){
        $idx = $_GET['id'];
        $sql = "SELECT shopping_product.*, shopping_brand.name AS brand_name, shopping_brand.call_number, shopping_brand.email FROM shopping_product, shopping_brand WHERE idx = ? AND shopping_product.brand = shopping_brand.id";
        $result = DB::fetch($sql, [$idx]);
        $this -> render("view", ["result" =>$result]);
    }

    public function logout(){
        unset($_SESSION['user']);
        DB::startAndGo("로그아웃 완료 메인 페이지로 이동합니다.", "/");
    }

    public function data(){
        if(isset($_GET['order'])){
            $sql = "SELECT shopping_product FROM shopping_product ORDER BY ".$_GET['order'];
        } else{
            $sql = "SELECT shopping_product.* FROM shopping_product";
            $sql2 = "SELECT product_idx FROM shopping_likes WHERE user_idx = ?";
            $user = DB::fetchAll($sql2, [$_SESSION['user']->idx]);
        }
        $result = DB::fetchAll($sql);
        echo json_encode(['result'=>$result, 'user'=>$user], JSON_UNESCAPED_UNICODE);
    }

    public function cart_list(){
        if(!isset($_SESSION['user'])) DB::stopAndGo("로그인 하지 않은 유저는 들어 올 수 없습니다.");
        $sql = "SELECT shopping_product.name, shopping_product.current, shopping_product.photo, shopping_product.sale_per,shopping_list.* FROM shopping_product, shopping_list WHERE user_idx = ? And shopping_product.idx = shopping_list.product_idx AND shopping_list.purchase = 0 AND shopping_list.purchase_number = 0";
        $result = DB::fetchAll($sql, [$_SESSION['user']->idx]);
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function search(){
        $this->render("search");
    }

    public function search_product(){
        $sql2 = "SELECT product_idx FROM shopping_likes WHERE user_idx = ?";
        $user = DB::fetchAll($sql2, [$_SESSION['user']->idx]);
        echo json_encode(['result'=>$_SESSION['search'], 'user'=>$user], JSON_UNESCAPED_UNICODE);
    }

    public function search_list(){
        $word = "%{$_POST['word']}%";
        $sql = "SELECT * FROM shopping_product WHERE name LIKE ?";
        $result = DB::fetchAll($sql, [$word]);
        if(!$result){
            echo json_encode(['msg'=>"검색하신 상품이 없습니다.", "ok"=>false], JSON_UNESCAPED_UNICODE);
        } else{
            $_SESSION['search'] = $result;
            echo json_encode(["ok"=>true], JSON_UNESCAPED_UNICODE);
        }   
    }

    public function purchase_go(){
        $this->render("purchase_ok");
    }

    public function update(){
        $this->render("update");
    }
}