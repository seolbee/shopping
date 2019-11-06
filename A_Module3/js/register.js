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
            oncomplete : function(data){
                let address = data.address;
                document.querySelector("#address").value = address;
            }
        }).open();
    }
}

window.addEventListener("load", (e)=>{
    let r = new register();
})