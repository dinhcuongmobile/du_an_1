<?php
function load_all_tk($vaitro,$kyw){
    $query="SELECT * FROM taikhoan WHERE 1";
    if ($kyw != "") {
        $query .= " AND (hovaten LIKE '%" . $kyw . "%' OR email LIKE '%" . $kyw . "%' OR sodienthoai LIKE '%" . $kyw . "%')";
    }
    if($vaitro==1){
        $query .=" AND role=".$vaitro;
    }else{
        $query .=" AND role=".$vaitro;
    }
    $query .=" ORDER BY id asc";
    return pdo_query($query);
}
?>