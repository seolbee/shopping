
class All{
	constructor(app){
		this.app = app;
		this.init();
	}

	async init(){
		await this.loadData();
		this.category = document.querySelectorAll(".category > li");
		this.subBox = document.querySelector(".sub_box");
		this.select = document.querySelector("#order");
		this.setProduct(this.data.result);
		this.setCategory();
		this.setAttr();
	}

	setProduct(data){
		this.subBox.innerHTML = "";
		data.forEach(x=> this.getDiv(x));
	}

	setCategory(){
		this.category.forEach((x)=> x.addEventListener('click', (e)=> this.load(x)));
	}

	setAttr(){
		this.select.addEventListener('change', (e)=> this.change());
	}

	change(){
		let order = this.select.options[this.select.selectedIndex].value;
		if(order == "sales"){
			this.data.result.sort(function(a,b){
				return b.sales - a.sales;
			})
		} else if(order == "date"){
			this.data.result.sort(function(a,b){
				return Date.parse(b.Release_date) - Date.parse(a.Release_date);
			})
		} else if(order == "Lowest price"){
			this.data.result.sort(function(a,b){
				return (a.current - (a.current * a.sale_per / 100)) - (b.current - (b.current * b.sale_per / 100));
			})
		} else if(order == "High price"){
			this.data.result.sort(function(a,b){
				return (b.current - (b.current * b.sale_per / 100)) - (a.current - (a.current * a.sale_per / 100));
			})
		}

		this.setProduct(this.data.result);
	}

	load(x){
		this.category.forEach(a=> a.classList.remove("active"));
		x.classList.add("active");
		if(x.dataset.idx == 0){
			this.setProduct(this.data);
		} else{
			let data = null;
			if(this.app.kind == "category"){
				data = this.data.result.filter(a=> x.dataset.idx == a.category);
			} else if(this.app.kind == "brand"){
				data = this.data.result.filter(a=> x.dataset.idx == a.brand);
			} else if(this.app.kind == "sale"){
				data = this.data.result.filter(a=> x.dataset.idx == a.sale_category);
			}
			this.setProduct(data);
		}
	}

	getDiv(x){
		x.div = document.createElement("div");
		x.div.classList.add("card_img");
		x.div.classList.add("card_img2");
		x.div.innerHTML = this.card_template(x.idx, x.name, x.photo, x.current, x.sales, x.likes, x.sale_per);
		x.cart_clicked = false;
		if(this.data.user.length > 0){
			this.data.user.forEach(a=>{
				if(x.idx == a.product_idx){
					x.div.querySelector(".i_group > .fa-heart").classList.add("fas");
					x.heart_clicked= true;
				} else{
					x.div.querySelector(".i_group > .fa-heart").classList.add("far");
					x.heart_clicked= false;
				}
			})
		} else{
			x.div.querySelector(".i_group > .fa-heart").classList.add("far");
			x.heart_clicked = false;
		}
		this.event(x);
		this.subBox.appendChild(x.div);
	}

	async loadData(){
		if(this.app.kind == "search"){
			this.data = await this.app.data.getData("/search_product");
		} else{
			this.data = await this.app.data.getData("/data");
		}
	}

	event(x){
		x.div.querySelector(".i_group > .fa-heart").addEventListener("click", (e)=>this.likes(x, e));
	}

	async likes(x, e){
		let mg = await this.app.data.getFetch(`/like?id=${x.idx}&&like=${x.heart_clicked}`);
		if(!mg.like) return;
		if(!x.heart_clicked){
			e.target.classList.remove("far");
			e.target.classList.add("fas");
			alert("좋아요 한 상품에 추가 되었습니다.");
			x.div.querySelector(".like").innerHTML = `Likes : ${++x.likes}`;
		} else{
			e.target.classList.remove("fas");
			e.target.classList.add("far");
			alert("좋아요 한 상품이 취소되었습니다.");
			x.div.querySelector(".like").innerHTML = `Likes : ${--x.likes}`;
		}
		x.heart_clicked = !x.heart_clicked;
	}

	card_template(idx, title, src, current, sales, like, sale_per, user){
		let template = `<div class="img_box">
                        	<img src="${src}" alt="img">
                    	</div>
                    	<div class="p_box">
                        	<div class="sub_p_box">
                            	<p class="small">${sale_per}% sale</p>
                            	<p>${title}</p>
                            	<p><span class="small">\\${Number(current).toLocaleString()}</span> <span class="strong">\\${Number(current - ( current * (sale_per / 100))).toLocaleString()}</span></p>
                            	<p class="small">Sales : ${sales}</p>
                            	<p class="small like">Likes : ${like}</p>
								<div class="i_group">
                                	<i class="fa-heart"></i>
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
	constructor(kind){
		this.kind = kind;
		this.data = new Data();
		this.all = new All(this);
	}
}