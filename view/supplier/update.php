<h2>Edit Pemasok</h2>

<form action="index.php?page=supplier&action=save" method="POST">
    <input type="hidden" name="supplier_id" value="<?= $supplier['supplier_id'] ?>">
    
    <div>
        <label for="name">Nama Pemasok:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($supplier['name']) ?>" required>
    </div>
    
    <div>
        <label for="address">Alamat:</label>
        <textarea id="address" name="address" rows="3" required><?= htmlspecialchars($supplier['address']) ?></textarea>
    </div>
    
    <div>
        <label for="phone">Telepon:</label>
        <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($supplier['phone']) ?>" required>
    </div>
    
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($supplier['email']) ?>" required>
    </div>
    
    <div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="index.php?page=supplier" class="btn">Batal</a>
    </div>
</form>