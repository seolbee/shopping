<div class="login">
            <div class="login_box">
                    <p class="sub_title">Update</p>
                <form action="/update" method="post">
                    <div class="input">
                        <input type="text" name="id" id="id" placeholder="enter id" value="<?=$_SESSION['user']->id?>">
                    </div>
                    <div class="input">
                        <input type="password" name="pw" id="pw" placeholder="enter pw">
                    </div>
                    <div class="input">
                        <input type="text" name="nicname" id="nicname" placeholder="enter nicname" value="<?=$_SESSION['user']->nicname?>">
                    </div>
                    <div class="input address">
                        <input type="text" name="address" id="address" placeholder="find Address" value="<?=$_SESSION['user']->address?>">
                        <input type="text" name="detailed_address" id="Detailed_address" placeholder="Detailed Address" value="<?=$_SESSION['user']->detailed_address?>">
                    </div>
                    <div class="input">
                        <input type="text" name="phone_number" id="call" placeholder="enter phone-number" value="<?=$_SESSION['user']->phone_number?>">
                    </div>
                    <div class="input">
                        <input type="email" name="email" id="email" placeholder="enter email" value="<?=$_SESSION['user']->email?>">
                    </div>
                    <button class="btn2">update</button>
                </form>
            </div>
        </div>
        <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
        <script src="js/register.js"></script>