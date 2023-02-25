<?php

function security_login($user)
{
    session_regenerate_id();
    $_SESSION['user'] = array();
    $_SESSION['user']['id'] = $user['persoon_nr'];
    $_SESSION['user']['name'] = $user['naam'];
    $_SESSION['user']['last_login'] = time();
    $_SESSION['user']['login_expires'] = strtotime("+1 day midnight");
    $_SESSION['user']['roles'] = $user['roles'];
}

function security_logout()
{
    session_destroy();
}


function security_is_login_valid()
{
    if (!isset($_SESSION['user']['login_expires'])) {
        return false;
    }

    if ($_SESSION['user']['login_expires'] < time()) {
        security_logout();
        return false;
    }

    return true;
}

function security_is_logged_in()
{
    return isset($_SESSION['user']) && security_is_login_valid();
}

function security_require_login($required_role = null)
{
    if (!security_is_logged_in()) {
        redirect_to('/inloggen.php');
    }

    if (!security_has_role($required_role)) {
        error_unauthorized();
    }
    return true;
}

function security_has_role($required_role = null)
{
    if (!security_is_logged_in()) {
        return false;
    }

    if (is_blank($required_role)) {
        return true;
    }

    return in_array(strtoupper($required_role), $_SESSION['user']['roles']);
}
