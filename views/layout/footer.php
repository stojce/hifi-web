<?php
if (class_exists('View')) {
    $page = View::read('page');
    $base_path = './';
} else {
    $page = 'blog';
    $base_path = site_url('/') . '../';
}

?>
    <footer id="site-links" role="contentinfo">
        <ul>
            <li class="<?php echo $page == 'subscribe' ? 'selected' : ''; ?>">
                <a href="https://github.com/highfidelity" title="GitHub repository">
                    <i class="icon-github icon-2x"></i>
                    <span>GitHub</span>
                </a>
            </li>
            <li>
                <a target="_blank" href="https://worklist.net" title="Worklist">
                    <img src="<?php echo $base_path; ?>img/wl-logo.svg">
                    <span>Worklist</span>
                </a>
            </li>
            <li>
                <a target="_blank" href="http://www.youtube.com/HighFidelityio" title="Contact us">
                    <i class="icon-youtube icon-2x"></i>
                    <span>YouTube</span>
                </a>
            </li>
            <li>
                <a target="_blank" href="http://twitter.com/highfidelityinc" title="Twitter">
                    <i class="icon-twitter icon-2x"></i>
                    <span>Twitter</span>
                </a>
            </li>
            <li>
                <a target="_blank" href="http://www.facebook.com/HighFidelityInc" title="Facebook">
                    <i class="icon-facebook icon-2x"></i>
                    <span>Facebook</span>
                </a>
            </li>
            <li>
                <a href="mailto:<?php echo CONTACT_EMAIL_ADDRESS; ?>" title="Email">
                    <i class="icon-envelope-alt icon-2x"></i>
                    <span>Contact</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="<?php echo $base_path; ?>alpha" title="Alpha">
                    Alpha
                </a>
            </li>
            <li>
                <a href="<?php echo $base_path; ?>code" title="Code">
                    Code
                </a>
            </li>
            <li>
                <a href="<?php echo $base_path; ?>jobs" title="Jobs">
                    Jobs
                </a>
            </li>
            <li>
                <a href="<?php echo $base_path; ?>blog/" title="Blog">
                    Blog
                </a>
            </li>
        </ul>
        <p>
            <span>&copy; 2015 High Fidelity Inc</span>
        </p>
    </footer>
</div>
<?php if ($page != 'blog'): ?>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-39558647-1']);
    _gaq.push(['_trackPageview']);
    
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
</body>
<?php endif; ?>
