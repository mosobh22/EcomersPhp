const inputField = document.getElementById('search-field');
const productCardContainer = document.getElementById('products-card-container');

inputField.addEventListener('keyup',()=>{
    req = new XMLHttpRequest();
    req.open('GET',`http://localhost/products/partail/print.php?s=${inputField.value}`);
    
    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(JSON.parse(this.responseText));
            if(JSON.parse(this.responseText) != 'Not Founded'){
                showData(JSON.parse(this.responseText));
            }else{
                NotFounded();
            }
            
        }
    };
    req.send();

})
function showData(data){
    productCardContainer.innerHTML = '';
    for(let i = 0; i < data.length; ++i){
        productCardContainer.innerHTML += productCard(data[i].name,data[i].price,data[i].imgurl);
    }
    
}
function NotFounded(){
    productCardContainer.innerHTML = "<p>Not Founded</p>"
}


function productCard(productName,prodcutPrice,imgurl){
    return `<div class="product-card">
                <div class="product-img" >
                    <img src="./uploadedImages/${imgurl}" alt="" style="height:180px; object-fit:cover">
                </div>
                <div class="product-content">
                    <h2>${productName}</h2>
                    <p class="meta-description">
                        ${prodcutPrice}
                    </p>
                </div>
                <div class="product-action">
                    <button>buy</button>
                    <button>read more</button>
                </div>
            </div>
`
}