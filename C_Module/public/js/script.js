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
        this.search_form = document.querySelector("#search");
        this.click = false;
    }

    event(){
        window.addEventListener("scroll", this.move.bind(this));
        this.search.addEventListener("click", this.active.bind(this));
        this.search.addEventListener("keypress", (e)=> this.search_word(e));
    }

    async loadData(){
        this.data = await this.app.data.getData("/data");
    }

    search_word(e){
        if(e.code == "Enter"){
            if(this.search_form.value == "" ) return;
            let form = new FormData();
            form.append("word", this.search_form.value);
            fetch('/search_list', {
                method:"post",
                body : form
            }).then(e=>e.json()).then(data=>{
                if(data.ok == "false"){
                    alert(data.msg);
                } else{
                    location.href="/search";
                }
            })
        }
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
        this.data = new Data();
        this.app = new app(this);
    }
}

window.addEventListener("load", (e)=>{
    let s= new script();
})