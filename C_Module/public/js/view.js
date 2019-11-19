window.addEventListener("load", function(e){
	let plus = document.querySelector(".plus");
	let minus = document.querySelector(".minus");
	let input = document.querySelector("#count");
	plus.addEventListener("click", (e)=> input.value++);
	minus.addEventListener("click", (e)=> input.value = input.value > 1 ? input.value-1 : 1);
})