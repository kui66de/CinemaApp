<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'views/header.php'; ?>
<head>
    <style>

        table {
            max-width: 100%;
            background-color: transparent;
            border-collapse: collapse;
            border-spacing: 0;
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            padding: 8px;
            line-height: 20px;
            text-align: left;
            vertical-align: top;
            border-top: 1px solid #dddddd;
        }

        .table th {
            font-weight: bold;
        }

        .table thead th {
            vertical-align: bottom;
        }

        .table caption + thead tr:first-child th,
        .table caption + thead tr:first-child td,
        .table colgroup + thead tr:first-child th,
        .table colgroup + thead tr:first-child td,
        .table thead:first-child tr:first-child th,
        .table thead:first-child tr:first-child td {
            border-top: 0;
        }

        .table tbody + tbody {
            border-top: 2px solid #dddddd;
        }

        .table .table {
            background-color: #eeeeee;
        }

        .table-condensed th,
        .table-condensed td {
            padding: 4px 5px;
        }

        .table-bordered {
            border: 1px solid #dddddd;
            border-collapse: separate;
            *border-collapse: collapse;
            border-left: 0;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }

        .table-bordered th,
        .table-bordered td {
            border-left: 1px solid #dddddd;
            border-top: 1px solid #dddddd;
            padding: 15px 2px;
        }

        .table-bordered caption + thead tr:first-child th,
        .table-bordered caption + tbody tr:first-child th,
        .table-bordered caption + tbody tr:first-child td,
        .table-bordered colgroup + thead tr:first-child th,
        .table-bordered colgroup + tbody tr:first-child th,
        .table-bordered colgroup + tbody tr:first-child td,
        .table-bordered thead:first-child tr:first-child th,
        .table-bordered tbody:first-child tr:first-child th,
        .table-bordered tbody:first-child tr:first-child td {
            border-top: 0;
        }

        .table-bordered thead:first-child tr:first-child > th:first-child,
        .table-bordered tbody:first-child tr:first-child > td:first-child,
        .table-bordered tbody:first-child tr:first-child > th:first-child {
            -webkit-border-top-left-radius: 4px;
            border-top-left-radius: 4px;
            -moz-border-radius-topleft: 4px;
        }

        .table-bordered thead:first-child tr:first-child > th:last-child,
        .table-bordered tbody:first-child tr:first-child > td:last-child,
        .table-bordered tbody:first-child tr:first-child > th:last-child {
            -webkit-border-top-right-radius: 4px;
            border-top-right-radius: 4px;
            -moz-border-radius-topright: 4px;
        }

        .table-bordered thead:last-child tr:last-child > th:first-child,
        .table-bordered tbody:last-child tr:last-child > td:first-child,
        .table-bordered tbody:last-child tr:last-child > th:first-child,
        .table-bordered tfoot:last-child tr:last-child > td:first-child,
        .table-bordered tfoot:last-child tr:last-child > th:first-child {
            -webkit-border-bottom-left-radius: 4px;
            border-bottom-left-radius: 4px;
            -moz-border-radius-bottomleft: 4px;
        }

        .table-bordered thead:last-child tr:last-child > th:last-child,
        .table-bordered tbody:last-child tr:last-child > td:last-child,
        .table-bordered tbody:last-child tr:last-child > th:last-child,
        .table-bordered tfoot:last-child tr:last-child > td:last-child,
        .table-bordered tfoot:last-child tr:last-child > th:last-child {
            -webkit-border-bottom-right-radius: 4px;
            border-bottom-right-radius: 4px;
            -moz-border-radius-bottomright: 4px;
        }

        .table-bordered tfoot + tbody:last-child tr:last-child td:first-child {
            -webkit-border-bottom-left-radius: 0;
            border-bottom-left-radius: 0;
            -moz-border-radius-bottomleft: 0;
        }

        .table-bordered tfoot + tbody:last-child tr:last-child td:last-child {
            -webkit-border-bottom-right-radius: 0;
            border-bottom-right-radius: 0;
            -moz-border-radius-bottomright: 0;
        }

        .table-bordered caption + thead tr:first-child th:first-child,
        .table-bordered caption + tbody tr:first-child td:first-child,
        .table-bordered colgroup + thead tr:first-child th:first-child,
        .table-bordered colgroup + tbody tr:first-child td:first-child {
            -webkit-border-top-left-radius: 4px;
            border-top-left-radius: 4px;
            -moz-border-radius-topleft: 4px;
        }

        .table-bordered caption + thead tr:first-child th:last-child,
        .table-bordered caption + tbody tr:first-child td:last-child,
        .table-bordered colgroup + thead tr:first-child th:last-child,
        .table-bordered colgroup + tbody tr:first-child td:last-child {
            -webkit-border-top-right-radius: 4px;
            border-top-right-radius: 4px;
            -moz-border-radius-topright: 4px;
        }

        .table-striped tbody > tr:nth-child(odd) > td,
        .table-striped tbody > tr:nth-child(odd) > th {
            background-color: #f9f9f9;
        }

        .table-hover tbody tr:hover > td,
        .table-hover tbody tr:hover > th {
            background-color: #f5f5f5;
        }

        table td[class*="span"],
        table th[class*="span"],
        .row-fluid table td[class*="span"],
        .row-fluid table th[class*="span"] {
            display: table-cell;
            float: none;
            margin-left: 0;
        }

        .table td.span1,
        .table th.span1 {
            float: none;
            width: 44px;
            margin-left: 0;
        }

        .table td.span2,
        .table th.span2 {
            float: none;
            width: 124px;
            margin-left: 0;
        }

        .table td.span3,
        .table th.span3 {
            float: none;
            width: 204px;
            margin-left: 0;
        }

        .table td.span4,
        .table th.span4 {
            float: none;
            width: 284px;
            margin-left: 0;
        }

        .table td.span5,
        .table th.span5 {
            float: none;
            width: 364px;
            margin-left: 0;
        }

        .table td.span6,
        .table th.span6 {
            float: none;
            width: 444px;
            margin-left: 0;
        }

        .table td.span7,
        .table th.span7 {
            float: none;
            width: 524px;
            margin-left: 0;
        }

        .table td.span8,
        .table th.span8 {
            float: none;
            width: 604px;
            margin-left: 0;
        }

        .table td.span9,
        .table th.span9 {
            float: none;
            width: 684px;
            margin-left: 0;
        }

        .table td.span10,
        .table th.span10 {
            float: none;
            width: 764px;
            margin-left: 0;
        }

        .table td.span11,
        .table th.span11 {
            float: none;
            width: 844px;
            margin-left: 0;
        }

        .table td.span12,
        .table th.span12 {
            float: none;
            width: 924px;
            margin-left: 0;
        }

        .table tbody tr.success > td {
            background-color: #dff0d8;
        }

        .table tbody tr.error > td {
            background-color: #f2dede;
        }

        .table tbody tr.warning > td {
            background-color: #fcf8e3;
        }

        .table tbody tr.info > td {
            background-color: #d9edf7;
        }

        .table-hover tbody tr.success:hover > td {
            background-color: #d0e9c6;
        }

        .table-hover tbody tr.error:hover > td {
            background-color: #ebcccc;
        }

        .table-hover tbody tr.warning:hover > td {
            background-color: #faf2cc;
        }

        .table-hover tbody tr.info:hover > td {
            background-color: #c4e3f3;
        }
    </style>
