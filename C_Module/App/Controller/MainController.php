<?php

namespace App\Controller;

use App\DB;

class MainController extends MasterController
{
    public function index(){
        $this -> render("main");
    }

    public function all(){
        $this-> render("all");
    }

    public function brand(){
        $this -> render("brand");
    }

    public function sale(){
        $this -> render("sale");
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
        $this -> render("purchase");
    }

    public function myPage(){
        $this -> render("proflie");
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
            $sql = "SELECT shopping_product.*, shopping_category.name FROM shopping_product, shopping_category";
        } else{
            $sql = "SELECT * FROM shopping_product";
        }
        $result = DB::fetchAll($sql);
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}