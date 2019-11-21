class Data{
	async getData(link){
		this.data = await fetch(link,{headers:{'Content-Type' : "application/json", "Accept":"application/json"}}).then(a=>a.json());
		return this.data;
	}
	async getFetch(link){
		this.mg = await fetch(link,{headers:{'Content-Type' : "application/json", "Accept":"application/json"}}).then(e=>e.json());
		return this.mg;
	}
}