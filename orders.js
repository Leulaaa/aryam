let iconCart = document.querySelector('.icon-cart');
let closeCart = document.querySelector('.close');
let body = document.querySelector('body');
let listProductHTML = document.querySelector('.listproduct');
let listCartHTML = document.querySelector('.listCart');
let iconCartSpan = document.querySelector('.icon-cart span');

let listProduct = [];
let carts = [];

// Load cart from localStorage if available
const loadCartFromLocalStorage = () => {
    const storedCart = localStorage.getItem('carts');
    if (storedCart) {
        carts = JSON.parse(storedCart); // Parse and restore the cart array
        addCartToHTML(); // Render the cart after loading it
    }
};

// Save cart to localStorage
const saveCartToLocalStorage = () => {
    localStorage.setItem('carts', JSON.stringify(carts));
};

// Event listener for adding products to the cart
listProductHTML.addEventListener('click', (event) => {
    if (event.target.classList.contains('addCart')) {
        let productElement = event.target.closest('.item');
        let product_id = productElement.dataset.id;
        let product_name = productElement.dataset.title;
        let product_image = productElement.dataset.image;
        let product_price = parseFloat(productElement.dataset.price);

        if (isNaN(product_price)) {
            console.error('Invalid price for product:', productElement);
            return; // Prevent adding if price is invalid
        }

        addToCart(product_id, product_name, product_image, product_price);
    }
});

// Function to add product to cart
const addToCart = (product_id, product_name, product_image, product_price) => {
    product_price = parseFloat(product_price); // Ensure price is treated as a number

    let positionThisProductInCart = carts.findIndex((value) => value.product_id == product_id);

    if (positionThisProductInCart < 0) {
        carts.push({
            product_id: product_id,
            name: product_name,
            image: product_image,
            price: product_price,
            quantity: 1
        });
    } else {
        carts[positionThisProductInCart].quantity += 1;
    }

    addCartToHTML();
    saveCartToLocalStorage(); // Save cart to localStorage after updating
};

// Function to render the cart HTML
const addCartToHTML = () => {
    listCartHTML.innerHTML = '';
    let totalQuantity = 0;
    let totalPrice = 0;

    if (carts.length > 0) {
        carts.forEach(cart => {
            totalQuantity += cart.quantity;
            let itemTotalPrice = cart.price * cart.quantity;

            let newCart = document.createElement('div');
            newCart.classList.add('item');
            newCart.dataset.id = cart.product_id;

            newCart.innerHTML = `
                <div class="image">
                    <img src="${cart.image}" alt="${cart.name}">
                </div>
                <div class="name">${cart.name}</div>
                <div class="totalPrice">${itemTotalPrice.toFixed(2)} ETB</div>
                <div class="quantity">
                    <span class="minus"><</span>
                    <span>${cart.quantity}</span>
                    <span class="plus">></span>
                </div>
            `;
            listCartHTML.appendChild(newCart);
            totalPrice += itemTotalPrice;
        });
    }

    iconCartSpan.innerText = totalQuantity;
    let totalPriceElement = document.querySelector('.totalPriceDisplay');
    if (totalPriceElement) {
        totalPriceElement.innerText = `Total: ${totalPrice.toFixed(2)} ETB`;
    }
};

// Event listeners for cart actions (plus, minus, close)
listCartHTML.addEventListener('click', (event) => {
    if (event.target.classList.contains('plus')) {
        let product_id = event.target.closest('.item').dataset.id;
        addToCart(product_id);
    }
    if (event.target.classList.contains('minus')) {
        let product_id = event.target.closest('.item').dataset.id;
        removeFromCart(product_id);
    }
});

closeCart.addEventListener('click', () => {
    body.classList.toggle('showCart');
});

iconCart.addEventListener('click', () => {
    body.classList.toggle('showCart');
});

// Function to remove product from cart
const removeFromCart = (product_id) => {
    let positionThisProductInCart = carts.findIndex((value) => value.product_id == product_id);
    if (positionThisProductInCart >= 0) {
        if (carts[positionThisProductInCart].quantity > 1) {
            carts[positionThisProductInCart].quantity -= 1;
        } else {
            carts.splice(positionThisProductInCart, 1);
        }
    }
    addCartToHTML();
    saveCartToLocalStorage(); // Save updated cart after removing item
};

// Initialize the app
const initApp = () => {
    loadCartFromLocalStorage(); // Load cart when the page is loaded
};

document.addEventListener('DOMContentLoaded', () => {
    // Initialize the app
    initApp();

    // Add event listener for checkout button after DOM is fully loaded
    const checkoutButton = document.getElementById('checkoutButton');
    if (checkoutButton) {
        checkoutButton.addEventListener('click', () => {
            window.location.href = 'check out.php'; // Redirect to the checkout page
        });
    }
});
