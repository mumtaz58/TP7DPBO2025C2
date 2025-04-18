<h2>Daftar Bunga</h2>

<div class="search-box">
    <form action="index.php" method="GET">
        <input type="hidden" name="page" value="flower">
        <input type="text" name="search" placeholder="Cari nama bunga..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        <button type="submit" class="btn">Cari</button>
    </form>
</div>

<a href="index.php?page=flower&action=create" class="btn btn-primary">Tambah Bunga Baru</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Bunga</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Pemasok</th>
            <th>Tanggal Ditambahkan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($flowers) > 0): ?>
            <?php foreach($flowers as $flower): ?>
                <tr>
                    <td><?= $flower['flower_id'] ?></td>
                    <td><?= htmlspecialchars($flower['name']) ?></td>
                    <td><?= htmlspecialchars($flower['description']) ?></td>
                    <td>Rp <?= number_format($flower['price'], 0, ',', '.') ?></td>
                    <td><?= $flower['stock'] ?></td>
                    <td><?= htmlspecialchars($flower['supplier_name']) ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($flower['created_at'])) ?></td>
                    <td>
                        <a href="index.php?page=flower&action=update&id=<?= $flower['flower_id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="index.php?page=flower&action=delete&id=<?= $flower['flower_id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus bunga ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" style="text-align: center;">Tidak ada data bunga.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>