document.addEventListener("DOMContentLoaded", () => {
    const toast = document.getElementById("toast");

    document.querySelectorAll(".add-to-cart-form").forEach(form => {
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            
            const formData = new FormData(this);

            fetch('add_to_cart.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show the toast notification
                    toast.textContent = data.message;
                    toast.classList.remove("hidden");
                    toast.classList.add("show");

                    // Hide the toast after 3 seconds
                    setTimeout(() => {
                        toast.classList.remove("show");
                        toast.classList.add("hidden");
                    }, 3000);
                } else {
                    console.error(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
