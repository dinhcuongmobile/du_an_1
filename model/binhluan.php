<?php
 function load_all_bl($kyw){
    $query="SELECT binhluan.*, taikhoan.hovaten, taikhoan.tendangnhap, sanpham.tensp FROM binhluan
    INNER JOIN taikhoan ON binhluan.idtaikhoan=taikhoan.id INNER JOIN sanpham ON binhluan.idsanpham=sanpham.id WHERE 1";
    if ($kyw != "") {
        $query .= " AND (tendangnhap LIKE '%" . $kyw . "%' OR tensp LIKE '%" . $kyw . "%' OR noidung LIKE '%" . $kyw . "%')";
    }
    $query .=" ORDER BY id asc";
    return pdo_query($query);
}
?>