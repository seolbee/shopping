<div class="page">
        <div class="view">
            <div class="img_box">
                    <img src="<?=$data['result']->photo?>" alt="img">
                    <ul class="img_nation">
                        <li><img src="" alt=""></li>
                    </ul>
                </div>
                <div class="text_box">
                    <p class="sub_title"><?=$data['result']->name?></p>
                    <p><i class="fas fa-heart"></i> <?=$data['result']->likes?> <i class="fas fa-shopping-cart"></i> <?=$data['result']->sales?></p>
                    <p><span class="strong">\<?=number_format($data['result']->current)?></span></p>
                    <p class="small">Delivery cost : free</p>
                    <p class="small">Dealer : <?=$data['result']->brand_name?></p>
                    <p class="small">call : <?=$data['result']->call_number?></p>
                    <form action="/putcart" method="post">
                        <input type="hidden" value="<?=$data['result']->idx?>" name="id" id="product_idx">
                        <select name="size" id="size">
                            <option value="220">220mm</option>
                            <option value="230">230mm</option>
                            <option value="240">240mm</option>
                            <option value="250">250mm</option>
                        </select>
                        <div class="count_box view_count">
                            <div class="count">
                                <div class="minus">-</div>
                                <div class="input_count">
                                    <input type="number" name="count" id="count" min="1" value="1">
                                </div>
                                <div class="plus">+</div>
                            </div>
                        </div>
                        <div class="btn_group">
                            <button class="btn2-outline cart_btn" name="kind" value="cart" type="submit">Add to Cart</button>
                            <button class="btn2" name="kind" value="purchase" type="submit">Buy things</button>
                        </div>
                    </form>
                    <div class="btn_group">
                        <p class="small">브랜드 페이지에서 <a href="<?=$data['result']->link?>" class="a">상세보기</a></p>
                    </div>
                </div>
            </div>
            <script src="js/view.js"></script>