<div class="visual">
            <div class="title_box">
                <p class="title">
                    Welcome to <span>TrackPicke</span>
                </p>
                <p class="content">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, porro pariatur possimus dolor rerum,
                    culpa quae tenetur ipsa id neque similique velit cum recusandae aut aspernatur officiis qui
                    cupiditate dolores.
                </p>
                <!-- <a href="" class="btn2">Read more</a> -->
            </div>
            <div class="img_box">
                <div class="img">
                    <img src="img/shoose2.jpg" alt="dress">
                </div>
                <div class="img">
                    <img src="img/shoose3.jpg" alt="img">
                </div>
            </div>
            <!-- <div class="img2">
                <img src="img/shoose.jpg" alt="img">
            </div> -->
        </div>
        <div class="best div">
            <p class="title">Best Product</p>
            <ul class="category">
                <li class="active" data-idx="0">all</li>
                <?php foreach($data['category'] as $item) : ?>
                    <li data-idx="<?=$item->id?>"><?=$item->name?></li>
                <?php endforeach;?>
            </ul>
            <div class="best_box box">
            </div>
        </div>
        <div class="best_brand div">
            <p class="title">Brand Product</p>
            <ul class="category">
                <li class="active" data-idx="0">all</li>
                <?php foreach($data['brand'] as $item):?>
                    <li data-idx="<?=$item->id?>"><?=$item->name?></li>    
                <?php endforeach;?>
            </ul>
            <div class="brand_box box">
                <div class="card_img">
                    <div class="img_box">
                        <img src="img/shoose6.jpg" alt="">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p>Nike</p>
                            <p class="strong">\30000</p>
                            <p class="small">Sales : 6000 / Like : 500</p>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="card_img">
                    <div class="img_box">
                        <img src="img/shoose6.jpg" alt="">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p>Nike</p>
                            <p class="strong">\30000</p>
                            <p class="small">Sales : 6000 / Like : 500</p>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="card_img">
                    <div class="img_box">
                        <img src="img/shoose6.jpg" alt="">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p>Nike</p>
                            <p class="strong">\30000</p>
                            <p class="small">Sales : 6000 / Like : 500</p>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="card_img">
                    <div class="img_box">
                        <img src="img/shoose6.jpg" alt="">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p>Nike</p>
                            <p class="strong">\30000</p>
                            <p class="small">Sales : 6000 / Like : 500</p>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="new div">
            <p class="title">New Product</p>
            <ul class="category">
                <li class="active" data-idx="0">all</li>
                <?php foreach($data['category'] as $item) : ?>
                <li data-idx="<?=$item->id?>"><?=$item->name?></li>
                <?php endforeach;?>
            </ul>
            <div class="new_box box">
                <div class="card_img">
                    <div class="img_box">
                        <img src="img/shoose6.jpg" alt="">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p>Nike</p>
                            <p class="strong">\30000</p>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="card_img">
                    <div class="img_box">
                        <img src="img/shoose6.jpg" alt="">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p>Nike</p>
                            <p class="strong">\30000</p>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="card_img">
                    <div class="img_box">
                        <img src="img/shoose6.jpg" alt="">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p>Nike</p>
                            <p class="strong">\30000</p>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="card_img">
                    <div class="img_box">
                        <img src="img/shoose6.jpg" alt="">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p>Nike</p>
                            <p class="strong">\30000</p>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sale div">
            <p class="title">Sale Product</p>
            <ul class="category">
                <li class="active" data-idx="0">all</li>
                <?php foreach($data['sale'] as $item) : ?>
                    <li data-idx="<?=$item->id?>"><?=$item->persent?></li>
                <?php endforeach;?>
            </ul>
            <div class="sale_box box">
                <div class="card_img">
                    <div class="img_box">
                        <img src="img/shoose10.jpg" alt="">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p class="small">20% Sale</p>

                            <p>Nike</p>
                            <p><span class="small">\50,000</span> <span class="strong">\30,000</span></p>
                            <p class="small">Sales : 6000 / Like : 500</p>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="card_img">
                    <div class="img_box">
                        <img src="img/shoose10.jpg" alt="">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p class="small">20% Sale</p>
                            <p>Nike</p>
                            <p><span class="small">\50,000</span> <span class="strong">\30,000</span></p>
                            <p class="small">Sales : 6000 / Like : 500</p>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="card_img">
                    <div class="img_box">
                        <img src="img/shoose10.jpg" alt="">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p class="small">20% Sale</p>
                            <p>Nike</p>
                            <p><span class="small">\50,000</span> <span class="strong">\30,000</span></p>
                            <p class="small">Sales : 6000 / Like : 500</p>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="card_img">
                    <div class="img_box">
                        <img src="img/shoose10.jpg" alt="">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p class="small">20% Sale</p>
                            <p>Nike</p>
                            <p><span class="small">\50,000</span> <span class="strong">\30,000</span></p>
                            <p class="small">Sales : 6000 / Like : 500</p>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/main.js"></script>