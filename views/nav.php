<?php //session_start(); ?>
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a href="index.php" class="brand">
                <img src="images/logo.png" width="120" height="40" alt="Logo" />
                <!-- This is website logo -->
            </a>
            <!-- Navigation button, visible on small resolution -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <i class="icon-menu"></i>
            </button>
            <!-- Main navigation -->
            <div class="nav-collapse collapse pull-right">
                <ul class="nav" id="top-navigation">
<!--                    <li class="active"><a href="index.php">Home</a></li>-->
                    <?php
                    if (isset($_SESSION['username'])){
                        ?><li><a href="user.php"><?php echo $_SESSION['username']; ?></a></li>
                        <li><a href="#" onclick="logout()">Logout</a></li>
                        <?php
                    }
                    else{
                        ?><li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- End main navigation -->
        </div>
    </div>
</div>
<script>
    function logout() {
        $.ajax({
            type: "post",
            url: "yang.php?action=user_logout",
            data: {},
            cache: false,
            async: false,
            dataType: "json",
            success: function (data) {
                if(data.code === 0){
                    alert("logout success");
                    window.location.href ="index.php";
                }
            },
            error: function () {
                alert("server error");
            }
        })
    }
</script>