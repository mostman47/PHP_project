<?php
/**
 * Created by PhpStorm.
 * User: pham
 * Date: 2/10/14
 * Time: 12:51 PM
 */
if(!session_id()) session_start();
if(!isset($_SESSION["loginUser"]))
    header("Location: index.php");
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

    <form id="uploadForm" name="uploadForm" method="post">

        <span id="resultSpan" class="label label-success" ></span>

        <blockquote>
            <cite>Personal Information</cite>
            <div class="row marketing">
                <div class="col-lg-6">
                    <label>First Name*</label> <input type="text"
                                                      class="form-control" id="firstName" name="firstName"
                                                      placeholder="Enter first-name" required>
                </div>
                <div class="col-lg-6">
                    <label>Last Name*</label> <input type="text"
                                                     class="form-control" id="lastName" name="lastName"
                                                     placeholder="Enter last-name" required>
                </div>
            </div>
            <div class="row marketing">
                <div class="col-lg-6">
                    <label>Email*</label> <input type="email"
                                                 class="form-control" id="email" name="email"
                                                 placeholder="Enter Email" required>
                </div>
                <div class="col-lg-6">
                    <label>Phone*</label> <input type='tel'
                                                 class="form-control" id="phone" name="phone"
                                                 placeholder="Enter Phone Number" required pattern="\d{3}[\-]\d{3}[\-]\d{4}"
                                                 oninvalid="setCustomValidity('Required. PLease match: ###-###-####')"
                                                 onchange="try{setCustomValidity('')}catch(e){}">

                </div>
            </div>
        </blockquote>
        <blockquote>
            <cite>Experiences</cite>
            <div class="row marketing">
                <div class="col-lg-12">
                    <label>Skills*</label>

                    <textarea class="form-control" rows="3" id="skills" name="skills"
                              required></textarea>
                </div>
            </div>
            <div class="row marketing">
                <div class="col-lg-12">
                    <label>Description*</label>

                    <textarea class="form-control" rows="3" id="description"
                              name="description" required></textarea>
                </div>
            </div>

            <div class="row marketing">
                <div class="col-lg-12">

                    <label>Resume*</label> <input type="file"
                                                  id="res_URL" name="res_URL" required>
                </div>

            </div>
        </blockquote>
        <div class="row marketing">
            <div class="col-lg-12">
                <button id="submitBt" name="submitBt" class="btn btn-default">Submit</button>
                <button id="resetBt" name="resetBt" type="reset"
                        class="btn btn-default">Reset</button>
            </div>

        </div>

    </form>

    <?php require 'template/footer.php'; ?>
</div>
<!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>

</html>