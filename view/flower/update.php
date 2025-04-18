<h2>Edit Bunga</h2>

<form action="index.php?page=flower&action=save" method="POST">
    <input type="hidden" name="flower_id" value="<?= $flower['flower_id'] ?>">
    
    <div>
        <label for="name">Nama Bunga:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($flower['name']) ?>" required>
    </div>
    
    <div>
        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description" rows="4"><?= htmlspecialchars($flower['description']) ?></textarea>
    </div>
    
    <div>
        <label for="price">Harga (Rp):</label>
        <input type="number" id="price" name="price" min="0" step="1000" value="<?= $flower['price'] ?>" required>
    </div>
    
    <div>
        <label for="stock">Stok:</label>
        <input type="number" id="stock" name="stock" min="0" value="<?= $flower['stock'] ?>" required>
    </div>
    
    <div>
        <label for="supplier_id">Pemasok:</label>
        <select id="supplier_id" name="supplier_id" required>
            <option value="">Pilih Pemasok</option>
            <?php foreach($suppliers as $supplier): ?>
                <option value="<?= $supplier['supplier_id'] ?>" <?= ($supplier['supplier_id'] == $flower['supplier_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($supplier['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="index.php?page=flower" class="btn">Batal</a>
    </div>
</form>