class Cart{
    constructor(app){
        this.app = app;
        this.init();
    }

    async init(){
        await this.loadData();
        this.box = document.querySelector(".cart_list");
        this.data = this.app.data.data;
        this.p_current = document.querySelector(".current");
        this.p_total = document.querySelector(".cost > .strong");
        this.p_delivery = document.querySelector(".delivery");
        this.current = 0;
        this.delivery = 0;
        this.total = 0;
        this.select_btn = document.querySelector(".select");
        this.purchase = document.querySelector(".purchase_btn");
        this.All = false;
        this.data.forEach(x=>this.div(x));
        this.allEvent();
        this.select = [];
    }

    async loadData(){
        this.data = await this.app.data.getData("/cart_list");
    }

    div(x){
        let div = document.createElement("div");
        div.classList.add("cart_card");
        div.innerHTML = this.cart_template(x.photo, x.name, x.size, x.current, x.count, x.sale_per);
        x.div = div;
        x.clicked = false;
        x.count = 1;
        x.current = x.current - (x.current * x.sale_per / 100);
        x.total = x.current * x.count;
        this.box.appendChild(x.div);
        this.event(x);
    }

    allEvent(){
        this.select_btn.addEventListener("click", this.allSelect.bind(this));
        this.purchase.addEventListener("click", this.post.bind(this));
    }

    cart_template(img, name, size, current, count, sale_per){
        let template = `<div class="check">
                            <label for="check" class="check_box"><i class="fas fa-check"></i></label>
                            <input type="checkbox" name="check" id="check">
                        </div>
                        <img src="${img}" alt="img">
                        <div class="info">
                            <p>${name}</p>
                            <p class="small">size : ${size}mm</p>
                            <p><span class="small">\\${Number(current).toLocaleString()}</span> <span class="strong">\\${Number(current-(current * sale_per / 100)).toLocaleString()}</span></p>
                        </div>
                        <div class="count_box">
                            <div class="count">
                                <div class="minus">-</div>
                                <div class="input_count">
                                    <input type="number" name="count" id="count" min="1" value="${count}">
                                </div>
                                <div class="plus">+</div>
                            </div>
                        </div>
                        <div class="current">
                            <p class="strong">\\${Number(current-(current * sale_per/100)).toLocaleString()}</p>
                        </div>`
        return template;
    }

    event(x){
        x.div.querySelector(".plus").addEventListener("click", (e)=>this.cal(x, "+"));
        x.div.querySelector(".minus").addEventListener("click", (e)=>this.cal(x, "-"));
        x.div.querySelector(".check_box").addEventListener("click", (e)=>this.click(x));
    }

    allSelect(){
        if(!this.All){
            this.current = 0;
            this.select_btn.classList.add("active");
            this.data.forEach(x=>x.clicked = false);
            this.data.forEach(x=>this.click(x));
        } else{
            this.select_btn.classList.remove("active");
            this.data.forEach(x=>x.clicked = true);
            this.data.forEach(x=>this.click(x));
        }
        this.All = !this.All;
    }

    click(item){
        if(!item.clicked){
            item.div.classList.add("active");
            this.current += item.total * 1;
            item.div.querySelector("input").checked = true;
            item.div.querySelector(".check > label > i").style.display="block";
            this.select.push(item);
        } else{
            item.div.classList.remove("active");
            this.current -= item.total * 1;
            item.div.querySelector("input").checked = false;
            item.div.querySelector(".check > label > i").style.display="none";
            this.select.splice(item.idx, 1);
        }
        item.clicked = !item.clicked;
        this.receipt();
    }

    receipt(){
        if(this.current > 0 && this.current < 50000){
            this.delivery = 2000;
        } else{
            this.delivery = 0;
        }
        this.total = this.current + this.delivery;
        this.p_delivery.innerHTML = `\\${Number(this.delivery).toLocaleString()}`;
        this.p_current.innerHTML = `\\${Number(this.current).toLocaleString()}`;
        this.p_total.innerHTML = `\\${Number(this.total).toLocaleString()}`;
    }

    post(){
        let d = new Date();
        let purchase_number = d.getMinutes().toString() + d.getSeconds().toString() + `${this.select[0].id}` + (d.getMonth() + 1).toString() + d.getDay().toString(); 
        this.select.forEach(x=>{
            let formdata = new FormData();
            formdata.append("id", x.id);
            formdata.append("count", x.count);
            formdata.append("kind", "purchase");
            formdata.append("size", x.size);
            formdata.append("purchase_number", purchase_number);
            fetch("/putcart", {
                method:"post",
                body:formdata
            }).then(e=>location.href="/purchase");
        })
    }

    cal(x, swit){
        if(swit == "+"){
            x.div.querySelector("#count").value++;
            if(x.clicked) this.current += x.current * 1;
        } else{
            if(x.div.querySelector("#count").value <=1) return;
            x.div.querySelector("#count").value --;
            if(x.clicked) this.current -= x.current * 1;
        }
        x.total = x.current * x.div.querySelector("#count").value;
        if(x.clicked){
            this.receipt();
        }
        x.div.querySelector(".current > .strong").innerHTML = `\\${Number(x.total).toLocaleString()}`;
    }
}

class a{
    constructor(){
        this.data = new Data();
        this.cart = new Cart(this);
    }
}

window.addEventListener("load", (e)=>{
    let app = new a();
})