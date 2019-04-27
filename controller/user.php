<?php
function user_bought()
{
    session_start();
    $user_id = $_SESSION['user_id'];
    if (empty($user_id)){
        return error_json('you are not Login yet');
    }
    $movies = get_user_bought_movies($user_id);
    return success_json($movies);
}

function user_login()
{
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    if (empty($user_name) || empty($password) || !preg_match('/^[a-z\d_]{4,20}$/i', $user_name)) {
        return error_json('Please enter the correct account password');
    }
    $user = get_user_by_name($user_name);
    if (empty($user)) {
        return error_json('you are not register yet');
    }
    if (md5($password) != $user['userPassword']) {
        return error_json('password error');
    }
    # 写入session信息（user_name=>user_id）,前端需要存储用户名
    session_start();
    $_SESSION[$user_name] = $user['userID'];
    $_SESSION['username'] = $user_name;
    $_SESSION['user_id'] = $user['userID'];
    return success_json('landing successfully');
}

function user_logout()
{
//    $user_name = $_POST['username'];
    # 清除session信息
    session_start();
    if (isset($_SESSION['user_id'])) {
//        unset($_SESSION[$user_name]);
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
    }
    return success_json('log out successfully');
}

function user_register()
{
    $user_name = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $password_confirm = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : '';
    $nick_name = isset($_POST['nickname']) ? $_POST['nickname'] : '';
    // 正则说明：账号需要包括字母、数字（A-Z，a-z，0-9）、下划线以及最低4个字符，最大20个字符
    if (empty($user_name) || !preg_match('/^[a-z\d_]{4,20}$/i', $user_name)) {
        return error_json('Please enter the correct account');
    }
    if ($password != $password_confirm) {
        return error_json('password confirm failed!');
    }
    if (empty($nick_name)) {
        return error_json('Please enter the correct nickname');
    }

    # 检查 user name 是否重复
    $user = get_user_by_name($user_name);
    if (!empty($user)) {
        return error_json('user name already exists');
    }

    # 将新注册用户信息保存到数据库中
    add_user($user_name, md5($password), $nick_name);
    $user = get_user_by_name($user_name);
    if (empty($user)) {
        return error_json('register has failed');
    }
    session_start();
    $_SESSION[$user_name] = $user['userName'];
    return success_json('register is successful');
}
