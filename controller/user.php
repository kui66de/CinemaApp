<?php


function user_login()
{

}

function user_logout()
{

}

function user_register()
{
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    # todo 正则匹配处理,字符串长度处理
    if ($password != $password_confirm) {
        return error_json('password confirm failed!');
    }

    # todo CHECK user name 是否重复

}



