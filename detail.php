<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'views/header.php'; ?>
<style>
    .thead{
        padding:10px 5px;
    }
</style>
<body>

<?php include 'views/nav.php'; ?>

<div id="price" class="section secondary-section">
    <div class="container">
        <div class="title">
            <h1>Cinema App Detail</h1>
        </div>
        <table class="table" style=";width: 80%;margin: 0 auto;border: 1px solid #444444;">
            <thead class="thead" style="font-weight: bold;font-size: 20px;
            padding: 10px 5px;color: #222222;">
            <tr>
                <td>Title</td>
                <td>Genre</td>
                <td>Director</td>
                <td>RunTime</td>
                <td>Year</td>
                <td>Price</td>
            </tr>
            </thead>
            <tbody id="movie-holder" style="color: #222222;">
            </tbody>
        </table>
        <div class="title">
            <h1>Buy it!</h1>
            <?php
            if (isset($_SESSION['username'])){
                ?>
                <a><div class="button button-primary" style="cursor: pointer;" onclick="buy()">BUY! BUY! BUY!</div></a>
                <?php
            }
            else{
                ?>
                <a><div class="button button-primary">Login to buy</div></a>
                <?php
            }
            ?>
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
    $(document).ready(function(){
        var movie_id =  <?php echo $_GET['id']; ?>;
        $.ajax({
            type: "post",
            url: "yang.php?action=get_movie",
            data: {"id": movie_id},
            cache: false,
            async: false,
            dataType: "json",
            success: function (data) {
                if(data.code === 0){
                    var item = data.data;
                    $("#movie-holder").append(
                        "<tr>" +
                        "<td>" + item.title + "</a></td>" +
                        "<td>" + item.genre + "</td>" +
                        "<td>" + item.director + "</td>" +
                        "<td>" + item.runtime + "</td>" +
                        "<td>" + item.year + "</td>" +
                        "<td>" + item.price + "</td>" +
                        "</tr>"
                    );
                }
            },
            error: function () {
                alert("server error");
            }
        })
    });
    function buy(){
        var movie_id =  <?php echo $_GET['id']; ?>;
        var username =  "<?php if(isset($_SESSION['user_id'])) echo $_SESSION['username']; ?>";
        $.ajax({
            type: "post",
            url: "yang.php?action=buy",
            data: {"movie_id": movie_id, "username": username},
            cache: false,
            async: false,
            dataType: "json",
            success: function (data) {
                if(data.code === 0){
                    alert("Buy success!");
                    window.location.href="user.php";
                }
            },
            error: function () {
                alert("server error");
            }
        })
    }
</script>
</body>
</html>