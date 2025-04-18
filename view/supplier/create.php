<h2>Tambah Pemasok Baru</h2>

<form action="index.php?page=supplier&action=store" method="POST">
    <div>
        <label for="name">Nama Pemasok:</label>
        <input type="text" id="name" name="name" required>
    </div>
    
    <div>
        <label for="address">Alamat:</label>
        <textarea id="address" name="address" rows="3" required></textarea>
    </div>
    
    <div>
        <label for="phone">Telepon:</label>
        <input type="text" id="phone" name="phone" required>
    </div>
    
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    
    <div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php?page=supplier" class="btn">Batal</a>
    </div>
</form>