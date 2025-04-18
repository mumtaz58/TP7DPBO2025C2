<h2>Tambah Bunga Baru</h2>

<form action="index.php?page=flower&action=store" method="POST">
    <div>
        <label for="name">Nama Bunga:</label>
        <input type="text" id="name" name="name" required>
    </div>
    
    <div>
        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description" rows="4"></textarea>
    </div>
    
    <div>
        <label for="price">Harga (Rp):</label>
        <input type="number" id="price" name="price" min="0" step="1000" required>
    </div>
    
    <div>
        <label for="stock">Stok:</label>
        <input type="number" id="stock" name="stock" min="0" required>
    </div>
    
    <div>
        <label for="supplier_id">Pemasok:</label>
        <select id="supplier_id" name="supplier_id" required>
            <option value="">Pilih Pemasok</option>
            <?php foreach($suppliers as $supplier): ?>
                <option value="<?= $supplier['supplier_id'] ?>"><?= htmlspecialchars($supplier['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php?page=flower" class="btn">Batal</a>
    </div>
</form>