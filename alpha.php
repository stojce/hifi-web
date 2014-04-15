<?php
require_once('config.php');

View::write('page', 'alpha');
View::$footer = 'layout/empty/footer';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['email']) {
    $MailChimp = new MailChimp(MC_ALPHA_SUBSCRIBE_API_KEY);
    $result = $MailChimp->call('lists/subscribe', array(
        'id'                =>  MC_ALPHA_SUBSCRIBE_LIST_ID,
        'email'             => array('email' => $_POST['email']),
        'merge_vars'        => array(
            'MERGE1' => $_POST['fname'],
            'MERGE2' => $_POST['lname'],
            'MERGE5' => $_POST['city'],
            'MERGE3' => $_POST['connection'],
            'MERGE4' => $_POST['country'],
            'GROUPINGS' =>  array(
                0 => array(
                    'name'   => 'Devices', 
                    'groups' => array_keys($_POST['group']['Devices'])
                )
            )
        ),
        'double_optin'      => true,
        'update_existing'   => true,
        'replace_interests' => false,
        'send_welcome'      => false
    ));

    $title = 'Subscription success';
    $view = 'alpha_success';
    View::$header = 'layout/empty/header';
    View::addStyle('css/alpha_success.css');
} else {
    $title = 'High Fidelity Alpha Signup';
    $view = 'alpha';
    View::addScript('js/alpha.js');
    View::addScript('js/chosen/chosen.jquery.min.js');
    View::addScript('js/validate/jquery.validate.min.js');
    View::addStyle('css/alpha.css');
    View::addStyle('css/chosen/chosen.min.css');
}

View::$title = $title;
View::renderCommonLayout($view);
