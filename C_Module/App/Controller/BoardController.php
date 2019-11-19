<?php

namespace App\Controller;

use App\DB;

class BoardController
{
    public function login()
    {
    	$id = $_POST['id'];
    	$password = $_POST['pw'];
    	if(empty($id) || empty($password)){
    		DB::stopAndBack("빈 입력창이 존재합니다.");
    	}

    	$sql = "SELECT * FROM shopping_user WHERE id = ? AND password = PASSWORD(?)";
    	$result = DB::fetch($sql, [$id, $password]);
    	if(!isset($result)){
    		DB::stopAndBack("잘 못된 아이디나 비밀번호를 입력하셨습니다. 확인하세요");
    	}
    	$_SESSION['user'] = $result;
    	DB::startAndGo("로그인 완료 환영합니다. 고객님", "/");
    }

    public function register()
    {
    	$id = $_POST['id'];
    	$pw = $_POST['pw'];
    	$address = $_POST['address'];
    	$Detailed_address = $_POST['Detailed_address'];
    	$call = $_POST['call'];
    	$email = $_POST['email'];
    	$nicname = $_POST['nicname'];

    	if(empty($id) || empty($pw) || empty($address) || empty($call) || empty($email)){
    		DB::stoptAndBack("빈 입력창이 존재합니다. 확인해보세요");
    		exit;
    	}

    	$sql = "SELECT * FROM shopping_user WHERE id = ?";
    	$result = DB::fetch($sql, [$id]);
    	if($result){
    		DB::stopAndBack("이미 있는 아이디 입니다. 다른 걸로 입력하세요");
    	}

    	$param = [$id, $pw, $address, $call, $email, $nicname];
    	$sql = "INSERT INTO shopping_user(id, password, address, phone_number, email, nicname) VALUE (?, PASSWORD(?), ?, ?, ?, ?)";
    	if(isset($Detailed_address)){
    		$sql = "INSERT INTO shopping_user(id, password, address, phone_number, email, nicname, detailed_address) VALUE(?, PASSWORD(?), ?, ?, ?, ?, ?)";
    		$param[] = $Detailed_address;
    	}
    	$cnt = DB::query($sql, $param);
    	if($cnt > 0){
    		DB::startAndGo("회원가입 완료", "/signIn");
    	} else{
    		DB::stopAndBack("회원가입 도중 오류");
    	}
    }

    public static function empty_check($param)
    {
    	
    }

    public function likes(){
        if(!isset($_SESSION['user'])) echo json_encode("로그인 한 유저만 이용 할 수 있습니다.", JSON_UNESCAPED_UNICODE);
        var_dump($_GET);
        $id = $_GET['id'];
        $like = $_GET['like'];
        $sql = "UPDATE shopping_product SET likes = likes";
        if($like){
            $sql .= "+ 1";
        } else{
            $sql .= "- 1";
        }
        $sql .= " WHERE idx = ?";
        $cnt = DB::query($sql, [$id]);
        if($cnt > 0){
            echo json_encode($like ? "좋아요 한 상품에 추가 되었습니다." : "좋아요 한 상품이 취소 되었습니다.", JSON_UNESCAPED_UNICODE);
        } else{
            echo json_encode("오류", JSON_UNESCAPED_UNICODE);
        }
    }

    public function put_cart(){
        if(!isset($_SESSION['user'])) DB::startAndGo("로그인 한 유저만 할 수 있습니다. 로그인 페이지로 이동합니다.", "/signIn");
        $id = $_POST['id'];
        $size = $_POST['size'];
        $count = $_POST['count'];
        $kind = $_POST['kind'];
        $sql = "SELECT current FROM shopping_product WHERE id = ?";
        $current= DB::fetch($sql, [$id]);
        $delivery_cost = $current > 50000 ? 0 : 2000;
        if(empty($id) || empty($size) || empty($count)){
            DB::stopAndBack("비어 있는 입력란이 있습니다. 확인해 보세요");
        }

        if($kind == "cart"){
            $sql = "SELECT * FROM shopping_list WHERE product_idx = ? AND user_idx = ?";
            $result = DB::fetch($sql, [$id, $_SESSION['user']->idx]);
            if($result) DB::stopAndBack("이미 있는 상품 입니다.");
            $sql = "INSERT INTO shopping_list (product_idx, user_idx, cart, delivery_cost, count, size) VALUE (?, ?, ?, ?, ?, ?)";
            $param = [$id, $_SESSION['user']->idx, 1, $delivery_cost, $count, $size];
        } else if($kind == "purchase"){
            $sql = "INSERT INTO shopping_list (product_idx, user_idx, purchase, delivery_cost, count, input, size) VALUE (?, ?, ?, ?, ?, ?, ?)";
            $param = [$id, $_SESSION['user']->idx, 1, $delivery_cost, $count, 0, $size];
        } else{
            DB::stopAndBack("잘못된 경로 입니다. 돌아가주세요");
        }

        $cnt = DB::query($sql, $param);
        if($cnt > 0){
            if($kind == "cart") DB::stopAndBack("장바구니에 담았습니다.");
            else if($kind == "purchase"){
                $sql = "SELECT id FROM shopping_list WHERE product_idx = ? AND user_idx = ? AND purchase = 1";
                $idx = DB::fetch($sql, [$id, $_SESSION['user']->idx]);
                DB::startAndGo("결제창으로 이동합니다.", "/purchase?id=".$idx);
            }
        } else{
            exit;
        }
    }
}