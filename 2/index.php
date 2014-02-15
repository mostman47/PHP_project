<?php
/**
 * Created by PhpStorm.
 * User: pham
 * Date: 2/3/14
 * Time: 10:49 AM
 */
if(!session_id()) session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="template/css/jumbotron-narrow.css" rel="stylesheet">
    <?php require 'template/head.php'; ?>

</head>


<body>
<div class="container">
    <?php require 'template/header.php'; ?>
    <div class="jumbotron">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <h1>Welcome</h1>

                <p class="lead">
                    to <b>Resume Uploader</b>
                </p>
            </div>
            <div class="col-xs-6 col-md-4">
                <img src="template/image/Upload-file.png" alt="uploadImage"
                     class="img-rounded" style="width: 100px">
            </div>
        </div>
    </div>
    <blockquote>
        <div class="row">
            <?php
            $loginUser = $_SESSION["loginUser"];
            if(!$loginUser)
 {
                        ?>
                        <div class="col-md-8 col-md-offset-3">
                            <form id="loginForm" class="form-horizontal"
                                  action="controller/login.php" method="get">
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon">&#64;</span> <input type="text"
                                                                                                class="form-control"
                                                                                                placeholder="Username"
                                                                                                id="username"
                                                                                                name="username">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon">&hearts;&hearts;</span> <input
                                                type="password" class="form-control" placeholder="Password"
                                                id="password" name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <?php
										if ($_SESSION["loginError"]) {
                                            ?>
                                            <span id="error" class=" help-block"><small><?php echo $_SESSION["loginError"] ?></small></span>
                                        <?php
                                        }
								?>
                                        <button type="submit" class="btn btn-default">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php
                   } else {
                        ?>
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <div class="row">
                                <h1>
                                    Hi <strong><?php echo $loginUser ?></strong>!
                                </h1>
                            </div>
                            <div class="row">
                                <a href="upload">
                                    <button type="button" class="btn btn-success">Upload</button>
                                </a>
                                <a href="search">
                                    <button type="button" class="btn btn-success">Search</button>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
				?>
        </div>
    </blockquote>

    <?php require 'template/footer.php'; ?>

</div>
<!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>

</html>