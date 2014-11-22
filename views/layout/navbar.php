<?php
$docs_url = 'http://docs.highfidelity.io'; 
if (class_exists('View')) {
    $page = View::read('page');
    $base_path = './';
    $worklist_url = WORKLIST_URL;
} else {
    $page = 'blog';
    $base_path = site_url('/') . '../';
    $worklist_url = 'https://worklist.net/';
}
?>
<header id="navbar" class="navbar navbar-static-top hifi-web-nav" id="top" role="banner">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".hifi-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="logo <?php echo ($page == 'home' ? 'selected' : ''); ?>" href="<?php echo $base_path; ?>" title="High Fidelity"></a>
        </div>
        <nav class="navbar-collapse hifi-navbar-collapse collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li id="logo" class="<?php echo ($page == 'home' ? 'selected' : ''); ?>">
                    <a class="logo" href="<?php echo $base_path; ?>" title="High Fidelity"></a><i></i>
                </li>
                <li class="<?php echo ($page == 'alpha' ? 'selected' : ''); ?>">
                    <a href="<?php echo $base_path; ?>alpha" title="Alpha">Alpha</a><i></i>
                </li>
                <li class="<?php echo ($page == 'code' ? 'selected' : ''); ?>">
                    <a href="<?php echo $base_path; ?>code" title="Code">Code</a><i></i>
                </li>
                <li>
                    <a href="<?php echo $docs_url; ?>" title="Docs">Docs</a><i></i>
                </li>
                <li>
                    <a href="<?php echo $base_path; ?>press" title="Press">Press</a><i></i>
                </li>
                <li>
                    <a href="<?php echo $base_path; ?>#advisors" title="Advisors">Advisors</a><i></i>
                </li>
            </ul>
            <ul class="nav navbar-nav ">
                <li>
                    <a href="<?php echo $worklist_url; ?>" title="The Worklist">Worklist</a><i></i>
                </li>
                <li class="<?php echo ($page == 'jobs' ? 'selected' : ''); ?>">
                    <a href="<?php echo $base_path; ?>jobs" title="Jobs">Jobs</a><i></i>
                </li>
                <li class="<?php echo ($page == 'blog' ? 'selected' : ''); ?>">
                    <a href="<?php echo $base_path; ?>blog/" title="Blog">Blog</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<?php if ($page != 'home') { ?>
    <div id="container">
<?php } ?>

