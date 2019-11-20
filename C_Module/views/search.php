<div class="category_box">
    <div class="top">
        <p class="sub_title">Search</p>
            <div class="select">
                <select name="order" id="order">
                    <option value="popular">popular</option>
                    <option value="Newest">Newest</option>
                    <option value="Lowest price">Lowest price</option>
                    <option value="High price">High price</option>
                </select>
            </div>
        </div>
    <div class="sub_box">
        <?php foreach($data['result'] as $item) : ?>
            <div class="card_img card_img2">
                <div class="img_box">
                    <img src="<?=$item->photo?>" alt="img">
                </div>
                <div class="p_box">
                    <div class="sub_p_box">
                        <p class="small"><?=$item->sale_per?>% sale</p>
                        <p><?=$item->name?></p>
                        <p><span class="small">\<?=number_format($item->current)?></span> <span class="strong">\<?=number_format($item->current - ($item->current * ($item->sale_per/100)))?></span></p>
                        <p class="small">Sales : <?=$item->sales?></p>
                        <p class="small">Likes : <?=$item->likes?></p>
                        <div class="i_group">
                            <i class="far fa-heart"></i>
                        </div>
                    </div>
                    <div class="button">
                        <a href="/view?id=<?=$item->link?>" class="btn2">Read more</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>