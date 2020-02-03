<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Transaksi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="css/all.css">
    <!-- <script src="https://kit.fontawesome.com/eb2f197554.js" crossorigin="anonymous"></script> -->
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link href="https://fonts.googleapis.com/css?family=Denk+One&display=swap" rel="stylesheet">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <!-- <link rel="stylesheet" href="css/style.sea.css" id="theme-stylesheet"> -->
    <!-- <link rel="stylesheet" href="css/style.css" id="theme-stylesheet"> -->
    <!-- Custom stylesheet - for your changes-->
    <!-- <link rel="stylesheet" href="css/custom.css">  -->
    
    <link href="css/addons/datatables.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"; /> -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/addons/datatables.min.js" rel="stylesheet"></script>

    <!-- STYLE DROPDOWN -->
    <style etype="text.css">
       /*
    DEMO STYLE
*/

@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
body {
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    background: #fafafa;
}

p {
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        font-weight: 300;
        line-height: 1.7em;
        color: #999;
    }

a,
a:hover,
a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.navme .btn-dark {
    box-shadow: 0px 4px 9px rgba(0, 0, 0, 0.8);
    /* outline: none !important; */
    border: none;
    border-radius: 5px;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
    display: flex;
    width: 100%;
}

#sidebar {
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    font-size: 14px;
    height: 100vh;
    z-index: 999;
    background: #696969;
    color: #fff;
    transition: all 0.3s;
    box-shadow: 0px 4px 9px 0px rgba(0, 0, 0, 0.8);

}

.img-logo {
    width: 100px;
    height: 100px;
    margin: -25px -24px;
}

#sidebar.active {
    margin-left: -250px;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #696969;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #58A3FC;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    /* font-size: 1.1em; */
    display: block;
}

#sidebar ul li a:hover {
    color: #58A3FC;
    background: #fff;
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: #fff;
    background: #58A3FC;
}

a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

ul ul a {
    font-size: 12px !important;
    padding-left: 30px !important;
    background: #58A3FC;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 12px !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #58A3FC;
}

a.article,
a.article:hover {
    background: #58A3FC !important;
    color: #fff !important;
}

/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    position: absolute;
    top: 0;
    right: 0;
    background-image: url(img/bg1.jpg);
    background-size: 100% 100%;
    min-height: 100vh;
    padding-bottom: 50px;
    width: calc(100% - 240px);
    padding: 20px;
    transition: all 0.3s;
}
#footer {
    width: 100%;
    padding: 40px;
    min-height: 100vh;
    transition: all 0.3s;
    position: fixed;
    top: 90%;
    right: 0;
}
#content.active {
    width: 100%;
}
#footer.active {
    width: 100%;
}
.header{
    box-shadow: 0px 4px 9px 0px rgba(0, 0, 0, 0.8);
}
.fieldsets-table{
    width: 95%;
    color: black;
    margin: 10px;
    margin-bottom: 30px;
    padding: 10px;
    /* align-content: center; */
    border-radius: 20px;
    box-shadow: 0px 8px 16px 0px black;
    font-size: 12px;
    /* clear: both; */
    overflow: hidden;
}
.fieldtab1{
    width: 25%;
    float: left;
    margin-right: 12%;
}
.fieldtab2{
    width: 25%;
    float: left;
}
.fieldtab3{
    width: 25%;
    float: right;
}
.btn{
    margin-bottom: 10px;
}

/* ---------------------------------------------------
    MEDIA QUERIES
----------------------------------------------------- */

@media (max-width: 768px) {
    body{
        font-size: 12px;
    }
    .navme{
        margin-left: -20px;
    }
    #sidebar {
        margin-left: -180px;
        width: 180px;
    }
    .img-logo {
        width: 60px;
        height: 60px;
    }
    .fieldsets-table{
        color: black;
        width: 100%;
        margin: 10px -20px;
        /* margin-bottom: 20px; */
        /* margin-right: 15px; */
        padding: 5px 5px;
        border-radius: 20px;
        box-shadow: 0px 8px 16px 0px black;
        font-size: 12px;
        /* clear: both; */
        overflow: hidden;
    }
    .form-control{
        /* width: 120px; */
        font-size: 12px;
    }
    #sidebar{
        font-size: 12px;
    }
    #sidebar.active {
        margin-left: 0;
    }
    #content {
        width: 100%;
    }
    #content.active {
        width: calc(100% - 180px);
    }
    #sidebarCollapse span {
        display: block;
        font-size: 12px;
        height: 18px;
    }
    .myTableWrap {
        max-width: 768px;
        margin: 0 auto;
    }
    .fieldtab1{
        width: 100%;
        float: left;
        margin-bottom: 20px;
    }
    .fieldtab2{
        width: 100%;
        float: left;
        margin-bottom: 20px;
    }
    .fieldtab3{
        width: 100%;
        float: right;
        /* margin-left: -10%; */
    }
    .btn{
        margin-bottom: 10px;
        font-size: 10px;
    }
}

