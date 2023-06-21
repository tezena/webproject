
const laptopsDOM=document.getElementById('laptops-cards-container');

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
    
    displayLaptops(products){
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
      laptopsDOM.innerHTML = out;
    }}
let laptop = [];
document.addEventListener('DOMContentLoaded', () => {
    const product = new Product();
    const ui = new UI();
    
    product.getProducts().then(products =>{
      products.forEach(product=>{
        if(product.type == 'Laptop'){
     
          laptop.push(product);
         
      }});
      console.log(laptop);
      // ui.displayPhones(mobile);
      ui.displayLaptops(laptop);
      // ui.displayLaptops(laptop);
      });
  });

  function navigateToProductDetails(productId) {
    window.location.href = `C:/xampp/htdocs/fullstack/GroupProject/Detail.html?cardId=${productId}`;
     var proDetail=document.getElementById("productDetail");    
  }