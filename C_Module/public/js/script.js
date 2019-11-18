class app{
    constructor(){
        this.init();
        this.move();
        this.event();
    }

    init(){
        this.header = document.querySelector("header");
        this.search = document.querySelector(".search");
        this.click = false;
    }

    event(){
        window.addEventListener("scroll", this.move.bind(this));
        this.search.addEventListener("click", this.active.bind(this));
    }

    move(){
        if(scrollY > 0){
            this.header.classList.add("header");
        } else{
            this.header.classList.remove("header");
        }
    }

    active(){
        if(!this.click){
            this.search.classList.add("active");
        } else{
            this.search.classList.remove("active");
        }
        this.click = !this.click;
    }
}

window.addEventListener("load", (e)=>{
    let App = new app();
})