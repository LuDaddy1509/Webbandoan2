<?php
    include "database/CustomerDBconnect.php";
    $this_id=$_GET['this_id'];
    echo $this_id;
    $sql="DELETE FROM sanpham WHERE ID='$this_id' ";
    mysqLi_query($conn, $sql);
    header('location: adminproduct.php');
?>