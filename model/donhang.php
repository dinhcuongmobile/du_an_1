<?php
    function load_all_dh($kyw){
        $query="SELECT donhang.*, taikhoan.tendangnhap FROM donhang INNER JOIN taikhoan ON donhang.idtaikhoan=taikhoan.id WHERE 1";
        if($kyw!=""){
            $query .=" AND (tendangnhap LIKE '%" . $kyw . "%' OR sodienthoai LIKE '%" . $kyw . "%' OR email LIKE '%" . $kyw . "%')";
        }
        $query .=" ORDER BY id asc";
        return pdo_query($query);
    }
    function load_all_giohang($idbill){
        $query="SELECT * FROM giohang WHERE idbill=".$idbill;
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
    function insert_bill($idtaikhoan,$hovaten,$diachi,$sodienthoai,$email,$phuongthuctt,$ngaydathang,$tongtien){
        $query="INSERT INTO donhang(idtaikhoan,hovaten,diachi,sodienthoai,email,phuongthuctt,ngaydathang,tongtien) 
        VALUES('$idtaikhoan','$hovaten','$diachi','$sodienthoai','$email','$phuongthuctt','$ngaydathang','$tongtien')";
        return pdo_execute_return_lastInsertId($query);
    }
    function insert_cart($idtaikhoan,$idsanpham,$image,$tensp,$giasp,$soluong,$thanhtien,$idbill){
        $query="INSERT INTO giohang(idtaikhoan,idsanpham,image,tensp,giasp,soluong,thanhtien,idbill) 
        VALUES('$idtaikhoan','$idsanpham','$image','$tensp','$giasp','$soluong','$thanhtien','$idbill')";
        return pdo_execute_return_lastInsertId($query);
    }
    function tongdonhang(){
        $tongthanhtoan=0;
        foreach ($_SESSION['giohang'] as $giohang) {
            extract($giohang);
            $tongthanhtoan+=$giohang[5];
        }
        return $tongthanhtoan;
    }
?>