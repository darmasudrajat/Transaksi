<?php
    // $serverName = "DESKTOP-VF86K94";
    // $userId = "sa";
    // $userPassword = "dsoft";

    // $connInfo = array(
    //     "UID" => "$userId",
    //     "PWD" => "$userPassword",
    //     "Database" => "db_transaksi"
    // );

    // $conn = sqlsrv_connect($serverName, $connInfo);

        $conn = mysqli_connect("localhost", "root", "", "db_transaksi");
        
        // CEK
        if (!$conn){
            die('Koneksi Error :'.mysqli_connect_errno()
            .' - ' .mysqli_connect_error());
        }

    // mysqli_close($conn);
    
    // if(mysqli_connect_errno()){
    //     echo "<div class='alert alert-danger'>
    //         <strong>ERROR.!</strong>
    //         .mysqli_connect_error();
    //     </div>";
    // }
?>