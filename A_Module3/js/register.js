class register{
    constructor(){
        this.init();
        this.event();
    }

    init(){
        this.input = document.querySelector("#address");
    }

    event(){
        this.input.addEventListener("click", this.openPopup.bind(this));
    }
    
    openPopup(){
        new daum.Postcode({
            onComplete:function(data){

            }
        })
    }
}

window.addEventListener("load", (e)=>{
    let r = new register();
})