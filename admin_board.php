<?php session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'views/header.php'; ?>
<style>
     tr>td{
        padding: 10px 5px;
        border:1px solid grey;
    }
</style>
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
            <div class="nav-collapse collapse pull-right">
                <ul class="nav" id="top-navigation">
            <li><a href="#" onclick="logout()">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="price1" class="section secondary-section">
    <div class="container">
        <div class="title">
            <h1>Cinema App Admin</h1>
        </div>
    </div>
</div>

<div class="section" style="color: #222222;background: #eeeeee">
    <div class="container">
        <div>

            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#home">Movies</a></li>
            </ul>

            <div class="tab-content" style="min-height: 500px;">
                <div class="accordion" id="accordion2" style="border: 2px dashed darkgray">
                    <button onclick="show_add()">Add Movie</button>
                    <div id="show_add" style="display: none;">
                        <table class="table" style=";width: 80%;margin: 0 auto;">
                            <thead class="thead" style="color: #222222;font-weight: bold;font-size: 20px;">
                            <tr>
                                <td>Title</td>
                                <td>Genre</td>
                                <td>Director</td>
                                <td>RunTime</td>
                                <td>Year</td>
                                <td>Price</td>
                            </tr>
                            </thead>
                            <tbody id="add-holder">
                            <tr>
                                <td><input type="text" id="title" style="width: 120px" required></td>
                                <td><input type="text" id="genre" style="width: 120px" required></td>
                                <td><input type="text" id="director" style="width: 120px" required></td>
                                <td><input type="text" id="runtime" style="width: 120px" required></td>
                                <td><input type="text" id="year" style="width: 120px" required></td>
                                <td><input type="text" id="price" style="width: 120px" required></td>
                            </tr>
                            </tbody>
                        </table>
                        <button class="button-primary" onclick="add_movie()">Submit</button>
                    </div>
                </div>
                <div class="tab-pane active" id="home">
                    <table class="table" style=";width: 80%;margin: 0 auto;">
                        <thead class="thead" style="color: #222222;font-weight: bold;font-size: 20px;">
                        <tr>
                            <td>Title</td>
                            <td>Genre</td>
                            <td>Director</td>
                            <td>RunTime</td>
                            <td>Year</td>
                            <td>Price</td>
                            <td>Update</td>
                            <td>Del</td>
                        </tr>
                        </thead>
                        <tbody id="movie-holder">
                        </tbody>
                    </table>

                    <div class="accordion" id="accordion2" style="border: 2px dashed darkgray">
                        <div id="show_update" style="display: none;">
                            <table class="table" style=";width: 80%;margin: 0 auto;">
                                <thead class="thead" style="color: #222222;font-weight: bold;font-size: 20px;">
                                <tr>
                                    <td>Id</td>
                                    <td>Title</td>
                                    <td>Genre</td>
                                    <td>Director</td>
                                    <td>RunTime</td>
                                    <td>Year</td>
                                    <td>Price</td>
                                </tr>
                                </thead>
                                <tbody id="update-holder">
                                <tr>
                                    <td><input type="text" id="id2" style="width: 120px" required></td>
                                    <td><input type="text" id="title2" style="width: 120px" required></td>
                                    <td><input type="text" id="genre2" style="width: 120px" required></td>
                                    <td><input type="text" id="director2" style="width: 120px" required></td>
                                    <td><input type="text" id="runtime2" style="width: 120px" required></td>
                                    <td><input type="text" id="year2" style="width: 120px" required></td>
                                    <td><input type="text" id="price2" style="width: 120px" required></td>
                                </tr>
                                </tbody>
                            </table>
                            <button class="button-primary" onclick="update_movie()">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="profile">1</div>
                <div class="tab-pane" id="messages">3</div>
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
    });
</script>
<script>
    var movies = {};
    $(document).ready(function (e) {
        $.ajax({
            type: 'POST',
            url: "yang.php",
            data: {action: "list_movies"},
            success: function (data) {
                data = JSON.parse(data);
                var arr = data.data;
                for(var i=0;i<arr.length;i++){
                    var item = arr[i];
                    movies[item.id] = item;
                    $("#movie-holder").append(
                        "<tr>" +
                        "<td>" + item.title + "</a></td>" +
                        "<td>" + item.genre + "</td>" +
                        "<td>" + item.director + "</td>" +
                        "<td>" + item.runtime + "</td>" +
                        "<td>" + item.year + "</td>" +
                        "<td>" + item.price + "</td>" +
                        "<td><button onclick='update(this)'>Update</button>" +
                        "<input type='hidden' value='" + item.id + "'></td>" +
                        "<td><button onclick='del(this)'>Delete</button>" +
                        "<input type='hidden' value='" + item.id + "'></td>" +
                        "</tr>"
                    );
                }
            }
        })
    })
</script>
<script>
    function show_add() {
        $("#show_add").css("display", "block")
    }
    function logout() {
        $.ajax({
            type: "post",
            url: "yang.php?action=admin_logout",
            data: {},
            cache: false,
            async: false,
            dataType: "json",
            success: function (data) {
                if(data.code === 0){
                    alert("logout success");
                    window.location.href ="admin.php";
                }
            },
            error: function () {
                alert("server error");
            }
        })
    }
</script>
<script>
    function add_movie() {
        var title = $('#title').val()
        var genre = $('#genre').val()
        var director = $('#director').val()
        var runtime = $('#runtime').val()
        var year = $('#year').val()
        var price = $('#price').val()
        $.ajax({
            type: "post",
            url: "yang.php?action=add",
            data: {
                "title": title,
                "genre": genre,
                "director": director,
                "runtime": runtime,
                "year": year,
                "price": price
            },
            cache: false,
            async: false,
            dataType: "json",
            success: function (data) {
                if (0 === data.code) {
                    alert("add success！");
                    window.location.reload();
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

    function update(obj) {
        var movid_id = $(obj).siblings("input").eq(0).val();
//        console.log(movies[movid_id]);
        $("#show_update").css("display", "block");
        $("#id2").val(movies[movid_id].id);$("#id2").attr("readonly", "true");
        $('#title2').val(movies[movid_id].title)
        $('#genre2').val(movies[movid_id].genre)
        $('#director2').val(movies[movid_id].director)
        $('#runtime2').val(movies[movid_id].runtime)
        $('#year2').val(movies[movid_id].year)
        $('#price2').val(movies[movid_id].price)
    }
    var to_update={};
    function update_movie() {
        var id = $('#id2').val()
        var title = $('#title2').val()
        var genre = $('#genre2').val()
        var director = $('#director2').val()
        var runtime = $('#runtime2').val()
        var year = $('#year2').val()
        var price = $('#price2').val()
        $.ajax({
            type: "post",
            url: "yang.php?action=update",
            data: {
                "id": id,
                "title": title,
                "genre": genre,
                "director": director,
                "runtime": runtime,
                "year": year,
                "price": price
            },
            cache: false,
            async: false,
            dataType: "json",
            success: function (data) {
                if (0 === data.code) {
                    alert("update success！");
                    window.location.reload();
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

    function del(obj) {
        var movid_id = $(obj).siblings("input").eq(0).val();

        var r = confirm("Are you sure to delete?");
        if(r){
            $.ajax({
                type: "post",
                url: "yang.php?action=delete",
                data: {
                    "id": movid_id
                },
                cache: false,
                async: false,
                dataType: "json",
                success: function (data) {
                    if (0 === data.code) {
                        alert("delete success！");
                        window.location.reload();
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
    }
</script>
</body>
</html>