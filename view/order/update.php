<h2>Edit Pesanan</h2>

<form action="index.php?page=order&action=save" method="POST">
    <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
    
    <div>
        <label for="flower_id">Pilih Bunga:</label>
        <select id="flower_id" name="flower_id" required onchange="updatePrice()">
            <option value="">Pilih Bunga</option>
            <?php foreach($flowers as $flower): ?>
                <option value="<?= $flower['flower_id'] ?>" data-price="<?= $flower['price'] ?>" <?= ($flower['flower_id'] == $order['flower_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($flower['name']) ?> - Rp <?= number_format($flower['price'], 0, ',', '.') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div>
        <label for="customer_name">Nama Pelanggan:</label>
        <input type="text" id="customer_name" name="customer_name" value="<?= htmlspecialchars($order['customer_name']) ?>" required>
    </div>
    
    <div>
        <label for="quantity">Jumlah:</label>
        <input type="number" id="quantity" name="quantity" min="1" value="<?= $order['quantity'] ?>" required onchange="updateTotalPrice()" onkeyup="updateTotalPrice()">
    </div>
    
    <div>
        <label for="total_price">Total Harga (Rp):</label>
        <input type="number" id="total_price" name="total_price" value="<?= $order['total_price'] ?>" readonly>
    </div>
    
    <div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="index.php?page=order" class="btn">Batal</a>
    </div>
</form>

<script>
    function updatePrice() {
        const flowerSelect = document.getElementById('flower_id');
        const quantityInput = document.getElementById('quantity');
        
        updateTotalPrice();
    }
    
    function updateTotalPrice() {
        const flowerSelect = document.getElementById('flower_id');
        const quantityInput = document.getElementById('quantity');
        const totalPriceInput = document.getElementById('total_price');
        
        if (flowerSelect.selectedIndex > 0) {
            const selectedOption = flowerSelect.options[flowerSelect.selectedIndex];
            const price = parseFloat(selectedOption.getAttribute('data-price'));
            const quantity = parseInt(quantityInput.value);
            
            if (!isNaN(price) && !isNaN(quantity)) {
                totalPriceInput.value = price * quantity;
            }
        } else {
            totalPriceInput.value = '';
        }
    }
    
    // Update total price when the page loads
    window.onload = function() {
        updateTotalPrice();
    };
</script>