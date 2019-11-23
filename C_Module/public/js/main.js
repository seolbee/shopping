class main{
    constructor(app){
        this.app = app;
        this.init();

    }

    async init(){
        await this.loadData();
        this.best_box = document.querySelector(".best");
        this.brand_box = document.querySelector(".best_brand");
        this.sale_box = document.querySelector(".sale");
        this.new_box = document.querySelector(".new");
        await this.best();
        this.brand();
        await this.new_query();
        await this.sale();
    }

    async best(){
        await this.data.result.sort(function(a, b){
            return b.sales - a.sales;
        })
        this.getDiv(this.data.result.slice(0,4), this.best_box);
        this.category(this.best_box, "category");
    }

    brand(){
        this.getDiv(this.data.result.slice(0,4), this.brand_box);
        this.category(this.brand_box, "brand");
    }

    async new_query(){
        await this.data.result.sort(function(a,b){
            return Date.parse(b.Release_date) - Date.parse(a.Release_date);
        })
        this.getDiv(this.data.result.slice(0,4), this.new_box);
        this.category(this.new_box, "category");
    }

    async sale(){
        await this.data.result.sort(function(a,b){
            return a.current-(a.current * a.sale_per / 100) - b.current-(b.current * b.sale_per / 100);
        })

        this.getDiv(this.data.result.slice(0,4), this.sale_box);
        this.category(this.sale_box, "sale");
    }

    category(box,kind){
        box.querySelectorAll(".category > li").forEach(x=> x.addEventListener("click", (e)=>{
            box.querySelectorAll(".category > li").forEach(a=>a.classList.remove("active"));
            e.target.classList.add("active");
            this.click(e.target.dataset.idx, kind, box);
        }))
    }

    click(idx, kind, box){

        let data = null;
        if(idx == 0){
            data = this.data.result;
        } else{
            if(kind == "category"){
                data = this.data.result.filter(x=> x.category == idx);
            } else if(kind == "brand"){
                data = this.data.result.filter(x=> x.brand==idx);
            } else if(kind == "sale"){
                data = this.data.result.filter(x=>x.sale_category == idx);
            }
        }
        this.getDiv(data.slice(0,4), box);
    }

    getDiv(data, box){
        box.querySelector(".box").innerHTML = "";
        data.forEach(x=>this.setDiv(x, box.querySelector(".box")));
    }

    setDiv(x, box){
        let div = document.createElement("div");
        div.classList.add("card_img");
        div.innerHTML = this.getTemplate(x.idx, x.photo, x.name, x.sales, x.likes, x.current, x.sale_per);
        x.div = div;
        box.appendChild(div);
    }

    getTemplate(idx, img, name, sales, like, current, sale_per){
        let template = `<div class="img_box">
                            <img src="${img}" alt="img">
                        </div>
                        <div class="p_box">
                            <div class="sub_p_box">
                                <p>${name}</p>
                                <p><span class="small">\\${Number(current).toLocaleString()}</span> <span class="strong">\\${Number(current - (current * sale_per / 100)).toLocaleString()}</span></p>
                                <p class="small">Sales : ${sales}</p>
                                <p class="small">Likes : ${like}</p>
                                </div>
                            <div class="button">
                                <a href="/view?id=${idx}" class="btn2">Read more</a>
                            </div>
                        </div>`
            return template;
    }

    async loadData(){
        this.data = await this.app.data.getData("/data");
    }
}

class a{
    constructor(){
        this.data = new Data();
        this.m = new main(this);
    }
}

window.addEventListener("load", (e)=>{
    let app = new a();
})