<?php
    ob_start();
    session_start();
    include "../../model/pdo.php";
    include "../../model/sanpham.php";
    include "../../model/taikhoan.php";
    include "../../model/donhang.php";
if(isset($_SESSION['user'])){
    $listgh=load_all_giohang($_SESSION['user']['id']); 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idsanpham = $_POST['id'];
        $giasp = $_POST['giasp'];
        $soluong = 1;
        $thanhtien = $giasp * $soluong;
        $check = true;
        foreach ($listgh as $giohang) {
            if ($idsanpham == $giohang['idsanpham']) {
                $giohang['soluong'] += $soluong;
                $giohang['thanhtien'] = $giasp * $giohang['soluong'];
                update_giohang($giohang['soluong'],$giohang['thanhtien'],$giohang['idsanpham']);
                $check = false;
                break;
            }
        }
    
        if ($check) {
            insert_cart($_SESSION['user']['id'], $idsanpham, $soluong, $thanhtien);
        }
    } 
    echo json_encode($listgh);
}
?>