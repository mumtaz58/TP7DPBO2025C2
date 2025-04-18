<?php
session_start();

// Include class files
require_once 'class/Flower.php';
require_once 'class/Supplier.php';
require_once 'class/Order.php';

// Initialize objects
$flowerObj = new Flower();
$supplierObj = new Supplier();
$orderObj = new Order();

// Default page
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

// Include header
include_once 'view/header.php';

// Router
switch ($page) {
    // Home page
    case 'home':
        echo '<h2>Selamat Datang di Toko Bunga "A&Y Blossom Haus"</h2>';
        echo '<p>Aplikasi manajemen toko bunga sederhana untuk mengelola bunga, pemasok, dan pesanan.</p>';
        echo '<div style="display: flex; flex-wrap: wrap; justify-content: space-around; margin: 2rem 0;">';
        echo '<div style="background-color: #ffebee; padding: 1.5rem; border-radius: 5px; margin: 1rem; flex: 1; min-width: 250px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">';
        echo '<h3>Bunga</h3>';
        echo '<p>Kelola inventaris bunga yang tersedia di toko.</p>';
        echo '<a href="index.php?page=flower" class="btn">Lihat Bunga</a>';
        echo '</div>';
        echo '<div style="background-color: #fff9c4; padding: 1.5rem; border-radius: 5px; margin: 1rem; flex: 1; min-width: 250px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">';
        echo '<h3>Pemasok</h3>';
        echo '<p>Kelola data pemasok bunga untuk toko.</p>';
        echo '<a href="index.php?page=supplier" class="btn">Lihat Pemasok</a>';
        echo '</div>';
        echo '<div style="background-color: #e3f2fd; padding: 1.5rem; border-radius: 5px; margin: 1rem; flex: 1; min-width: 250px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">';
        echo '<h3>Pesanan</h3>';
        echo '<p>Kelola pesanan bunga dari pelanggan.</p>';
        echo '<a href="index.php?page=order" class="btn">Lihat Pesanan</a>';
        echo '</div>';
        echo '</div>';
        break;
    
    // Flower management
    case 'flower':
        switch ($action) {
            case 'list':
                if (isset($_GET['search'])) {
                    $flowers = $flowerObj->searchFlowers($_GET['search']);
                } else {
                    $flowers = $flowerObj->getAllFlowers();
                }
                include_once 'view/flower/list.php';
                break;
                
            case 'create':
                $suppliers = $supplierObj->getAllSuppliers();
                include_once 'view/flower/create.php';
                break;
                
            case 'store':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name = $_POST['name'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $stock = $_POST['stock'];
                    $supplier_id = $_POST['supplier_id'];
                    
                    if ($flowerObj->createFlower($name, $description, $price, $stock, $supplier_id)) {
                        $_SESSION['message'] = 'Bunga berhasil ditambahkan!';
                        $_SESSION['message_type'] = 'success';
                    } else {
                        $_SESSION['message'] = 'Gagal menambahkan bunga!';
                        $_SESSION['message_type'] = 'error';
                    }
                }
                header('Location: index.php?page=flower');
                exit();
                break;
                
            case 'update':
                $id = $_GET['id'];
                $flower = $flowerObj->getFlowerById($id);
                $suppliers = $supplierObj->getAllSuppliers();
                include_once 'view/flower/update.php';
                break;
                
            case 'save':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['flower_id'];
                    $name = $_POST['name'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $stock = $_POST['stock'];
                    $supplier_id = $_POST['supplier_id'];
                    
                    if ($flowerObj->updateFlower($id, $name, $description, $price, $stock, $supplier_id)) {
                        $_SESSION['message'] = 'Bunga berhasil diupdate!';
                        $_SESSION['message_type'] = 'success';
                    } else {
                        $_SESSION['message'] = 'Gagal mengupdate bunga!';
                        $_SESSION['message_type'] = 'error';
                    }
                }
                header('Location: index.php?page=flower');
                exit();
                break;
                
            case 'delete':
                $id = $_GET['id'];
                if ($flowerObj->deleteFlower($id)) {
                    $_SESSION['message'] = 'Bunga berhasil dihapus!';
                    $_SESSION['message_type'] = 'success';
                } else {
                    $_SESSION['message'] = 'Gagal menghapus bunga!';
                    $_SESSION['message_type'] = 'error';
                }
                header('Location: index.php?page=flower');
                exit();
                break;
        }
        break;
    
    // Supplier management
    case 'supplier':
        switch ($action) {
            case 'list':
                if (isset($_GET['search'])) {
                    $suppliers = $supplierObj->searchSuppliers($_GET['search']);
                } else {
                    $suppliers = $supplierObj->getAllSuppliers();
                }
                include_once 'view/supplier/list.php';
                break;
                
            case 'create':
                include_once 'view/supplier/create.php';
                break;
                
            case 'store':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    
                    if ($supplierObj->createSupplier($name, $address, $phone, $email)) {
                        $_SESSION['message'] = 'Pemasok berhasil ditambahkan!';
                        $_SESSION['message_type'] = 'success';
                    } else {
                        $_SESSION['message'] = 'Gagal menambahkan pemasok!';
                        $_SESSION['message_type'] = 'error';
                    }
                }
                header('Location: index.php?page=supplier');
                exit();
                break;
                
            case 'update':
                $id = $_GET['id'];
                $supplier = $supplierObj->getSupplierById($id);
                include_once 'view/supplier/update.php';
                break;
                
            case 'save':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['supplier_id'];
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    
                    if ($supplierObj->updateSupplier($id, $name, $address, $phone, $email)) {
                        $_SESSION['message'] = 'Pemasok berhasil diupdate!';
                        $_SESSION['message_type'] = 'success';
                    } else {
                        $_SESSION['message'] = 'Gagal mengupdate pemasok!';
                        $_SESSION['message_type'] = 'error';
                    }
                }
                header('Location: index.php?page=supplier');
                exit();
                break;
                
            case 'delete':
                $id = $_GET['id'];
                if ($supplierObj->deleteSupplier($id)) {
                    $_SESSION['message'] = 'Pemasok berhasil dihapus!';
                    $_SESSION['message_type'] = 'success';
                } else {
                    $_SESSION['message'] = 'Gagal menghapus pemasok!';
                    $_SESSION['message_type'] = 'error';
                }
                header('Location: index.php?page=supplier');
                exit();
                break;
        }
        break;
    
    // Order management
    case 'order':
        switch ($action) {
            case 'list':
                if (isset($_GET['search'])) {
                    $orders = $orderObj->searchOrders($_GET['search']);
                } else {
                    $orders = $orderObj->getAllOrders();
                }
                include_once 'view/order/list.php';
                break;
                
            case 'create':
                $flowers = $flowerObj->getAllFlowers();
                include_once 'view/order/create.php';
                break;
                
            case 'store':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $flower_id = $_POST['flower_id'];
                    $customer_name = $_POST['customer_name'];
                    $quantity = $_POST['quantity'];
                    $total_price = $_POST['total_price'];
                    
                    if ($orderObj->createOrder($flower_id, $customer_name, $quantity, $total_price)) {
                        $_SESSION['message'] = 'Pesanan berhasil ditambahkan!';
                        $_SESSION['message_type'] = 'success';
                    } else {
                        $_SESSION['message'] = 'Gagal menambahkan pesanan!';
                        $_SESSION['message_type'] = 'error';
                    }
                }
                header('Location: index.php?page=order');
                exit();
                break;
                
            case 'update':
                $id = $_GET['id'];
                $order = $orderObj->getOrderById($id);
                $flowers = $flowerObj->getAllFlowers();
                include_once 'view/order/update.php';
                break;
                
            case 'save':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['order_id'];
                    $flower_id = $_POST['flower_id'];
                    $customer_name = $_POST['customer_name'];
                    $quantity = $_POST['quantity'];
                    $total_price = $_POST['total_price'];
                    
                    if ($orderObj->updateOrder($id, $flower_id, $customer_name, $quantity, $total_price)) {
                        $_SESSION['message'] = 'Pesanan berhasil diupdate!';
                        $_SESSION['message_type'] = 'success';
                    } else {
                        $_SESSION['message'] = 'Gagal mengupdate pesanan!';
                        $_SESSION['message_type'] = 'error';
                    }
                }
                header('Location: index.php?page=order');
                exit();
                break;
                
            case 'delete':
                $id = $_GET['id'];
                if ($orderObj->deleteOrder($id)) {
                    $_SESSION['message'] = 'Pesanan berhasil dihapus!';
                    $_SESSION['message_type'] = 'success';
                } else {
                    $_SESSION['message'] = 'Gagal menghapus pesanan!';
                    $_SESSION['message_type'] = 'error';
                }
                header('Location: index.php?page=order');
                exit();
                break;
        }
        break;
    
    default:
        echo '<h2>Halaman tidak ditemukan</h2>';
        echo '<p>Halaman yang Anda cari tidak tersedia.</p>';
        echo '<a href="index.php" class="btn">Kembali ke Home</a>';
        break;
}

// Include footer
include_once 'view/footer.php';
?>