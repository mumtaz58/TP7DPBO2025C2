<h2>Daftar Pemasok</h2>

<div class="search-box">
    <form action="index.php" method="GET">
        <input type="hidden" name="page" value="supplier">
        <input type="text" name="search" placeholder="Cari nama pemasok..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        <button type="submit" class="btn">Cari</button>
    </form>
</div>

<a href="index.php?page=supplier&action=create" class="btn btn-primary">Tambah Pemasok Baru</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Tanggal Ditambahkan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($suppliers) > 0): ?>
            <?php foreach($suppliers as $supplier): ?>
                <tr>
                    <td><?= $supplier['supplier_id'] ?></td>
                    <td><?= htmlspecialchars($supplier['name']) ?></td>
                    <td><?= htmlspecialchars($supplier['address']) ?></td>
                    <td><?= htmlspecialchars($supplier['phone']) ?></td>
                    <td><?= htmlspecialchars($supplier['email']) ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($supplier['created_at'])) ?></td>
                    <td>
                        <a href="index.php?page=supplier&action=update&id=<?= $supplier['supplier_id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="index.php?page=supplier&action=delete&id=<?= $supplier['supplier_id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus pemasok ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" style="text-align: center;">Tidak ada data pemasok.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>