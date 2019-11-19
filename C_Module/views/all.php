<div class="category_box">
            <div class="top">
                <p class="sub_title">CATEGORY</p>
                <div class="select">
                    <select name="order" id="order">
                        <option value="popluar">popluar</option>
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
                        <li data-idx = "<?=$item->id?>"><?=$item->name?></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="sub_box">
            </div>
        </div>
        <script src="js/Data.js"></script>
        <script src="js/all.js"></script>