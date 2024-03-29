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
        if(!isset($_SESSION['user'])) {
            echo json_encode(['mg'=>"로그인 한 유저만 이용 할 수 있습니다.", "like" => false], JSON_UNESCAPED_UNICODE);
            exit;
        }
        $id = $_GET['id'];
        $like = $_GET['like'];
        $sql = "UPDATE shopping_product SET likes = likes";
        if($like == "false"){
            $sql .= " + 1";
            $msg =  "좋아요 한 상품에 추가 되었습니다.";
            $sql2 = "INSERT INTO shopping_likes(product_idx, user_idx) VALUE(?, ?)";
        } else if($like == "true"){
            $sql .= " - 1";
            $msg = "좋아요 한 상품이 취소 되었습니다.";
            $sql2 = "DELETE FROM shopping_likes WHERE product_idx = ? AND user_idx = ?";
        }
        $sql .= " WHERE idx = ?";
        $cnt = DB::query($sql, [$id]);
        $cnt2 = DB::query($sql2, [$id, $_SESSION['user']->idx]);
        if($cnt > 0 && $cnt2 > 0){
            echo json_encode(["mg"=> $msg, 'like'=>true], JSON_UNESCAPED_UNICODE);
        } else{
            echo json_encode(["mg"=>"오류", "like"=> false], JSON_UNESCAPED_UNICODE);
        }
    }

    public function put_cart(){
        $id = $_POST['id'];
        $size = $_POST['size'];
        $count = $_POST['count'];
        $kind = $_POST['kind'];
        $sql = "SELECT * FROM shopping_product WHERE idx = ?";
        $current= DB::fetch($sql, [$id]);
        $val = $current->current - ($current->current * $current->sale_per / 100);
        $delivery_cost = $val > 50000 ? 0 : 2000;
        if(empty($id) || empty($size) || empty($count)){
            DB::stopAndBack("비어 있는 입력란이 있습니다. 확인해 보세요");
        }
        if($kind == "cart"){
            $sql = "SELECT * FROM shopping_list WHERE product_idx = ? AND user_idx = ? AND purchase = 0";
            $result = DB::fetch($sql, [$id, $_SESSION['user']->idx]);
            if($result) DB::stopAndBack("이미 있는 상품 입니다.");
            $sql = "INSERT INTO shopping_list (product_idx, user_idx, purchase, delivery_cost, count, size) VALUE (?, ?, ?, ?, ?, ?)";
            $cnt = DB::query($sql, [$id, $_SESSION['user']->idx, 0, $delivery_cost, $count, $size]);
            if($cnt > 0){
                DB::stopAndBack("장바구니에 담았습니다.");
            } else{
                exit;
            }
        } else if($kind == "purchase"){
            $purchase_number = $_POST['purchase_number'];
            $sql = "INSERT INTO shopping_list (product_idx, user_idx, purchase, delivery_cost, count, size, purchase_number) VALUE (?, ?, ?, ?, ?, ?, ?)";
            $cnt = DB::query($sql, [$id, $_SESSION['user']->idx, 0, $delivery_cost, $count, $size, $purchase_number]);
            $sql = "SELECT * FROM shopping_list WHERE purchase_number = ?";
            $_SESSION['purchase'] = DB::fetchAll($sql, [$purchase_number]);
            DB::startAndGo("결제창으로 이동합니다.", "/purchase");
        }else{
            DB::stopAndBack("잘못된 경로 입니다. 돌아가 주세요");
        }
    }

    public function like_delete(){
        $id = $_GET['id'];
        $sql = "UPDATE shopping_product SET likes = likes - 1 WHERE id = ?";
        $cnt = DB::query($sql, [$id]);
        $sql = "DELETE FROM shopping_likes WHERE id = ? AND user_idx = ?";
        $cnt = DB::query($sql, [$id, $_SESSION['user']->idx]);
        if($cnt > 0){
            DB::stopAndBack("좋아하기 취소 완료");
        } else{
            exit;
        }
    }

    public function receipt(){
        $email = $_POST['email'];
        $bank = $_POST['bank'];
        $sql = "UPDATE shopping_list SET purchase = 1, bank = ?, date = now() WHERE purchase_number = ?";
        $cnt = DB::query($sql, [$bank, $_SESSION['purchase'][0]->purchase_number]);
        if($cnt < 0){
            exit;
        }
        if(!empty($email)){
            $call = $_POST['phone_number'];
        $company_number = $_POST['company_number'];
            if(empty($call)){
                $sql = "INSERT INTO shopping_receipt (purchase_number, company_number, user_idx) VALUE (?, ?, ?)";
                $param = [$_SESSION['purchase'][0]->purchase_number,$company_number, $_SESSION['user']->idx];
            } else{
                $sql = "INSERT INTO shopping_receipt (purchase_number, phone_number, user_idx) VALUE(?, ?, ?)";
                $param = [$_SESSION['purchase'][0]->purchase_number, $call, $_SESSION['user']->idx];
            }
    
            $cnt = DB::query($sql, $param);
            if($cnt < 0){
                exit;
            }
        }
        echo json_encode(['msg'=>"결제 완료"], JSON_UNESCAPED_UNICODE);
    }

    public function update(){
        $idx = $_SESSION['user']->idx;
        $id = $_POST['id'];
        $nicname = $_POST['nicname'];
        $address = $_POST['address'];
        $detailed_address = $_POST['detailed_address'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        if(empty($_POST['pw'])){
            $sql = "UPDATE `shopping_user` SET `id`=?,`address`=?,`detailed_address`=?,`phone_number`=?,`email`=?,`nicname`=? WHERE idx= ?";
            $param = [$id, $address, $detailed_address, $phone_number, $email, $nicname, $idx];
        } else{
            $sql = "UPDATE `shopping_user` SET `id`=?,`password`=PASSWORD(?),`address`=?,`detailed_address`=?,`phone_number`=?,`email`=?,`nicname`=? WHERE idx =?";
            $param = [$id, $_POST['pw'], $address, $detailed_address, $phone_number, $email, $nicname, $idx];
        }
        $cnt = DB::query($sql, $param);
        $sql2 = "SELECT * FROM shopping_user WHERE idx = ?";
        $result = DB::fetch($sql2, [$idx]);
        $_SESSION['user'] = $result;
        if($cnt > 0){
            DB::stopAndBack("변경 완료");
        } else{
            exit;
        }
    }
}