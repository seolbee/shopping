<div class="brand">
            <div class="top">
                <p class="sub_title">Brand</p>
                <div class="select">
                    <select name="order" id="order">
                        <option value="popular">popular</option>
                        <option value="Newest">Newest</option>
                        <option value="Lowest price">Lowest price</option>
                        <option value="High price">High price</option>
                    </select>
                </div>
            </div>
            <div class="middle">
                <ul class="category">
                    <li data-idx="0" class="active">all</li>
                    <?php foreach($data['result'] as $item) : ?>
                        <li data-idx="<?=$item->id?>"><?=$item->name?></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="sub_box">
                <div class="card_img card_img2">
                    <div class="img_box">
                        <img src="img/shoose7.jpg" alt="img">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p class="small">20% sale</p>
                            <p>DROP-TYPE 프리미엄</p>
                            <p> <span class="small">\99,000</span> <span class="strong">\50,000</span></p>
                            <p class="small">Sales : 6000 / Like : 500</p>
                            <div class="i_group">
                                <i class="far fa-heart"></i>
                                <i class="fas fa-cart-plus"></i>
                            </div>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="card_img card_img2">
                    <div class="img_box">
                        <img src="img/shoose7.jpg" alt="img">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p class="small">20% sale</p>
                            <p>DROP-TYPE 프리미엄</p>
                            <p> <span class="small">\99,000</span> <span class="strong">\50,000</span></p>
                            <p class="small">Sales : 6000 / Like : 500</p>
                            <div class="i_group">
                                <i class="far fa-heart"></i>
                                <i class="fas fa-cart-plus"></i>
                            </div>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="card_img card_img2">
                    <div class="img_box">
                        <img src="img/shoose7.jpg" alt="img">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p class="small">20% sale</p>
                            <p>DROP-TYPE 프리미엄</p>
                            <p> <span class="small">\99,000</span> <span class="strong">\50,000</span></p>
                            <p class="small">Sales : 6000 / Like : 500</p>
                            <div class="i_group">
                                <i class="far fa-heart"></i>
                                <i class="fas fa-cart-plus"></i>
                            </div>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="card_img card_img2">
                    <div class="img_box">
                        <img src="img/shoose7.jpg" alt="img">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p class="small">20% sale</p>
                            <p>DROP-TYPE 프리미엄</p>
                            <p> <span class="small">\99,000</span> <span class="strong">\50,000</span></p>
                            <p class="small">Sales : 6000 / Like : 500</p>
                            <div class="i_group">
                                <i class="far fa-heart"></i>
                                <i class="fas fa-cart-plus"></i>
                            </div>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="card_img card_img2">
                    <div class="img_box">
                        <img src="img/shoose7.jpg" alt="img">
                    </div>
                    <div class="p_box">
                        <div class="sub_p_box">
                            <p class="small">20% sale</p>
                            <p>DROP-TYPE 프리미엄</p>
                            <p> <span class="small">\99,000</span> <span class="strong">\50,000</span></p>
                            <p class="small">Sales : 6000 / Like : 500</p>
                            <div class="i_group">
                                <i class="far fa-heart"></i>
                                <i class="fas fa-cart-plus"></i>
                            </div>
                        </div>
                        <div class="button">
                            <a href="" class="btn2">Read more</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <script src="js/data.js"></script>
        <script src="js/all.js"></script>
        <script>
            window.addEventListener("load", (e)=>{
	            let a = new App("brand");
            })
       </script>