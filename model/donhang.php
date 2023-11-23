<?php
    /* Trong qua trinh sua */
    function insert_cart($idtaikhoan,$idsanpham,$soluong,$thanhtien){
        $query="INSERT INTO `giohang`(`idtaikhoan`, `idsanpham`, `soluong`, `thanhtien`) VALUES ('$idtaikhoan','$idsanpham','$soluong','$thanhtien')";
        pdo_execute($query);
    }
    function delete_giohang($idsanpham){
        $query="DELETE FROM giohang WHERE 1";
        if($idsanpham>0){
            $query .=" AND idsanpham=".$idsanpham;
        }
        pdo_execute($query);
    }
    function update_giohang($soluong,$thanhtien,$idsanpham){
        $query="UPDATE `giohang` SET `soluong`='$soluong',`thanhtien`='$thanhtien' WHERE idsanpham=".$idsanpham;
        pdo_execute($query);
    }
    function load_all_giohang($idtaikhoan){
        $query="SELECT giohang.id, giohang.idtaikhoan, giohang.idsanpham, giohang.soluong, giohang.thanhtien,
        sanpham.id, sanpham.iddm, sanpham.tensp, sanpham.giasp, sanpham.giakm, sanpham.image, sanpham.soluong as soluongsp, sanpham.trangthai, sanpham.khuyenmai FROM giohang 
        INNER JOIN sanpham ON giohang.idsanpham=sanpham.id WHERE idtaikhoan=".$idtaikhoan;
        return pdo_query($query);
    }
    function load_minicart($idtaikhoan){
        $query="SELECT giohang.id, giohang.idtaikhoan, giohang.idsanpham, giohang.soluong, giohang.thanhtien,
        sanpham.id as idsp, sanpham.iddm, sanpham.tensp, sanpham.giasp, sanpham.giakm, sanpham.image, sanpham.soluong as soluongsp, sanpham.trangthai, sanpham.khuyenmai FROM giohang 
        INNER JOIN sanpham ON giohang.idsanpham=sanpham.id WHERE idtaikhoan='$idtaikhoan' ORDER BY giohang.id desc limit 0,2" ;
        return pdo_query($query);
    }
    function count_giohang($idtaikhoan){
        $query="SELECT COUNT(*) FROM giohang WHERE idtaikhoan=".$idtaikhoan;
        return pdo_query_one($query);
    }
    function mua_hang($idtaikhoan,$hovatennhan,$ngaydathang,$diachinhan,$sodienthoainhan,$phuongthuctt,$trangthai){
        $query="INSERT INTO `donhang`(`idtaikhoan`, `hovatennhan`, `ngaydathang`, `diachinhan`, `sodienthoainhan`, `phuongthuctt`, `trangthai`) 
        VALUES ('$idtaikhoan','$hovatennhan','$ngaydathang','$diachinhan','$sodienthoainhan','$phuongthuctt','$trangthai')";
        pdo_execute($query);
    }
    function insert_chitietdonhang($iddonhang,$idsanpham,$soluong,$dongia,$thanhtien){
        $query="INSERT INTO `chitietdonhang`(`iddonhang`, `idsanpham`, `soluong`, `dongia`, `thanhtien`) VALUES ('$iddonhang','$idsanpham','$soluong','$dongia','$thanhtien')";
        pdo_execute($query);
    }
?>