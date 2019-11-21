window.addEventListener("load", function(e){
	let plus = document.querySelector(".plus");
	let minus = document.querySelector(".minus");
	let input = document.querySelector("#count");
	let purchase = document.querySelector(".purchase");
	let cart = document.querySelector(".cart_btn");
	let form = new FormData();
	let id = document.querySelector("#product_idx");
	let count = document.querySelector("#count");
	let size = document.querySelector("#size");
	plus.addEventListener("click", (e)=> input.value++);
	minus.addEventListener("click", (e)=> input.value = input.value > 1 ? input.value-1 : 1);
	cart.addEventListener("click", (e)=> {
		//query("/putcart", id, count, size, form);
	})
})

function query(link, id, count, size, form){
	console.log(id, count, size);
	form.append("id", id.value);
	form.append("count", count.value);
	form.append("size", size.options[size.selectedIndex].value);
	console.log(form);
	fetch(link, {
		method:"post",
		headers:{
			'Content-Type' : "application/json", 
			"Accept":"application/json"
		},
		body:form
	}).then(e=> e.json()).then(data=>{
		alert(data);
	})
}