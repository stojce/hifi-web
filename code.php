<?php
require_once('config.php');
include_once 'github_repos.php';

View::$title = 'High Fidelity code';
View::write('page', 'code');

View::addStyle('css/code.css');

View::addScript('js/packery.pkgd.min.js');
View::addScript('js/code.js');
View::addScript('js/json-sans-eval.js');
View::addScript('js/game-of-life-v3.1.1.js');

$gh = new GithubCloud();
$gh->setToken(GITHUB_API_TOKEN);

for ($i = 0; $i < count($github_repos); $i++) {
    $repo = $github_repos[$i];
    if (isset($repo['show_cloud']) && $repo['show_cloud'] === true) {
        $github_repos[$i]['words'] = $gh->getWordsForRepo($repo['github_repo']);
    }
}

View::write('github_repos', $github_repos);

View::renderCommonLayout('code');
