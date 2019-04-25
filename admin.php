<!DOCTYPE html>
<html lang="en">
<?php include 'views/header.php'; ?>
<body>
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a href="#" class="brand">
                <img src="images/logo.png" width="120" height="40" alt="Logo"/>
                <!-- This is website logo -->
            </a>
            <!-- Navigation button, visible on small resolution -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <i class="icon-menu"></i>
            </button>
            <!-- Main navigation -->
            <div class="nav-collapse collapse pull-right">
                <ul class="nav" id="top-navigation">
                    <li class="active"><a href="#home">Home</a></li>
                    <li><a href="#service">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#clients">Clients</a></li>
                    <li><a href="#price">Price</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <!-- End main navigation -->
        </div>
    </div>
</div>

<div id="price" class="section secondary-section">
    <div class="container">
        <div class="title">
            <h1>Cinema App Admin</h1>
        </div>
    </div>
</div>

<div class="section third-section">
    <div class="container newsletter">

        <div class="centered">
            <form class="inline-form">
                <input type="email" name="email" id="nlmail" class="span8" placeholder="Enter your email" required/>
                <input type="email" name="email" id="nlmail" class="span8" placeholder="Enter your email" required/>
            </form>
            <a href="#contact" class="button">LOGIN</a>
        </div>
    </div>
</div>

<!-- Footer section start -->
<div class="footer">
    <?php include 'views/footer.php'; ?>
</div>
<!-- Footer section end -->
<!-- ScrollUp button start -->
<div class="scrollup">
    <a href="#">
        <i class="icon-up-open"></i>
    </a>
</div>
<?php include 'views/javaScript.php' ?>
<script>
    var host = 'http://localhost:63342/CinemaApp'

    function login() {
        var username = $('#username').val()
        var password = $('#password').val()
        $.ajax({
            type: "post",
            url: host + "/yang.php?action=admin_login",
            data: {"adminname": username, "password": password},
            cache: false,
            async: false,
            dataType: "json",
            success: function (data) {
                if (true === data.data) {
                    alert("login success！");
                } else {
                    alert( data.info.message);
                }
                $('#loginModal').modal('hide')
            },
            error: function () {
                alert("server error");
            }
        })
    }
</script>
</body>
</html>