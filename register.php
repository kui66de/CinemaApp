<!DOCTYPE html>
<html lang="en">
<?php include 'views/header.php'; ?>
<body>

<?php include 'views/nav.php'; ?>

<div id="price" class="section secondary-section">
    <div class="container">
        <div class="title">
            <h1>Cinema App Register</h1>
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
                    <input type="password" name="email" id="password"
                           placeholder="Enter your password" required/>
                </div>
                <div class="centered">
                    <input type="password" name="email" id="password_confirm"
                           placeholder="Enter your password" required/>
                </div>
                <div class="centered">
                    <input type="text" name="nickname" id="nickname" style="margin: 0 auto;"
                           placeholder="Enter your nickname" required/>
                </div>
            </form>
            <div class="centered">
            <a href="##" onclick="reg()" class="button" style="background: white;color: #000;">REGISTER</a>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
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

    function reg() {
        var username = $('#username').val()
        var password = $('#password').val()
        var password_confirm = $('#password_confirm').val()
        var nickname = $('#nickname').val()
        $.ajax({
            type: "post",
            url: "yang.php?action=user_register",
            data: {"username": username, "password": password,
            "password_confirm": password_confirm,
            "nickname": nickname},
            cache: false,
            async: false,
            dataType: "json",
            success: function (data) {
                if (0 === data.code) {
                    alert("register success！");
                    window.location.href="login.php"
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