
const urlParams = new URLSearchParams(window.location.search);
   const productId = urlParams.get('cardId');
   var index=productId;

const proDOM=document.getElementById("productDetail");

class Product {
async getProducts() {
let response = await fetch('http://localhost/fullstack/Backend/admin/api.php');

if(response.ok) {
let data = await response.json();
let products = data.data;

products = products.map(item=> {
const id = item.id;
const product_name = item.product_name;
const product_image = item.product_image;
const price = item.price;
const description = item.description;
const type = item.type;
return {id,product_name, product_image, price, description, type};
})

return products;
} else {
console.log('error', response.status);
}
}
}

class UI {
displayDetail(product){
let out = '';
out += `<div id="proImage" class="proImage">
<img src="../Backend/images/product/${product.product_image}" >
     </div>
     <div>
       <div id="proDetailText" class="proText">
       <h1>${product.product_name}</h1>
       <pre>${product.description}</pre>
       </div>
       <button class="addToCartBtn" onclick="increment(id)">Add to Cart</button>
     </div>`;

proDOM.innerHTML = out;
}


}

let selectedpro;

document.addEventListener('DOMContentLoaded', () => {
const product = new Product();
const ui = new UI();

product.getProducts().then(products =>{
products.forEach(product=>{
if(product.id == index){

selectedpro=product;

}});

ui.displayDetail(selectedpro);
});
});


