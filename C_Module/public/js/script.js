class app{
    constructor(app){
        this.app = app;
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
        this.search.addEventListener("input", (e)=>this.search());
    }

    async loadData(){
        this.data = await this.app.data.getData("/data");
    }

    search(){
        
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

class script{
    constructor(){
        this.app = new app(this);
    }
}

window.addEventListener("load", (e)=>{
    let s= new script();
})