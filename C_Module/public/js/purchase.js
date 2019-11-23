class purchase {
    constructor() {
        this.init();
        this.label.forEach(x => x.addEventListener("click", (e)=>this.click(x)));
        this.a.forEach(x=>x.addEventListener("click", (e)=>this.click(x)));
        this.label[0].click();
        this.a[0].click();
        this.event();
    }

    init() {
        this.form = document.querySelector(".cash_receipt");
        this.label = document.querySelectorAll(".cash");
        this.a = document.querySelectorAll(".b");
        this.call = document.querySelector("#call_number");
        this.company = document.querySelector("#company_number");
        this.email = document.querySelector("#email");
        this.purchase_btn = document.querySelector(".purchase_btn");
        this.bank = document.querySelector("#bank");
    }

    event(){
        this.purchase_btn.addEventListener("click", (e)=>this.post());
    }

    post(){
        let form = new FormData();
        if(this.form.style.display!="none"){
            if((this.call.value == "" && this.company.value == "") || this.email.value == "") {
                alert("빈 입력란이 있습니다. 확인해 주세요");
                return;
            }
            form.append("company_number", this.company.value);
            form.append("phone_number", this.call.value);
            form.append("email", this.email.value);
        }
        form.append("email", "");
        form.append("bank", this.bank.options[this.bank.selectedIndex].value);
        fetch("/receipt", {
            method:"post",
            body: form
        }).then(e=> e.json()).then(data=>{
            alert(data.msg);
            location.href="/purchasego";
        });
        
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