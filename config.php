<?php

if (file_exists(dirname(__FILE__).'/server.local.php')) {
    require_once(dirname(__FILE__).'/server.local.php');
}

// Use this function to not overwrite values that were previously
// specified in server.local.php
// @TODO: Migrate all constants to use this handy function :)
function defineOnce($key, $value) {
    if (!defined($key)) {
        define($key, $value);
    }
}

defineOnce('WORKLIST_URL', 'https://dev.worklist.net/worklist/');
defineOnce('CONTACT_EMAIL_ADDRESS', 'contact@highfidelity.io');
defineOnce('MC_ACCOUNT_ID', '6fed7d4aeb9076c82690f8f02');
defineOnce('MC_LIST_ID', '340beb1967');
defineOnce('SUBSCRIBE_URL', sprintf("http://highfidelity.us2.list-manage2.com/subscribe/post?u=%s&id=%s", MC_ACCOUNT_ID, MC_LIST_ID));

defineOnce('JOBLIST_FEEDS_URL', WORKLIST_URL . 'feeds');
defineOnce('JOBLIST_PROJECTS', 'JoTester,korderotest1');
defineOnce('JOBLIST_MAX_LIMIT', 5);

defineOnce('VIEWS_DIR', dirname(__FILE__) . '/views/');

defineOnce('GITHUB_API_TOKEN', '');
defineOnce('GITHUB_REPO', 'highfidelity/hifi');
defineOnce('GITHUB_CUSTOM_STOPWORDS', 'pull,push,request,merge,fork,repo,master,build,github');
defineOnce('TEMP_DIR', dirname(__FILE__) . '/tmp');

defineOnce('MC_ALPHA_SUBSCRIBE_API_KEY', 'c8b29f2f7e16cd5292a1b04b4310216f-us2');
defineOnce('MC_ALPHA_SUBSCRIBE_LIST_ID', '56eb53e74a');

require_once('vendor/autoload.php');
require_once('functions.php');
