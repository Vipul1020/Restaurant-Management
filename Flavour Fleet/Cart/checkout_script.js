document.addEventListener('DOMContentLoaded', function() {
    // Check if totalSum is defined
    if (typeof totalSum === 'undefined') {
        console.error('totalSum is not defined.');
        return;
    }

    document.getElementById('apply_discount').addEventListener('click', function() {
        const discountCode = document.getElementById('discount_code').value;
        let discountAmount = 0;
        if (discountCode === 'DISCOUNT10') {
            discountAmount = totalSum * 0.10; // 10% discount
        }
        document.getElementById('discount_amount').textContent = `Discount: $${discountAmount.toFixed(2)}`;
        const totalAmount = totalSum - discountAmount;
        document.getElementById('total_amount').textContent = `Total Amount: $${totalAmount.toFixed(2)}`;
    });
});
