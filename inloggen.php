<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'bootstrap.php');
require_once(REPOSITORY_PATH . DIRECTORY_SEPARATOR . 'login.php');

if (security_is_logged_in()) {
    redirect_to('index.php');
}

$errors = [];
$username = '';
$password = '';

if (is_post_request()) {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (is_blank($username)) {
        $errors[] = "Gebruikersnaam is niet ingevuld.";
    }
    if (is_blank($password)) {
        $errors[] = "Wachtwoord is niet ingevuld.";
    }

    if (empty($errors)) {
        $login_failure_msg = "Aanmelding is mislukt.";
        $user = repository_login($username);
        if (!empty($user)) {
            if (password_verify($password, $user['wachtwoord_hash'])) {
                security_login($user);
                redirect_to('/index.php');
            } else {
                $errors[] = $login_failure_msg;
            }
        } else {
            $errors[] = $login_failure_msg;
        }
    }
}

$page_title = 'Log in';
include(TEMPLATE_PATH . '/header.php'); ?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 login-section-wrapper">
                <div class="brand-wrapper">
                    <h1>
                        <img src="./assets/images/logo-ct.png" alt="logo" class="logo">
                        &nbsp;
                        Werkgroep Computerhuis Oost
                    </h1>
                </div>
                <div class="login-wrapper my-auto">
                    <h1 class="login-title">Log in</h1>
                    <form method="post" class="row g-3 needs-validation" novalidate>
                        <div class="form-group">
                            <label for="username" class="form-label">Gebruikersnaam</label>
                            <input type="text"
                                   id="username"
                                   name="username"
                                   class="form-control"
                                   autofocus
                                   required
                                   maxlength="255"
                                   autocomplete="off"
                                   autocapitalize="off"
                                   spellcheck="false"/>
                            <div class="invalid-feedback">
                                Vul uw gebruikersnaam in.
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="password" class="form-label">Wachtwoord</label>
                            <input type="password"
                                   id="password"
                                   name="password"
                                   class="form-control"
                                   required
                                   autocomplete="off"
                                   autocapitalize="off"
                                   spellcheck="false"/>
                            <div class="invalid-feedback">
                                Vul uw wachtwoord in.
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 px-0 d-none d-sm-block">
                <img src="./assets/images/keyboard.jpg" alt="login image" class="login-img">
            </div>
        </div>
    </div>
</main>

<?php include(TEMPLATE_PATH . 'footer.php'); ?>
