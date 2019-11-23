<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>trackpicke</title>
    <link href="https://fonts.googleapis.com/css?family=Audiowide|Gothic+A1|Istok+Web|Ropa+Sans&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/all.min.css">
    <script src="js/Data.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <header>
        <div class="left">
            <div class="logo">
                <a href="/">TrackPicke</a>
            </div>
            <div class="search">
                <i class="fas fa-align-left"></i>
                <input type="text" name="word" id="search" placeholder="search">
                <button type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <ul class="center">
            <li <?= $page == "main" ? "class=active" : "" ?>><a href="/">home</a></li>
            <li <?= $page == "all" ? "class=active" : ""?>><a href="/all">category</a></li>
            <li <?= $page == "brand" ? "class=active" : ""?>><a href="/brand">brand</a></li>
            <li <?= $page == "sale" ? "class=active" :""?>><a href="/sale">sale</a></li>
        </ul>
        <div class="right">
            <div class="proflie">
                <?php if(isset($_SESSION['user'])) : ?>
                    <a href="/myPage" class="btn <?= $page =="proflie" ? "active" : "" ?>"><i class="fas fa-user"></i><?= $_SESSION['user']->nicname?></a>
                    <a href="/cart" class="btn <?= $page =="cart" ? "active" : "" ?>" ><i class="fas fa-shopping-cart"></i>My Cart</a>
                    <a href="/logout" class="btn <?= $page =="logout" ? "active" : "" ?>" ><i class="fas fa-user-slash"></i>logout</a>
                <?php else :?>
                    <a href="/signIn" class="btn <?= $page =="signIn" ? "active" : "" ?>" ><i class="fas fa-sign-in-alt"></i>sign in</a>
                    <a href="/signUp" class="btn <?= $page =="signUp" ? "active" : "" ?>"><i class="fas fa-user-plus"></i>sign up</a>
                <?php endif;?>
            </div>
        </div>
    </header>
    <section id="main">