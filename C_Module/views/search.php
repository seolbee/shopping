<div class="category_box">
    <div class="top">
        <p class="sub_title">Search</p>
            <div class="select">
                <select name="order" id="order">
                    <option value="sales">popular</option>
                    <option value="date">Newest</option>
                    <option value="Lowest price">Lowest price</option>
                    <option value="High price">High price</option>
                </select>
            </div>
        </div>
    <div class="sub_box">
    </div>
</div>
<script src="js/all.js"></script>
<script>
    window.addEventListener("load", (e)=>{
        this.a = new App("search");
    })
</script>