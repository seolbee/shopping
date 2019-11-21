<div class="purchase">
            <div class="purchase_box">
                <p class="sub_title small_title">Customer Information</p>
                <div class="customer_info">
                    <div class="input">
                        <label for="name">name</label>
                        <input type="text" name="name" value="name">
                    </div>
                    <div class="input">
                        <label for="cal">call</label>
                        <input type="text" name="cal" value="cal">
                    </div>
                    <div class="input">
                        <label for="email">email</label>
                        <input type="email" name="email" value="email">
                    </div>
                </div>
                <p class="sub_title small_title">Delivery Infomation</p>
                <div class="customer_info">
                    <div class="input">
                        <label for="address">address</label>
                        <input type="text" name="address" id="address" value="address">
                    </div>
                    <div class="input">
                        <label for="Detailed_address">detailed address</label>
                        <input type="text" name="detailed_address" id="Detailed_address" value="detailed_address">
                    </div>
                    <div class="input">
                        <label for="Recipient">Recipient</label>
                        <input type="text" name="name" value="name">
                    </div>
                </div>
                <p class="sub_title small_title">method of payment</p>
                <div class="customer_info">
                    <div>
                        <label for="bank">bank</label>
                        <select name="bank" id="bank">
                            <option value="농협">농협</option>
                            <option value="KB국민은행">KB국민은행</option>
                            <option value="우리은행">우리은행</option>
                            <option value="기업은행">기업은행</option>
                            <option value="KEB하나은행">KEB하나은행</option>
                            <option value="기업은행">기업은행</option>
                        </select>
                        <span>* 입금기한 0000년 00월 00일 12시까지</span>
                    </div>
                    <div class="money_receipt">
                        <div class="receipt_label margin_box">
                            <span>Cash receipts</span>
                            <input type="radio" name="abc" id="none" checked>
                            <input type="radio" name="abc" id="publish">
                            <label for="none" class="btn cash">none</label>
                            <label for="publish" class="btn cash">publish</label>
                            <div class="cash_receipt margin_box">
                                <span>Issue Purpose</span>
                                <label for="Personal" class="btn b">Personal</label>
                                <input type="radio" name="abc" id="Personal" checked>
                                <label for="For_proof" class="btn b">For proof</label>
                                <input type="radio" name="abc" id="For_proof">
                                <div class="input phone_number">
                                    <input type="text" name="call" id="call_number" placeholder="Enter phone number">
                                    <input type="text" name="company_number" id="company_number" placeholder="Enter commpany number">
                                </div>
                                <div class="input">
                                    <input type="email" name="email" id="email" placeholder="Enter email">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="purchase_list">
                <div class="purchase_receipt">
                    <p class="sub_title">List</p>
                    <div class="product_list">
                        <!-- <div class="product_box">
                            <img src="img/slip-on.jpg" alt="img">
                            <div class="p_box">
                                <p>신발</p>
                                <p class="small">size : 250mm</p>
                                <p class="small">1켤레</p>
                            </div>
                            <div class="current">
                                <p>\25,000</p>
                            </div>
                            <div class="delivery">
                                <p>\2,000</p>
                            </div>
                        </div> -->
                        <?php foreach($data['result'] as $item) : ?>
                            <div class="product_box">
                                <img src="img/slip-on.jpg" alt="img">
                                <div class="p_box">
                                    <p><?=$item->name?></p>
                                    <p class="small">size : <?=$item->size?>mm</p>
                                    <p class="small"><?=$item->count?>켤레</p>
                                </div>
                                <div class="current">
                                    <p>\<?=number_format($item->)?></p>
                                </div>
                                <div class="delivery">
                                    <p>\2,000</p>
                                </div>
                            </div> 
                        <?php endforeach;?>
                    </div>
                    <p class="sub_title">Summary</p>
                    <div class="sum">
                        <div class="sum_p">
                            <p>Value of Products : </p>
                            <p class="current">\ 0</p>
                        </div>
                        <div class="sum_p">
                            <p>Delivery Cost : </p>
                            <p class="delivery">\ 0</p>
                        </div>
                    </div>
                    <div class="cost">
                        <p>Total:</p>
                        <p class="strong">\ 0</p>
                    </div>
                    <div class="btn_group">
                        <a href="" class="btn2">Purchase</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/purchase.js"></script>