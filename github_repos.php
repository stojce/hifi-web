<?php
/* GitHub repository configuration
 *
 * array of GitHub repositories, defined by array
 *  - title (mandatory) - title of GitHub repo
 *  - description (mandatory) - description of GitHub repo
 *  - github_repo(mandatory) - GitHub repo, used for URL
 *  - show_cloud(optional, true/false) - should we fetch keywords and show cloud for this repo
 *
 */

$github_repos = array(

    array(
        'title' => 'hifi', 
        'description' => 'Our flagship product/codebase. The hifi project encapsulates our interface client
            for Mac/Win/Linux, and our basic server stack.<br/>
            <i>Distributed under the Apache License, Version 2.0</i>',
        'github_repo' => 'highfidelity/hifi',
        'show_cloud' => true
    ),

    array(
        'title' => 'hifi-web', 
        'description' => 'High Fidelity Inc\'s website.', 
        'github_repo' => 'highfidelity/hifi'
    ),

    array(
        'title' => 'stack-manager-mac', 
        'description' => 'Mac based tool for running your own virtual world.', 
        'github_repo' => 'highfidelity/stack-manager-mac'
    )
);