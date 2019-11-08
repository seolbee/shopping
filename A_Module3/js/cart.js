class Data{
    constructor(){
        this.data = [
            {
                name : "신발",
                color: "white",
                size : 250,
                current : 50000
            },
            {
                name : "신발",
                color: "white",
                size : 250,
                current : 50000
            },
            {
                name : "신발",
                color: "white",
                size : 250,
                current : 50000
            },
            {
                name : "신발",
                color: "white",
                size : 250,
                current : 50000
            },
            {
                name : "신발",
                color: "white",
                size : 250,
                current : 50000
            }
        ]
    }
}

class Cart{
    constructor(app){
        this.app = app;
        this.init();

        this.data.forEach(x=>this.div(x));
    }

    init(){
        this.box = document.querySelector(".cart_list");
        this.data = this.app.data.data;
        this.clicked = false;
    }

    div(x){
        let div = document.createElement("div");
        div.classList.add("cart_card");
        div.innerHTML = this.cart_template(x.name, x.size, x.color, x.current);
        x.div = div;
        this.event(x);
        this.box.appendChild(x.div);
    }

    cart_template(name, size, color, current){
        let template = `<div class="check">
                            <label for="check"></label>
                            <input type="checkbox" name="check" id="check">
                        </div>
                        <img src="img/shoose15.JPG" alt="img">
                        <div class="info">
                            <p>${name}</p>
                            <p class="small">size : ${size}mm / color : ${color}</p>
                            <p class="strong">${Number(current).toLocaleString()}</p>
                        </div>
                        <div class="count_box">
                            <div class="count">
                                <div class="minus">-</div>
                                <div class="input_count">
                                    <input type="number" name="count" id="count" min="1" value="1">
                                </div>
                                <div class="plus">+</div>
                            </div>
                        </div>
                        <div class="current">
                            <p class="strong">${Number(current).toLocaleString()}</p>
                        </div>`
        return template;
    }

    event(x){
        x.div.querySelector(".plus").addEventListener("click", (e)=>this.cal(x, "+"));
        x.div.querySelector(".minus").addEventListener("click", (e)=>this.cal(x, "-"));
        x.div.addEventListener("click", (e)=>this.click(x.div));
    }

    click(item){
        this.cliked = true;
        this.data.forEach(x=>x.div.classList.remove("active"));
        item.classList.add("active");
    }

    cal(x, swit){
        if(swit == "+"){
            x.div.querySelector("#count").value++;
        } else{
            x.div.querySelector("#count").value = x.div.querySelector("#count").value > 1 ? x.div.querySelector("#count").value - 1 : 1;
        }
        x.div.querySelector(".current > .strong").innerHTML = `${Number(x.current * x.div.querySelector("#count").value).toLocaleString()}`;
    }
}

class App{
    constructor(){
        this.data = new Data();
        this.cart = new Cart(this);
    }
}

window.addEventListener("load", (e)=>{
    let app = new App();
})