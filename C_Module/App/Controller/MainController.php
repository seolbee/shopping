<?php

namespace App\Controller;

use App\DB;

class MainController extends MasterController
{
    public function index(){
        $this -> render("main");
    }

    public function all(){
        if(isset($_GET)){
            $id = $_GET['category'];
            $sql = "SELECT shopping_product.*, shopping_category.name FROM shopping_product, shopping_category";
        } else{
            $sql = "SELECT * FROM shopping_product";
        }
        $result = DB::fetchAll($sql);
        $this-> render("all", $result);
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

    public function view($idx){
        $sql = "SELECT * FROM shopping_product WHERE idx = ?";
        $this -> render("view");
    }

    public function logout(){
        unset($_SESSION['user']);
        DB::startAndGo("로그아웃 완료 메인 페이지로 이동합니다.", "/");
    }
}