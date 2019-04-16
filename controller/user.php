<?php
function user_login()
{
    $user_name = $_POST['username'];
    $password = $_POST['password'];
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
    return success_json('landing successfully');
}

function user_logout()
{
    $user_name = $_POST['username'];
    # 清除session信息
    session_start();
    unset($_SESSION[$user_name]);
    return success_json('log out successfully');
}

function user_register()
{
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    if ($password != $password_confirm) {
        return error_json('password confirm failed!');
    }

    # 检查 user name 是否重复
    $user = get_user_by_name($user_name);
    if (!empty($user)) {
        return error_json('user name already exists');
    }

    # 将新注册用户信息保存到数据库中
    add_user($user_name, md5($password));
    return success_json('register is successful');
}
