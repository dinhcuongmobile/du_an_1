<?php
    /* Trong qua trinh sua */
    function insert_cart($idtaikhoan,$idsanpham,$soluong,$thanhtien){
        $query="INSERT INTO `giohang`(`idtaikhoan`, `idsanpham`, `soluong`, `thanhtien`) VALUES ('$idtaikhoan','$idsanpham','$soluong','$thanhtien')";
        pdo_execute($query);
    }
    function delete_giohang($idsanpham,$idtaikhoan){
        $query="DELETE FROM giohang WHERE 1";
        if($idsanpham>0){
            $query .=" AND idsanpham=".$idsanpham;
        }
        if($idtaikhoan>0){
            $query .=" AND idtaikhoan=".$idtaikhoan;
        }
        pdo_execute($query);
    }
    function delete_chitietdh($iddonhang){
        $query="DELETE FROM chitietdonhang WHERE iddonhang='$iddonhang'";
        pdo_execute($query);
    }
    function delete_donhang($iddonhang){
        $query="DELETE FROM donhang WHERE id='$iddonhang'";
        pdo_execute($query);
    }
    function update_giohang($soluong,$thanhtien,$idsanpham){
        $query="UPDATE `giohang` SET `soluong`='$soluong',`thanhtien`='$thanhtien' WHERE idsanpham=".$idsanpham;
        pdo_execute($query);
    }
    function update_donhang($trangthai,$iddonhang){
        $query="UPDATE `donhang` SET `trangthai`='$trangthai' WHERE id=".$iddonhang;
        pdo_execute($query);
    }
    // function update_chitietdh($trangthai,$giaohang,$iddonhang){
    //     $query="UPDATE `chitietdonhang` SET `trangthai`='3', `giaohang`='$giaohang' WHERE id=".$iddonhang;
    //     pdo_execute($query);
    // }
    function load_one_dh($id){
        $query="SELECT * FROM donhang WHERE id=".$id;
        return pdo_query_one($query);
    }
    function load_one_gh($idsanpham){
        $query="SELECT * FROM giohang WHERE idsanpham=".$idsanpham;
        return pdo_query_one($query);
    }
    function load_all_giohang($idtaikhoan){
        $query="SELECT giohang.id, giohang.idtaikhoan, giohang.idsanpham, giohang.soluong, giohang.thanhtien,
        sanpham.id as idsp, sanpham.iddm, sanpham.tensp, sanpham.giasp, sanpham.giakm, sanpham.image, sanpham.soluong as soluongsp, sanpham.trangthai, sanpham.khuyenmai FROM giohang 
        INNER JOIN sanpham ON giohang.idsanpham=sanpham.id WHERE idtaikhoan=".$idtaikhoan;
        return pdo_query($query);
    }
    function load_all_duyetdon($kyw){
        $query="SELECT donhang.id as iddh, donhang.idtaikhoan, donhang.hovatennhan, donhang.ngaydathang, donhang.diachinhan, donhang.sodienthoainhan, donhang.phuongthuctt, donhang.trangthai,
         SUM(chitietdonhang.soluong) as soluongct, SUM(chitietdonhang.thanhtien) as thanhtien,
         taikhoan.id as idtk, taikhoan.hovaten, taikhoan.tendangnhap, taikhoan.matkhau, taikhoan.email, taikhoan.sodienthoai, taikhoan.diachi FROM chitietdonhang 
         INNER JOIN donhang ON donhang.id=chitietdonhang.iddonhang 
         INNER JOIN taikhoan ON donhang.idtaikhoan=taikhoan.id WHERE donhang.trangthai='0'";
        if($kyw!=''){
            $query .=" AND (donhang.diachinhan LIKE '%" . $kyw . "%' OR donhang.sodienthoainhan LIKE '%" . $kyw . "%' OR taikhoan.tendangnhap LIKE '%" . $kyw . "%')";
        }
        $query .=" GROUP BY chitietdonhang.iddonhang ORDER BY iddh desc";
        return pdo_query($query);
    }
    function load_all_ctdh($kyw){
        $query="SELECT donhang.id as iddh, donhang.idtaikhoan, donhang.hovatennhan, donhang.ngaydathang, donhang.diachinhan, donhang.sodienthoainhan, donhang.phuongthuctt, donhang.trangthai,
         SUM(chitietdonhang.soluong) as soluongct, SUM(chitietdonhang.thanhtien) as thanhtien,
         taikhoan.id as idtk, taikhoan.hovaten, taikhoan.tendangnhap, taikhoan.matkhau, taikhoan.email, taikhoan.sodienthoai, taikhoan.diachi FROM chitietdonhang 
         INNER JOIN donhang ON donhang.id=chitietdonhang.iddonhang 
         INNER JOIN taikhoan ON donhang.idtaikhoan=taikhoan.id WHERE donhang.trangthai IN ('2', '3', '4')";
        if($kyw!=''){
            $query .=" AND (donhang.diachinhan LIKE '%" . $kyw . "%' OR donhang.sodienthoainhan LIKE '%" . $kyw . "%' OR taikhoan.tendangnhap LIKE '%" . $kyw . "%')";
        }
        $query .=" GROUP BY chitietdonhang.iddonhang ORDER BY iddh desc";
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
    function count_donhang(){
        $query="SELECT COUNT(*) FROM donhang";
        return pdo_query_one($query);
    }
    function mua_hang($idtaikhoan,$hovatennhan,$ngaydathang,$diachinhan,$sodienthoainhan,$phuongthuctt){
        $query="INSERT INTO `donhang`(`idtaikhoan`, `hovatennhan`, `ngaydathang`, `diachinhan`, `sodienthoainhan`, `phuongthuctt`) 
        VALUES ('$idtaikhoan','$hovatennhan','$ngaydathang','$diachinhan','$sodienthoainhan','$phuongthuctt')";
        return pdo_execute_return_lastInsertId($query);
    }
    function insert_chitietdonhang($iddonhang,$idsanpham,$soluong,$dongia,$thanhtien){
        $query="INSERT INTO `chitietdonhang`(`iddonhang`, `idsanpham`, `soluong`, `dongia`, `thanhtien`) VALUES ('$iddonhang','$idsanpham','$soluong','$dongia','$thanhtien')";
        pdo_execute($query);
    }
    function load_all_dh($idtaikhoan,$trangthai){
        $query="SELECT chitietdonhang.id, chitietdonhang.iddonhang, chitietdonhang.idsanpham, chitietdonhang.soluong, chitietdonhang.dongia, chitietdonhang.thanhtien,
        donhang.id as iddh, donhang.idtaikhoan, donhang.hovatennhan, donhang.ngaydathang, donhang.diachinhan, donhang.sodienthoainhan, donhang.phuongthuctt, donhang.trangthai,
        sanpham.id as idsp, sanpham.iddm, sanpham.tensp, sanpham.giakm, sanpham.image, sanpham.khuyenmai FROM chitietdonhang 
        INNER JOIN donhang ON chitietdonhang.iddonhang=donhang.id
        INNER JOIN sanpham ON chitietdonhang.idsanpham=sanpham.id  WHERE donhang.idtaikhoan='$idtaikhoan'";
        if($trangthai==0){
            $query .=" AND donhang.trangthai='$trangthai'";
        }else if($trangthai==1){
            $query .=" AND donhang.trangthai='4' OR donhang.trangthai='5'";
        }else if($trangthai==2){
            $query .=" AND donhang.trangthai='$trangthai'";
        }else if($trangthai==3){
            $query .=" AND donhang.trangthai='$trangthai'";
        }else if($trangthai==4){
            $query .=" AND donhang.trangthai='$trangthai'";
        }
        else if($trangthai==5){
            $query .=" AND donhang.trangthai='$trangthai'";
        }
        return pdo_query($query);
    }
?>