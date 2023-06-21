const homeDOM=document.getElementById("home-cards-container");

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
 
  
  displayHomes(products){
    let out = '';
    products.forEach(product => {
      out += `<div class="product-card" id="${product.id}" onclick="navigateToProductDetails(${product.id})">
      <div class="imgBox"> 
        <img src="../Backend/images/product/${product.product_image}" >
       </div>
      <div class="textBox">
      <h3>${product.product_name}</h3>
      <p>${product.price}</p>
       </div>
        
    </div>`;
    });
    homeDOM.innerHTML = out;
  }
 

}



let home=[];

document.addEventListener('DOMContentLoaded', () => {
  const product = new Product();
  const ui = new UI();
  
  product.getProducts().then(products =>{
    products.forEach(product=>{
        if(product.type == 'Home'){
     
          home.push(product);
         
      
    }});
    // console.log(mobile);
    console.log(home);
    // ui.displayPhones(mobile);
    ui.displayHomes(home);
    // ui.displayLaptops(laptop);
    });
});

function navigateToProductDetails(productId) {
  window.location.href = `C:/xampp/htdocs/fullstack/GroupProject/Detail.html?cardId=${productId}`;
   var proDetail=document.getElementById("productDetail");    
}

/*
//The function decalartion
const postData = async (url, formData) => {
    try {
      const res = await fetch(url, { method: "POST", body: formData });
      const data = await res.json();
      return data;
    } catch (error) {
      return { success: false, message: error };
    }}

 const getData = async (url) => {
        try {
          const res = await fetch(url, { method: "GET"});
          const data = await res.json();
          return data;
        } catch (error) {
          return { success: false, message: error };
        }}
  
  //The function call
  let mobile = [];
  let home = [];
  let Accessary = [];
  let jsonData;



    getData(
        "http://localhost/fullstack/Backend/admin/api.php"
      ).then((JsonData) => {
        let data = JsonData.data;

        // console.log(data);
        
        for (i = 0; i<data.length; i++){
          // console.log(data[i].type);
          
          console.log(data.length);
          if(data[i].type == 'Mobile'){
 
           home.push(data[i]);
           
 
          }else if(data[i].type == 'Home Aliases'){
 
           mobile.push(data[i]);
 
          }else if(data[i].type == 'Accsessary'){
 
            Accessary.push(data[i]);
 
          }
         }
         console.log(home);

         
         var products=mobile;
        
console.log(products)

         function generateProductCards() {
          var container = document.getElementById('product-cards-container');
         console.log("hiiiii")
          
          // Clear the container
          container.innerHTML = '';
        
          // Loop through the products array
          for (var i = 0; i < products.length; i++) {
            var product = products[i];
        
            // Create a card element
            var card = document.createElement('div');
            card.classList.add('product-card');
            card.setAttribute("id",product.id);
            card.addEventListener("click",function(event){
              var productId=event.currentTarget.getAttribute("id");
              navigateToProductDetails(productId );
            })
        
            var imgbox=document.createElement('div');
             imgbox.classList.add("imgBox");
        
             var textBox=document.createElement('div');
             textBox.classList.add("textBox");
          
            // Create elements for product name, price, and image
            var nameElement = document.createElement('h3');
            nameElement.textContent = product.product_name;
        
            var priceElement = document.createElement('p');
            priceElement.textContent = '$' + product.price.toFixed(2);
        
            var imageElement = document.createElement('img');
            var imgsrc=`../../images/product${product.product_image}`
            imageElement.src = product.image;
            imageElement.alt = product.name;
        
            // Append elements to the card
            imgbox.appendChild(imageElement);
            textBox.appendChild(nameElement);
            textBox.appendChild(priceElement);
            
            card.appendChild(imgbox);
            card.appendChild(textBox);
        
        
            
            container.appendChild(card);
          }
          
          



      }
    }).catch((err) =>{
      console.log("Error" + err)
    });
    generateProductCards();
      
      //console.log(home);
*/

