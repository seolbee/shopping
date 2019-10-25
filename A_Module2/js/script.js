class App{
    constructor(){
        this.init();
        this.main();
    }

    init(){
        this.box = document.querySelector(".box");
    }

    async main(){
        this.box.innerHTML = "";
        for(let i = 0; i<15; i++){
            let div = document.createElement("div");
            div.classList.add("card");
            div.innerHTML = this.cardTemplate(15000, 100, "소녀나라");
            await this.box.appendChild(div);
        }
        this.sliding();
    }

    sliding(){
        let arr = document.querySelectorAll(".card");
        let idx = 0;
        this.t = setInterval((e)=>{
            let next = idx < 14 ? idx + 1 : 0;
            // arr[idx].classList.remove("animation");
            // arr[idx].classList.add("animation2");
            // arr[next].classList.remove("animation2");
            // arr[next].classList.add("animation");
            idx = next;
        }, 1000);
    }

    cardTemplate(won, count, owner){
        let template = `<img src="img/shoose1.jpg" alt="shoose">
            <div class="p_box">
                <p>${Number(won).toLocaleString()}</p>
                <p>${count}</p>
                <p>배송 확인</p>
                <p>${owner}</p>
            </div>
            <div class="button_box">
                <button class="btn">Add to cart</button>
                <button class="btn">Read more</button>
            </div>`
        return template;
    }
}

window.addEventListener("load", (e)=>{
    let app = new App();
})