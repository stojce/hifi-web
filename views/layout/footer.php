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
        <div id="social">
            <ul>
                <li class="<?php echo $page == 'subscribe' ? 'selected' : ''; ?>">
                    <a href="https://github.com/highfidelity/hifi" title="GitHub repository">
                        <i class="icon-github icon-2x"></i>
                        GitHub
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://worklist.net" title="Worklist">
                        <img src="img/wl-logo.svg">
                        Worklist
                    </a>
                </li>
                <li>
                    <a target="_blank" href="http://www.youtube.com/HighFidelityio" title="Contact us">
                        <i class="icon-film icon-2x"></i>
                        YouTube
                    </a>
                </li>
                <li>
                    <a target="_blank" href="http://twitter.com/highfidelityinc" title="Twitter">
                        <i class="icon-twitter icon-2x"></i>
                        Twitter
                    </a>
                </li>
                <li>
                    <a target="_blank" href="http://www.facebook.com/HighFidelityInc" title="Facebook">
                        <i class="icon-facebook icon-2x"></i>
                        Facebook
                    </a>
                </li>
                <li>
                    <a href="mailto:<?php echo CONTACT_EMAIL_ADDRESS; ?>" title="Email">
                        <i class="icon-envelope-alt icon-2x"></i>
                        Contact
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#" title="Alpha">
                        Alpha
                    </a>
                </li>
                <li>
                    <a href="#" title="Docs">
                        Docs
                    </a>
                </li>
                <li>
                    <a href="#" title="Jobs">
                        Jobs
                    </a>
                </li>
                <li>
                    <a href="#" title="Blog">
                        Blog
                    </a>
                </li>
            </ul>
        </div>
        <p>
            <span>&copy; 2014 High Fidelity Inc</span>
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