#myTableWrap {
    max-width: 100%;
    margin: 0 auto;
    font-size: 10px;
}
.myTable th, td {
    white-space: nowrap;
}

table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
    bottom: .5em;
}
    </style>
    <link rel="shortcut icon" href="img/favicon.ico">
</head>



  <body>
  <div id="wrapper">
    <nav id="sidebar">
    
            <div class="sidebar-header">
                <img class="img-logo" src="img/logo.png"/>
            </div>

            <ul class="list-unstyled components">
                <li>
                  <a href="index.php"> <i class="fas fa-house-damage"></i> Home</a>
                  <!-- <a href="input-penjualan.php"> <i class="fas fa-journal-whills"></i>Buat  Produk</a> -->
                </li>
                <li>
                    <a href="#masterSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Master Data</a>
                    <ul class="collapse list-unstyled" id="masterSubmenu">
                        <li>
                            <a href="customer.php"> <i class="fas fa-user-plus"></i>  Master Customer</a>
                        </li>
                        <li>
                            <a href="master-barang.php"> <i class="fas fa-shopping-bag"></i>  Master Barang</a>
                        </li>
                        <li>
                            <a href="master-suplier.php"> <i class="fas fa-truck"></i>  Master Suplier</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#produkSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Produk</a>
                    <ul class="collapse list-unstyled" id="produkSubmenu">
                        <li>
                            <a href="input-produk.php"> <i class="fas fa-journal-whills"></i>  Buat  Produk</a>
                        </li>
                        <li>
                            <a href="laporan-produk.php"> <i class="fas fa-shopping-bag"></i>  Laporan Produk</a>
                        </li>
                        <li>
                            <a href="#"> <i class="fas fa-truck"></i>  -</a>
                        </li>
                    </ul>
                </li>
                <!-- <li>
                    <a href="#">About</a>
                </li> -->
                <li>
                    <a href="#penawaranSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">  Penawaran</a>
                    <ul class="collapse list-unstyled" id="penawaranSubmenu">
                        <li>
                            <a href="penawaran-dtl.php"> <i class="fas fa-cash-register"></i>  Buat Penawaran</a>
                        </li>
                        <li>
                            <a href="laporan-penawaran.php"> <i class="fas fa-shopping-bag"></i>  Laporan Penawaran</a>
                        </li>
                        <li>
                            <a href="#">  -</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#soSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">  Sales Order (SO)</a>
                    <ul class="collapse list-unstyled" id="soSubmenu">
                        <li>
                            <a href="sales-order1.php"> <i class="fas fa-file-signature"></i>  Buat SO</a>
                        </li>
                        <li>
                            <a href="laporan-sales-order.php"> <i class="fas fa-shopping-bag"></i>  Laporan SO</a>
                        </li>
                        <li>
                            <a href="#">  -</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#poSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">  Purchase Order (PO)</a>
                    <ul class="collapse list-unstyled" id="poSubmenu">
                        <li>
                            <a href="purchase-order.php"> <i class="fas fa-comment-dollar"></i>  Buat PO</a>
                        </li>
                        <li>
                            <a href="laporan-po.php"> <i class="fas fa-shopping-bag"></i>  Laporan PO</a>
                        </li>
                        <li>
                            <a href="#">  -</a>
                        </li>
                    </ul>
                </li>
                <!-- <li>
                    <a href="#sjSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">  Surat Jalan</a>
                    <ul class="collapse list-unstyled" id="sjSubmenu">
                        <li>
                            <a href="surat-jalan.php"> <i class="fas fa-road"></i>  Buat Surat Jalan</a>
                        </li>
                        <li>
                            <a href="#"> <i class="fas fa-shopping-bag"></i>  Laporan Surat Jalan</a>
                        </li>
                        <li>
                            <a href="#">  -</a>
                        </li>
                    </ul>
                </li> -->
                <li>
                    <a href="#invSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">  Invoice</a>
                    <ul class="collapse list-unstyled" id="invSubmenu">
                        <li>
                            <a href="invoice.php"> <i class="fas fa-comment-dollar"></i>  Buat Invoice</a>
                        </li>
                        <li>
                            <a href="laporan-invoice.php"> <i class="fas fa-shopping-bag"></i>  Laporan Invoice</a>
                        </li>
                        <li>
                            <a href="#">  -</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#btbSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">  BTB</a>
                    <ul class="collapse list-unstyled" id="btbSubmenu">
                        <li>
                            <a href="btb.php"> <i class="fas fa-road"></i>  Buat BTB</a>
                        </li>
                        <li>
                            <a href="laporan-btb.php"> <i class="fas fa-shopping-bag"></i>  Laporan BTB</a>
                        </li>
                        <li>
                            <a href="#">  -</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#apSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">  AP</a>
                    <ul class="collapse list-unstyled" id="apSubmenu">
                        <li>
                            <a href="ap.php"> <i class="fas fa-road"></i>  Buat AP</a>
                        </li>
                        <li>
                            <a href="laporan-ap.php"> <i class="fas fa-shopping-bag"></i>  Laporan AP</a>
                        </li>
                        <li>
                            <a href="#">  -</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#arSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">  AR</a>
                    <ul class="collapse list-unstyled" id="arSubmenu">
                        <li>
                            <a href="ar.php"> <i class="fas fa-road"></i>  Buat AR</a>
                        </li>
                        <li>
                            <a href="laporan-ar.php"> <i class="fas fa-shopping-bag"></i>  Laporan AR</a>
                        </li>
                        <li>
                            <a href="#">  -</a>
                        </li>
                    </ul>
                </li>
                <br/>
                <br/>
                <li>
                    <!-- <a href="laporan.php">Laporan</a> -->
                </li>
                <li>
                    <a href="#">About Me</a>
                </li>
            </ul>

            <!-- <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul> -->
        </nav>


    <!-- <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="index.php"> <i class="fas fa-house-damage"></i>Home</a></li>
            <li><a href="input-penjualan.php"> <i class="fas fa-journal-whills"></i>Buat  Produk</a></li>
             <li><a href="cari-edit-penjualan.php"> <i class="icon-form"></i>Laporan Bahan Produk</a></li> -->
            <!-- <li><a href="laporan-bahan-produk.php"> <i class="icon-grid"></i>Laporan Produk</a></li> -->
            <!-- <li><a href="customer.php"> <i class="fas fa-user-plus"></i>Master Customer</a></li>
            <li><a href="master-barang.php"> <i class="fas fa-shopping-bag"></i>Master Barang</a></li>
            <li><a href="penawaran-hd.php"> <i class="icon-form"></i>Penawaran HD XXX</a></li>
            <li><a href="penawaran-dtl.php"> <i class="fas fa-cash-register"></i>Penawaran</a></li>
            <li><a href="sales-order1.php"> <i class="fas fa-file-signature"></i>Sales OrderXXX</a></li>
            <li><a href="sales-order.php"> <i class="fas fa-file-signature"></i>Sales Order</a></li>
            <li><a href="purchase-order.php"> <i class="fas fa-comment-dollar"></i>Purchase Order</a></li>
            <li><a href="master-suplier.php"> <i class="fas fa-truck"></i>Master Suplier</a></li>
            <li><a href="surat-jalan.php"> <i class="fas fa-road"></i>Surat Jalan</a></li> -->
    <!-- GAK DIPAKE -->
    <!-- <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Example dropdown </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
              </ul>
            </li>
            <li><a href="login.html"> <i class="icon-interface-windows"></i>Login page                             </a></li>
            <li> <a href="#"> <i class="icon-mail"></i>Demo
                <div class="badge badge-warning">6 New</div></a></li>
          </ul>
        </div>
        <div class="admin-menu">
          <h5 class="sidenav-heading">Second menu</h5>
          <ul id="side-admin-menu" class="side-menu list-unstyled"> 
            <li> <a href="#"> <i class="icon-screen"> </i>Demo</a></li>
            <li> <a href="#"> <i class="icon-flask"> </i>Demo
                <div class="badge badge-info">Special</div></a></li>
            <li> <a href=""> <i class="icon-flask"> </i>Demo</a></li>
            <li> <a href=""> <i class="icon-picture"> </i>Demo</a></li> -->
    <div id="content">
        <nav class="navbar navme navbar-expand-lg">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    
                    
                </div>
        </nav>









            