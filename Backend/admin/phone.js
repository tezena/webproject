
const productDOM = document.getElementById('product-cards-container');

class Product {
    async getProducts() {
      let response = await fetch('http://localhost/fullstack/Backend/admin/api.php');
  
      if(response.ok) {
        let data = await response.json();
        //console.log(data);
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
    
    displayPhones(products){
      let out = '';
      products.forEach(product => {
        out += `<div class="product-card" onclick="navigateToProductDetails(${product.id})">
        <div class="imgBox"> 
          <img src="../Backend/images/product/${product.product_image}" >
         </div>
        <div class="textBox">
        <h3>${product.product_name}</h3>
        <p>${product.price}</p>
         </div>
          
      </div>`;
      });
      productDOM.innerHTML = out;
    }}
let mobile = [];
document.addEventListener('DOMContentLoaded', () => {
    const product = new Product();
    const ui = new UI();
    
    product.getProducts().then(products =>{
      products.forEach(product=>{
        if(product.type == 'Mobile'){
     
          mobile.push(product);
         
      }});
      // console.log(mobile);
      // ui.displayPhones(mobile);
      ui.displayPhones(mobile);
      // ui.displayLaptops(laptop);
      });
  });

  function navigateToProductDetails(productId) {
    window.location.href = `C:/xampp/htdocs/fullstack/GroupProject/Detail.html?cardId=${productId}`;
     var proDetail=document.getElementById("productDetail");    
  }