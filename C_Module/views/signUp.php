<div class="login">
            <div class="login_box">
                    <p class="sub_title">Sign up</p>
                <form action="/register" method="post">
                    <div class="input">
                        <input type="text" name="id" id="id" placeholder="enter id">
                    </div>
                    <div class="input">
                        <input type="password" name="pw" id="pw" placeholder="enter pw">
                    </div>
                    <div class="input">
                        <input type="text" name="nicname" id="nicname" placeholder="enter nicname">
                    </div>
                    <div class="input address">
                        <input type="text" name="address" id="address" placeholder="find Address">
                        <input type="text" name="Detailed_address" id="Detailed_address" placeholder="Detailed Address">
                    </div>
                    <div class="input">
                        <input type="text" name="call" id="call" placeholder="enter phone-number">
                    </div>
                    <div class="input">
                        <input type="email" name="email" id="email" placeholder="enter email">
                    </div>
                    <button class="btn2">Sign up</button>
                </form>
                <p class="small">If you haven't registered yet, go to <a href="/signIn" class="a">Sign in</a></p>
            </div>
        </div>
        <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
        <script src="js/register.js"></script>