
var products = [
  {
    id:1,
    name: 'Product 1',
    price: 19.99,
    image: 'images/image1.jpg',
     productDescription:" product description 1"
  },
  {
    id:2,
    name: 'Product 2',
    price: 134529.99,
    image: 'images/image2.jpg', 
    productDescription:" product description 2"
  },
  {
    id:3,
    name: 'Product 3',
    price: 39.99,
    image: 'images/image3.jpg',
     productDescription:" product description 3"
  },
  {
    id:4,
    name: 'Product 1',
    price: 19.99,
    image: 'images/image1.jpg', 
    productDescription:" product description 4"
  },
  {
    id:5,
    name: 'Product 2',
    price: 134529.99,
    image: 'images/image2.jpg', 
    productDescription:" product description 5"
  },
  {
    id:3,
    name: 'Product 3',
    price: 39.99,
    image: 'images/image3.jpg',
     productDescription:" product description 3"
  },
];
var slides=document.querySelectorAll(".slider");
var dotBtn=document.querySelectorAll(".dot");
var currIndex=0;


// var $slides = $('.slider');
// var $slide = $('.slide1');
// var count = 1;

// console.log($slides)


//     setInterval(function () {

//         $slides.animate({ 'margin-left': '-=68vw' }, 1200, function () {

//             count++;
//             if (count === 3) {
//                 $slides.css("margin-left", 0);
//                 count = 1;
//             }

//         });
//     }, 4000);

// manual sliding

var slideShow=function(index){
slides.forEach((item, i) => {
 item.classList.remove("Active");
});
dotBtn.forEach((item, i) => {
 item.classList.remove("ActiveBtn");
});

// var $slides=$(".slider");
// $slides.animate({ 'margin-left': '-=68vw' }, 1200, function () {

//   count++;
//   if (count === 4) {
//       $slides.css("margin-left", 0);
//       count = 1;
//   }

// });

// $slides.animate({ 'margin-left': "-=68vw" }, 1200, function () {

//   count++;
//   if (count === 4) {
//       $slides.css("margin-left",0);
//       count = 1;
//   }

// });
slides[index].classList.add("Active");
dotBtn[index].classList.add("ActiveBtn");
}

dotBtn.forEach((dot, i) => {
dot.addEventListener("click",()=>{
    slideShow(i);
    currIndex=i;
});
});



// for auto display

var repeat=function(){
let i=1;
var repeater=()=>{
  setTimeout(function(){
     slideShow(i);
     i++;
     if(slides.length==i){
       i=0;
     }
     if(i>=slides.length){
       return;
     }
     repeater();
  },3000) ;
}
repeater();
}
repeat();


// js for phone page
// Array of product data

// Function to generate product cards
function generateProductCards() {
  var container = document.getElementById('product-cards-container');
 
  
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
    nameElement.textContent = product.name;

    var priceElement = document.createElement('p');
    priceElement.textContent = '$' + product.price.toFixed(2);

    var imageElement = document.createElement('img');
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

function navigateToProductDetails(productId) {
   
  window.location.href = `productDetail.html?cardId=${productId-1}`;
   var proDetail=document.getElementById("productDetail");
      
}

function LoadDetail(){
  var proDetail=document.getElementById("productDetail");
  console.log(proDetail);
}


// Call the function to generate the product cards
// generateProductCards();