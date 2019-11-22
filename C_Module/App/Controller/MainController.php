<?php

namespace App\Controller;

use App\DB;

class MainController extends MasterController
{
    public function index(){
        $this -> render("main");
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
        $id = $_SESSION['purchase']['id'];
        $sql = "SELECT * FROM shopping_product WHERE idx = ?";
        $result = DB::fetchAll($sql, [$id]);
        var_dump($result);
        $this -> render("purchase");
    }

    public function myPage(){
        $sql = "SELECT * FROM shopping_list WHERE user_idx = ? AND purchase = 1 AND input = 1";
        $result = DB::fetchAll($sql, [$_SESSION['user']->idx]);
        $sql = "SELECT shopping_product.*, shopping_likes.id FROM shopping_product, shopping_likes WHERE shopping_likes.user_idx = ? AND shopping_likes.product_idx = shopping_product.idx";
        $result2 = DB::fetchAll($sql, [$_SESSION['user']->idx]);
        $this -> render("proflie", ['result'=>$result, 'like'=>$result2]);
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
        if(isset($_GET['id'])){
            $id = $_GET['category'];
            $sql = "SELECT shopping_product.*, shopping_category.id FROM shopping_product, shopping_category WHERE shopping_category.name = ? AND shopping_category.id = shopping_product.brand_idx";
        } else{
            $sql = "SELECT shopping_product.* FROM shopping_product";
        }
        $result = DB::fetchAll($sql);
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function cart_list(){
        if(!isset($_SESSION['user'])) DB::stopAndGo("로그인 하지 않은 유저는 들어 올 수 없습니다.");
        $sql = "SELECT shopping_product.name, shopping_product.current, shopping_product.photo, shopping_list.* FROM shopping_product, shopping_list WHERE user_idx = ? And shopping_product.idx = shopping_list.product_idx AND cart = 1";
        $result = DB::fetchAll($sql, [$_SESSION['user']->idx]);
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function search(){
        $this->render("search");
    }

    public function search_list(){
        $word = $_POST['word'];
        $sql = "SELECT * FROM shopping_product WHERE name like '%$word%'";
        $result = DB::fetchAll($sql);
    }
}