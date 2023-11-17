<?php
    function load_all_dh($kyw){
        $query="SELECT donhang.*, taikhoan.tendangnhap FROM donhang INNER JOIN taikhoan ON donhang.idtaikhoan=taikhoan.id WHERE 1";
        if($kyw!=""){
            $query .=" AND (tendangnhap LIKE '%" . $kyw . "%' OR sodienthoai LIKE '%" . $kyw . "%' OR email LIKE '%" . $kyw . "%')";
        }
        $query .=" ORDER BY id asc";
        return pdo_query($query);
    }
?>