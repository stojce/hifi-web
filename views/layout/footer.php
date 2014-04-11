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
            <p>Stay connected</p>
            <ul>
                <li>
                    <a href="mailto:<?php echo CONTACT_EMAIL_ADDRESS; ?>" title="Email">
                        <i class="icon-envelope icon-2x"></i>
                        Email
                    </a>
                </li>
                <li class="<?php echo $page == 'subscribe' ? 'selected' : ''; ?>">
                    <a href="<?php echo $base_path; ?>subscribe" title="Subscribe">
                        <i class="icon-inbox icon-2x"></i>
                        Subscribe
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
                    <a target="_blank" href="https://plus.google.com/116747659392437653711/" title="Google Plus">
                        <i class="icon-google-plus-sign icon-2x"></i>
                        Google+
                    </a>
                </li>
            </ul>
        </div>
        <div id="ubernerds">
            <p>über nerds:</p>
            <ul>
                <li><a target="_blank" href="http://alpha.app.net/highfidelity" title="ADN">ADN</a></li>
                <li><a target="_blank" href="https://github.com/highfidelity/hifi" title="Github">Github</a></li>
                <li><a target="_blank" href="http://www.worklist.net" title="Worklist">Worklist</a></li>
                <li>blog feed: <a target="_blank" href="http://highfidelity.io/blog/feed/" title="RSS Feed">RSS</a></li>
            </ul>
        </div>
        <p>
            <span>&copy; 2013 High Fidelity Inc</span>
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
