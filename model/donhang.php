<?php
    function load_all_dh($kyw){
        $query="SELECT donhang.*, taikhoan.tendangnhap FROM donhang INNER JOIN taikhoan ON donhang.idtaikhoan=taikhoan.id WHERE 1";
        if($kyw!=""){
            $query .=" AND (tendangnhap LIKE '%" . $kyw . "%' OR sodienthoai LIKE '%" . $kyw . "%' OR email LIKE '%" . $kyw . "%')";
        }
        $query .=" ORDER BY id asc";
        return pdo_query($query);
    }
    function delete_dh($id){
        $query="DELETE FROM donhang WHERE id=".$id;
        pdo_execute($query);
    }
    function delete_giohang($id){
        $query="DELETE FROM giohang WHERE idbill=".$id;
        pdo_execute($query);
    }
?>