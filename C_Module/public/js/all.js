
class All{
	constructor(app){
		this.app = app;
		this.init();
	}

	async init(){
		await this.loadData();
		this.category = document.querySelectorAll(".category > li");
		this.subBox = document.querySelector(".sub_box");
		this.select = document.querySelector("#select");
		this.setProduct(this.data);
		this.setCategory();
	}

	setProduct(data){
		this.subBox.innerHTML = "";
		data.forEach(x=> this.getDiv(x));
		console.log(data);
	}

	setCategory(){
		this.category.forEach((x)=> x.addEventListener('click', (e)=> this.load(x)));
	}

	load(x){
		this.category.forEach(a=> a.classList.remove("active"));
		x.classList.add("active");
		console.log(x.dataset.idx);
		if(x.dataset.idx == 0){
			this.setProduct(this.data);
		} else{
			let data = this.data.filter(a=> x.dataset.idx == a.category);
			this.setProduct(data);
		}
	}

	getDiv(x){
		x.div = document.createElement("div");
		x.div.classList.add("card_img");
		x.div.classList.add("card_img2");
		x.div.innerHTML = this.card_template(x.idx, x.name, x.photo, x.current, x.sales, x.likes, x.link);
		x.heart_clicked= false;
		x.cart_clicked = false;
		this.event(x);
		this.subBox.appendChild(x.div);
	}

	async loadData(like){
		if(like == null){
			this.data = await this.app.data.getData("/data");
		} else{
			this.data = await this.app.data.getData("/data?id="+like);
		}
	}

	event(x){
		x.div.querySelector(".i_group > .fa-heart").addEventListener("click", (e)=>this.likes(x, e));
	}

	async likes(x, e){
		if(!x.heart_clicked){
			e.target.classList.remove("far");
			e.target.classList.add("fas");
		} else{
			e.target.classList.remove("fas");
			e.target.classList.add("far");
		}
		x.heart_clicked = !x.heart_clicked;
		let mg = await this.app.data.getFetch(`/like?id=${x.idx}&&like=${x.heart_clicked}`);
		alert(mg);
	}

	card_template(idx, title, src, current, sales, like){
		let template = `<div class="img_box">
                        	<img src="${src}" alt="img">
                    	</div>
                    	<div class="p_box">
                        	<div class="sub_p_box">
                            	<p class="small">50% sale</p>
                            	<p>${title}</p>
                            	<p><span class="small">\\${Number(current).toLocaleString()}</span> <span class="strong">\\${Number(current).toLocaleString()}</span></p>
                            	<p class="small">Sales : ${sales}</p>
                            	<p class="small">Likes : ${like}</p>
                            	<div class="i_group">
                                	<i class="far fa-heart"></i>
                                	<i class="fas fa-cart-plus"></i>
                            	</div>
                        	</div>
                        	<div class="button">
                            	<a href="/view?id=${idx}" class="btn2">Read more</a>
                        	</div>
                    	</div>`
                    	return template;
	}
}

class App{
	constructor(){
		this.data = new Data();
		this.all = new All(this);
	}
}

window.addEventListener("load", (e)=>{
	let a = new App();
})