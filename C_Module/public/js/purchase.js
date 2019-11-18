class purchase {
    constructor() {
        this.init();
        this.label.forEach(x => x.addEventListener("click", (e)=>this.click(x)));
        this.a.forEach(x=>x.addEventListener("click", (e)=>this.click(x)));
        this.label[0].click();
        this.a[0].click();
    }

    init() {
        this.form = document.querySelector(".cash_receipt");
        this.label = document.querySelectorAll(".cash");
        this.a = document.querySelectorAll(".b");
        this.call = document.querySelector("#call_number");
        this.company = document.querySelector("#company_number");
    }

    click(e) {
        let type = e.textContent;
        if(type=="none" || type=="publish"){
            this.block(type);
            this.label.forEach(a => a.classList.remove("active"));
        } else{
            this.change(type);
            this.a.forEach(a=>a.classList.remove("active"));
        }
        e.classList.add("active");
    }

    block(type){
        if (type == "none") {
            this.form.style.display = "none";
        } else {
            this.form.style.display = "block";
        }
    }

    change(type){
        if(type=="Personal"){
            this.call.style.display="block";
            this.company.style.display="none";
        } else{
            this.company.style.display="block";
            this.call.style.display="none";
        }
    }
}

window.addEventListener("load", function (e) {
    let p = new purchase();
})