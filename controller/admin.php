<?php
function admin_login()
{
    $admin_name = $_POST['adminname'];
    $password = $_POST['password'];
    if (empty($admin_name) || empty($password) || !preg_match('/^[a-z\d_]{5,20}$/i', $admin_name)) {
        return error_json('Please enter the correct account password');
    }
    $admin = get_admin_by_name($admin_name);
    if (empty($admin)) {
        return error_json('account error');
    }
    if (md5($password) != $admin['adminPassword']) {
        return error_json('password error');
    }
    # 写入session信息（admin_name=>admin_id）,前端需要存储用户名
    session_start();
    $_SESSION[$admin_name] = $admin['adminID'];
    $_SESSION['adminname'] = $admin_name;
    $_SESSION['admin_id'] = $admin['adminID'];
    return success_json('landing successfully');
}

function admin_logout()
{
//    $admin_name = $_POST['adminname'];
    # 清除session信息
    session_start();
    if (isset($_SESSION['admin_id'])) {
//        unset($_SESSION[$user_name]);
        unset($_SESSION['admin_id']);
        unset($_SESSION['adminname']);
    }
    return success_json('log out successfully');
}
