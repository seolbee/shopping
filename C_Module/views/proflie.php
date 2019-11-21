<div class="proflie_page">
            <p class="sub_title">Purchase List</p>
            <div class="order">
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
                            <p><?=$item->name?></p>
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