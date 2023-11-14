<?php
    function load_all_dm($kyw){
        $query="SELECT * FROM danhmuc WHERE 1";
        if($kyw!=''){
            $query .=" AND tendm like '%".$kyw."%'";
        }
            $query .=" ORDER BY id asc";
        return pdo_query($query);
    }
?>