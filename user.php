<?php session_start();
if(empty($_SESSION['user_id'])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'views/header.php'; ?>
<body>

<?php include 'views/nav.php'; ?>
<div id="price" class="section secondary-section">
    <div class="container">
        <div class="title">
            <h1>Cinema App User</h1>
        </div>
    </div>
</div>

<div class="section" style="color: #222222;background: #eeeeee">
    <div class="container">
        <div>

            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#home">Movies I Bought</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="home">
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
                            <td>BuyTime</td>
                        </tr>
                        </thead>
                        <tbody id="movie-holder" style="color: #222222;">
                        </tbody>
                    </table>
                </div>
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
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
    $(document).ready(function(){
        $.ajax({
            type: "post",
            url: "yang.php?action=user_bought",
            data: {},
            cache: false,
            async: false,
            dataType: "json",
            success: function (data) {
                if(data.code === 0){
                    var arr = data.data;
                    for(var i=0;i<arr.length;i++){
                        var item = arr[i];
                        $("#movie-holder").append(
                            "<tr>" +
                            "<td>" + item.title + "</a></td>" +
                            "<td>" + item.genre + "</td>" +
                            "<td>" + item.director + "</td>" +
                            "<td>" + item.runtime + "</td>" +
                            "<td>" + item.year + "</td>" +
                            "<td>" + item.price + "</td>" +
                            "<td>" + item.buy_time + "</td>" +
                            "</tr>"
                        );
                    }
                }
            },
            error: function () {
                alert("server error");
            }
        })
    });
</script>
</body>
</html>