<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Artificial Intelligent</title>
    <!-- Bootstrap Styles-->
    <link href="<?= base_url()?>assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="<?= base_url()?>assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
    <link href="<?= base_url()?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="<?= base_url()?>assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
 <!--   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->
<style>
.scroll{
  background: #E8E8E8;
  padding: 10px;
  overflow-x: hidden;
  overflow-y: scroll;
  /*border-right:solid 20px #fff;*/
  position: fixed;

}

.hov:hover { 
color: #FFFFFF;
background-color: transparent;
text-decoration:none;
}

#pageku{
  margin:10px 20px 10px 0px;  
  background-color:transparent; 
  padding: 15px 30px;
  min-height: 400px;

}
</style>

</head>
<body style="background:#DEDEDE">
    <div id="wrapper" >
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header" >
                <a href="<?php echo site_url()?>/c_index"><div class="navbar-brand" style="background-color:#007FFF"><strong>Artificial Intelligent</strong></div></a>
            </div>

            <ul class="nav navbar-top navbar-right" style="margin-right:2%;">
                <li>
                    <p>
                        <strong style="font-size:20px;color:#FFFFFF;" class="hov">Peringkasan Teks Otomatis Artikel Berita Kesehatan</strong>
                    </p>
                </li>
            </ul>
        </nav>
        
        <!--/. NAV TOP  -->