</head>
<body>
<?php include 'views/nav.php'; ?>
<!-- Start home section -->
<div id="home">
    <!-- Start cSlider -->
    <div id="da-slider" class="da-slider">
        <div class="triangle"></div>
        <!-- mask elemet use for masking background image -->
        <div class="mask"></div>
        <!-- All slides centred in container element -->
        <div class="container">
            <!-- Start first slide -->
            <div class="da-slide">
                <h2 class="fittext2">Welcome to Happy Cinema</h2>
                <h4>Watch you like!</h4>
                <p>Join us and find what you like!</p>
                <a href="#" class="da-link button">Read more</a>
                <div class="da-img">
                    <img src="images/Slider01.png" alt="image01" width="320">
                </div>
            </div>
            <!-- End first slide -->
            <!-- Start second slide -->
            <div class="da-slide">
                <h2>Easy Watching</h2>
                <h4>All platform, Mobile APP is Coming!</h4>
                <p>Know your self.</p>
                <a href="#" class="da-link button">Read more</a>
                <div class="da-img">
                    <img src="images/Slider02.png" width="320" alt="image02">
                </div>
            </div>
            <!-- End second slide -->
            <!-- Start third slide -->
            <div class="da-slide">
                <h2>Revolution</h2>
                <h4>Suggest beyond what you LIKE!</h4>
                <p>Personalized recommendation will be used later in the system.</p>
                <a href="#" class="da-link button">Read more</a>
                <div class="da-img">
                    <img src="images/Slider03.png" width="320" alt="image03">
                </div>
            </div>
            <!-- Start third slide -->
            <!-- Start cSlide navigation arrows -->
            <div class="da-arrows">
                <span class="da-arrows-prev"></span>
                <span class="da-arrows-next"></span>
            </div>
            <!-- End cSlide navigation arrows -->
        </div>
    </div>
</div>
<!-- End home section -->
<!-- Service section start -->
<div class="section primary-section" id="service">
    <div class="container">
        <!-- Start title section -->
        <div class="title">
            <h1>Movie List</h1>
            <!-- Section's title goes here -->
            <p>Let's see what we have!</p>
            <!--Simple description for section goes here. -->
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="centered service">

                    <div class="zoom-in" style="display: inline-block;width:100%">

                        <table class="table-bordered" style=";width: 80%;margin: 0 auto;">
                            <thead style="color: white;font-weight: bold;font-size: 1.5em;padding: 10px 5px;">
                            <tr>
                                <td>Title</td>
                                <td>Genre</td>
                                <td>Director</td>
                                <td>RunTime</td>
                                <td>Year</td>
                                <td>Price</td>
                            </tr>
                            </thead>
                            <tbody id="movie-holder">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service section end -->

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
<?php include 'views/javaScript.php'?>
<script>
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
                    $("#movie-holder").append(
                        "<tr>" +
                        "<td><a href='detail.php?id=" + item.id + "' style='color: lightblue;text-decoration: underline'>" + item.title + "</a></td>" +
                        "<td>" + item.genre + "</td>" +
                        "<td>" + item.director + "</td>" +
                        "<td>" + item.runtime + "</td>" +
                        "<td>" + item.year + "</td>" +
                        "<td>" + item.price + "</td>" +
                        "</tr>"
                    );
                }
            }
        })
    })
</script>
</body>

</html>