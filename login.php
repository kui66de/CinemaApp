<!DOCTYPE html>
<html lang="en">
<?php include 'views/header.php'; ?>
<body>

<?php include 'views/nav.php'; ?>

<div id="price" class="section secondary-section">
    <div class="container">
        <div class="title">
            <h1>Cinema App Login</h1>
        </div>
    </div>
</div>

<div class="section third-section">
    <div class="container newsletter">

        <div>
            <form >
                <div class="centered">
                    <input type="text" name="username" id="username" style="margin: 0 auto;"
                           placeholder="Enter your username" required/>
                </div>
                <div class="centered">
                    <input type="password" name="password" id="password"
                           placeholder="Enter your password" required/>
                </div>
            </form>
            <div class="centered">
            <a href="##" onclick="login()" class="button" style="background: white;color: #000;">LOGIN</a>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
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

    function login() {
        var username = $('#username').val()
        var password = $('#password').val()
        $.ajax({
            type: "post",
            url: "yang.php?action=user_login",
            data: {"username": username, "password": password},
            cache: false,
            async: false,
            dataType: "json",
            success: function (data) {
                if (0 === data.code) {
                    alert("login success！");
                    window.location.href="index.php";
                } else {
                    alert( data.info.message);
                }
//                $('#loginModal').modal('hide')
            },
            error: function () {
                alert("server error");
            }
        })
    }
</script>
</body>
</html>