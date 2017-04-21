<?php
    session_start();
    if ( $_SESSION['Login'] < 1) {
        $_SESSION['Login'] = 0;
        header("Location: login.php");
    }
    $username = $_SESSION['User'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Management Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a href="index.php">
                    <image src="image/latest_logo.png" style="height: 45px; width: 45px; margin-left: 12px; margin-top: 2px;"/>
                </a>
            </div>
            <?php
                if ($_SESSION['Login'] == 1) {
                    echo "
                        <ul class=\"nav navbar-right top-nav\">
                            <li class=\"dropdown\">
                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-user\"></i>".$username."<b class=\"caret\"></b></a>
                                <ul class=\"dropdown-menu\">
                                    <li>
                                        <a href=\"#\"><i class=\"fa fa-fw fa-user\"></i> Profile</a>
                                    </li>
                                    <li class=\"divider\"></li>
                                    <li>
                                        <a href=\"logout.php\"><i class=\"fa fa-fw fa-power-off\"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    ";
                }
            ?>
            <!-- Top Menu Items -->
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li class = "active">
                        <a href="display_log.php"><i class="fa fa-fw fa-table"></i> Error Display</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            多利多資
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
       
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            $log_data = file("log.txt");
                            $id = 0;
                            
                            echo "<table class=\"table table-hover\">";
                            echo "<tr class=\"info\"><td>#</td><td>Error message</td></tr>";
                            foreach ($log_data as $datas) {
                                echo "<tr class=\"danger\"><td>".$id++."</td><td>".$datas."</td></tr>";
                            }
                            echo "</table>"
                        ?>
                    </div>
                </div>
                 <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- # page-wrapper-->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
