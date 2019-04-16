<?php
// 获取电影列表
function getMovies()
{
    $movies = get_movies();
    return success_json($movies);
}

//获取单个电影
function get_single_movie()
{
    $id = $_POST['id'];
    $movie = get_movie($id);
    return success_json($movie);
}

# 新增电影
function add_new_movie()
{
    $admin_name = $_POST['adminname'];
    session_start();
    if (empty($admin_name) || empty($_SESSION[$admin_name])) {
        return error_json('please login with admin account');
    }
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $director = $_POST['director'];
    $runtime = $_POST['runtime'];
    $year = $_POST['year'];
    $price = $_POST['price'];

    if (empty($title) || empty($genre) || empty($director) || empty($runtime) || empty($year) || empty($price)) {
        return error_json('please fill in the information correctly');
    }
    add_movie($genre, $title, $director, $year, $price, $runtime);
    return success_json('添加成功');
}

# 修改电影信息
function modify_movie()
{
    $admin_name = $_POST['adminname'];
    session_start();
    if (empty($admin_name) || empty($_SESSION[$admin_name])) {
        return error_json('please login with admin account');
    }
    $id = $_POST['id'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $director = $_POST['director'];
    $runtime = $_POST['runtime'];
    $year = $_POST['year'];
    $price = $_POST['price'];

    if (empty($id) || empty($title) || empty($genre) || empty($director) || empty($runtime) || empty($year) || empty($price)) {
        return error_json('please fill in the information correctly');
    }

    // 用id查询电影信息是否存在
    $movie = get_movie($id);
    if (empty($movie)) {
        return error_json('film does not exist');
    }

    update_movie($id, $genre, $title, $director, $year, $price);
    return success_json('添加成功');
}

// 删除电影信息
function del_movie()
{
    $admin_name = $_POST['adminname'];
    session_start();
    if (empty($admin_name) || empty($_SESSION[$admin_name])) {
        return error_json('please login with admin account');
    }
    $id = $_POST['id'];
    if (empty($id)) {
        return error_json('please enter the correct parameter');
    }
    delete_movie($id);
    return success_json('delete successful');
}

// 用户购买电影
function buy_movie()
{
    $movie_id = $_POST['movie_id'];
    $user_name = $_POST['username'];
    session_start();
    $user_id = isset($_SESSION[$user_name])?$_SESSION[$user_name]:'';
    if (empty($user_id)) {
        return error_json('please login');
    }

    // 判断要购买的电影是否存在
    $movie = get_movie($movie_id);
    if (empty($movie)) {
        return error_json('commodity does not exist');
    }

    // 购买电影
    purchase_movie($user_id, $movie_id);
    return success_json('purchase success');
}
