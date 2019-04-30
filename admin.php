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
                    <li class="active"><a href="/">Home</a></li>
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

        <div>
            <form >
                <div class="centered">
                    <input type="text" name="email" id="username" style="margin: 0 auto;"
                           placeholder="Enter your account" required/>
                </div>
                <div class="centered">
                    <input type="password" name="email" id="password"
                           placeholder="Enter your password" required/>
                </div>
            </form>
            <div class="centered">
            <a href="##" onclick="login()" class="button" style="background: white;color: #000;">LOGIN</a>
            </div>
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
            url: "yang.php?action=admin_login",
            data: {"adminname": username, "password": password},
            cache: false,
            async: false,
            dataType: "json",
            success: function (data) {
                if (0 === data.code) {
                    alert("login success！");
                    window.location.href="admin_board.php"
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