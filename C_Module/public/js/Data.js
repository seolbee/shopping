class Data{
	async getData(link){
		if(this.data == null){
			this.data = await fetch(link,{headers:{'Content-Type' : "application/json", "Accept":"application/json"}}).then(a=>a.json());
		}
		return this.data;
	}
	async getFetch(link){
		if(this.mg==null){
			this.mg = await fetch(link,{headers:{'Content-Type' : "application/json", "Accept":"application/json"}}).then(e=> e.json());
		}
		return this.mg;
	}
}