<?php 
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
<header id="navbar" role="banner">
    <nav role="navigation">
        <ul>
            <li class="<?php echo ($page == 'alpha' ? 'selected' : ''); ?>">
                <a href="<?php echo $base_path; ?>alpha" title="Alpha">Alpha</a>
            </li>
            <li class="<?php echo ($page == 'code' ? 'selected' : ''); ?>">
                <a href="<?php echo $base_path; ?>code" title="Code">Code</a>
            </li>
            <li>
                <a href="http://twitter.com/highfidelityinc" title="Twitter">Twitter</a>
            </li>
        </ul>
        <h1 id="logo">
            <?php if ($page != 'home'): ?>
                <a href="<?php echo $base_path; ?>" title="High Fidelity">
                    <img src="<?php echo $base_path; ?>img/hifi-logo.png" alt="High Fidelity" />
                </a>
            <?php else: ?>
                <img src="<?php echo $base_path; ?>img/hifi-logo-grey.svg" alt="High Fidelity" />
            <?php endif; ?>
        </h1>
        <ul id="sitenav">
            <li>
                <a href="<?php echo $worklist_url; ?>" title="The Worklist">Worklist</a>
            </li>
            <li class="<?php echo ($page == 'jobs' ? 'selected' : ''); ?>">
                <a href="<?php echo $base_path; ?>jobs" title="Jobs">Jobs</a>
            </li>
            <li class="<?php echo ($page == 'blog' ? 'selected' : ''); ?>">
                <a href="<?php echo $base_path; ?>blog/" title="Blog">Blog</a>
            </li>
        </ul>
    </nav>
</header>
