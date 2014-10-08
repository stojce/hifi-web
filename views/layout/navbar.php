<?php 
if (class_exists('View')) {
    $page = View::read('page');
    $base_path = './';
    $worklist_url = WORKLIST_URL;
    $docs_url = 'http://docs.highfidelity.io';
} else {
    $page = 'blog';
    $base_path = site_url('/') . '../';
    $worklist_url = 'https://worklist.net/';
    $docs_url = 'http://docs.highfidelity.io';
}
?>
<header id="navbar" role="banner">
    <nav role="navigation">
        <ul>
            <li id="logo" class="<?php echo ($page == 'home' ? 'selected' : ''); ?>">
                <a href="<?php echo $base_path; ?>" title="High Fidelity"></a><i></i>
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
</header>
<?php if ($page != 'home') { ?>
    <div id="container">
<?php } ?>

