<div class="proflie_page">
    <div class="proflie_box">
        <p class="sub_title">My Proflie</p>
        <div class="p_box">
            <p><?=$data['user']->nicname?></p>
            <p><?=$data['user']->phone_number?></p>
            <p><?=$data['user']->address?> <?=$data['user']->detailed_address?></p>
            <p><?=$data['user']->email?></p>
            <a href="/update" class="btn2">개인정보 변경</a>
        </div>
    </div>
            <p class="sub_title">Purchase List</p>
            <div class="order">
                <?php foreach($data['result'] as $item) : ?>
                    <div class="order_box">
                        <img src="<?=$item->photo?>" alt="img">
                        <div class="p_box">
                            <p><?=$item->name?></p>
                            <p>size : <?=$item->size?>mm</p>
                            <p>count : <?=$item->count?></p>
                        </div>
                        <div class="current">
                            <p><?=$item->purchase_number?></p>
                        </div>
                        <div class="current">
                            <p class="strong">\<?=number_format($item->current - ($item->current * $item->sale_per / 100))?></p>
                        </div>
                        <div class="delivery">
                            <p class="strong"><?=$item->delivery_cost == 0 ? "free" : number_format($item->delivery_cost)?></p>
                        </div>
                    </div>
                <?php endforeach;?>

                <!-- <div class="order_box">
                    <img src="img/slip-on4.jpg" alt="img">
                    <div class="p_box">
                        <p>title</p>
                        <p>size : 250mm / count : 1</p>
                        <p>color : white</p>
                    </div>
                    <div class="current">
                        <p class="strong">\50,000</p>
                    </div>
                    <div class="delivery">
                        <p class="strong">free</p>
                    </div>
                    <div class="delivery_current">
                        <p>입금완료</p>
                    </div>
                </div>
                <div class="order_box">
                    <img src="img/slip-on4.jpg" alt="img">
                    <div class="p_box">
                        <p>title</p>
                        <p>size : 250mm / count : 1</p>
                        <p>color : white</p>
                    </div>
                    <div class="current">
                        <p class="strong">\50,000</p>
                    </div>
                    <div class="delivery">
                        <p class="strong">free</p>
                    </div>
                    <div class="delivery_current">
                        <p>입금완료</p>
                    </div>
                </div>
                <div class="order_box">
                    <img src="img/slip-on4.jpg" alt="img">
                    <div class="p_box">
                        <p>title</p>
                        <p>size : 250mm / count : 1</p>
                        <p>color : white</p>
                    </div>
                    <div class="current">
                        <p class="strong">\50,000</p>
                    </div>
                    <div class="delivery">
                        <p class="strong">free</p>
                    </div>
                    <div class="delivery_current">
                        <p>입금완료</p>
                    </div>
                </div>
                <div class="order_box">
                    <img src="img/slip-on4.jpg" alt="img">
                    <div class="p_box">
                        <p>title</p>
                        <p>size : 250mm / count : 1</p>
                        <p>color : white</p>
                    </div>
                    <div class="current">
                        <p class="strong">\50,000</p>
                    </div>
                    <div class="delivery">
                        <p class="strong">free</p>
                    </div>
                    <div class="delivery_current">
                        <p>입금완료</p>
                    </div>
                </div>
                <div class="order_box">
                    <img src="img/slip-on4.jpg" alt="img">
                    <div class="p_box">
                        <p>title</p>
                        <p>size : 250mm / count : 1</p>
                        <p>color : white</p>
                    </div>
                    <div class="current">
                        <p class="strong">\50,000</p>
                    </div>
                    <div class="delivery">
                        <p class="strong">free</p>
                    </div>
                    <div class="delivery_current">
                        <p>입금완료</p>
                    </div>
                </div>
                <div class="order_box">
                    <img src="img/slip-on4.jpg" alt="img">
                    <div class="p_box">
                        <p>title</p>
                        <p>size : 250mm / count : 1</p>
                        <p>color : white</p>
                    </div>
                    <div class="current">
                        <p class="strong">\50,000</p>
                    </div>
                    <div class="delivery">
                        <p class="strong">free</p>
                    </div>
                    <div class="delivery_current">
                        <p>입금완료</p>
                    </div>
                </div> -->

            </div>
        </div>
        <div class="proflie_page">
            <p class="sub_title">Like List</p>
            <div class="order">
                <?php foreach($data['like'] as $item):?>
                <div class="order_box">
                        <img src="<?=$item->photo?>" alt="img">
                        <div class="p_box">
                            <a href="/view?id=<?=$item->idx?>"><?=$item->name?></a>
                        </div>
                        <div class="current">
                            <p class="strong">\<?=number_format($item->current)?></p>
                        </div>
                        <div class="current">
                            <p class="strong">\<?=number_format($item->current - ($item->current * ($item->sale_per / 100)))?></p>
                        </div>
                        <div class="cancel_box">
                            <a href="/like_delete?id=<?=$item->id?>"><i class="fas fa-heart-broken"></i></a>
                        </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>