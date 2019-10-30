class app{
    constructor(){
        this.init();
        this.move();
    }

    init(){
        this.header = document.querySelector("header");
    }

    move(){
        window.addEventListener("scroll", (e)=>{
            if(scrollY > 0){
                this.header.classList.add("header");
            } else{
                this.header.classList.remove("header");
            }
        })
    }
}

window.addEventListener("load", (e)=>{
    let App = new app();
})