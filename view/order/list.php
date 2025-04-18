<h2>Daftar Pesanan</h2>

<div class="search-box">
    <form action="index.php" method="GET">
        <input type="hidden" name="page" value="order">
        <input type="text" name="search" placeholder="Cari nama pelanggan..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        <button type="submit" class="btn">Cari</button>
    </form>
</div>

<a href="index.php?page=order&action=create" class="btn btn-primary">Tambah Pesanan Baru</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Bunga</th>
            <th>Nama Pelanggan</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Tanggal Pesanan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($orders) > 0): ?>
            <?php foreach($orders as $order): ?>
                <tr>
                    <td><?= $order['order_id'] ?></td>
                    <td><?= htmlspecialchars($order['flower_name']) ?></td>
                    <td><?= htmlspecialchars($order['customer_name']) ?></td>
                    <td><?= $order['quantity'] ?></td>
                    <td>Rp <?= number_format($order['total_price'], 0, ',', '.') ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($order['order_date'])) ?></td>
                    <td>
                        <a href="index.php?page=order&action=update&id=<?= $order['order_id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="index.php?page=order&action=delete&id=<?= $order['order_id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus pesanan ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" style="text-align: center;">Tidak ada data pesanan.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>