document.addEventListener("DOMContentLoaded", () => {
    const cartTable = document.querySelector(".cart-table");
    const cartSummary = document.querySelector(".cart-summary");
    const emptyCartMessage = document.querySelector(".main p");
    const totalAmountElement = document.getElementById("totalAmount");

    cartTable.addEventListener("click", function(event) {
        const clickedElement = event.target;

        if (clickedElement.classList.contains("increase-quantity")) {
            // Increase quantity logic
            const row = clickedElement.closest("tr");
            const quantityElement = row.querySelector(".quantity");
            const itemTotalElement = row.querySelector(".item-total");
            const price = parseFloat(row.querySelector("td:nth-child(3)").textContent.slice(1));
            const itemId = row.getAttribute("data-id");

            let quantity = parseInt(quantityElement.textContent);
            quantity++;
            quantityElement.textContent = quantity;

            const itemTotal = price * quantity;
            itemTotalElement.textContent = `$${itemTotal.toFixed(2)}`;

            updateTotalSum();
            updateCartItem(itemId, quantity);
        } else if (clickedElement.classList.contains("decrease-quantity")) {
            // Decrease quantity logic
            const row = clickedElement.closest("tr");
            const quantityElement = row.querySelector(".quantity");
            const itemId = row.getAttribute("data-id");

            let quantity = parseInt(quantityElement.textContent);
            if (quantity > 1) {
                quantity--;
                quantityElement.textContent = quantity;
                const price = parseFloat(row.querySelector("td:nth-child(3)").textContent.slice(1));
                const itemTotal = price * quantity;
                const itemTotalElement = row.querySelector(".item-total");
                itemTotalElement.textContent = `$${itemTotal.toFixed(2)}`;
                updateCartItem(itemId, quantity);
            } else {
                row.remove();
                removeCartItem(itemId);
            }
            updateTotalSum(); // Update total sum after modifying quantity or removing the row
        }
    });

    // Update total sum on initial page load
    updateTotalSum();

    function updateTotalSum() {
        let totalSum = 0;
        const cartItems = document.querySelectorAll(".cart-table tbody tr");

        // Loop through each cart item row
        cartItems.forEach(itemRow => {
            const itemTotalElement = itemRow.querySelector(".item-total");
            if (itemTotalElement) {
                const itemTotalPrice = parseFloat(itemTotalElement.textContent.slice(1));
                totalSum += itemTotalPrice;
            }
        });

        if (totalAmountElement) {
            totalAmountElement.textContent = `Total Amount: $${totalSum.toFixed(2)}`;
            console.log("Total Amount Updated: ", totalAmountElement.textContent);

            // Ensure total amount is visible
            totalAmountElement.style.display = 'block';
            totalAmountElement.style.visibility = 'visible';
        } else {
            console.error("Error: Missing total amount element (ID: totalAmount)");
        }

        // Check if the cart is empty and update the display accordingly
        if (cartItems.length === 0) {
            cartTable.style.display = 'none';
            cartSummary.style.display = 'none';
            emptyCartMessage.style.display = 'block';
        } else {
            cartTable.style.display = 'table';
            cartSummary.style.display = 'block';
            emptyCartMessage.style.display = 'none';
        }
    }

    function updateCartItem(itemId, quantity) {
        fetch('update_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: itemId, quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                console.error('Failed to update cart item');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function removeCartItem(itemId) {
        fetch('remove_cart_item.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: itemId })
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                console.error('Failed to remove cart item');
            }
        })
        .catch(error => console.error('Error:', error));
    }
});
