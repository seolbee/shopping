window.addEventListener("load", function(e){
	let plus = document.querySelector(".plus");
	let minus = document.querySelector(".minus");
	let input = document.querySelector("#count");
	let btn = document.querySelector(".purchase");
	plus.addEventListener("click", (e)=> input.value++);
	minus.addEventListener("click", (e)=> input.value = input.value > 1 ? input.value-1 : 1);
})

function query(link, param){
	let 
	fetch(link, {
		method:"post",
		headers:{
			'Content-Type' : "application/json", 
			"Accept":"application/json"
		}
		body:param
	}).then(e=> e.json()).then(data=>{
		if(data.kind =="cart"){
			
		}
	})
}