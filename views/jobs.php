<?php
$jobs = View::read('jobList'); 
$tweetStr = urlencode('High Fidelity is working on building a new virtual world and they need a Graphics Engineer! Check out http://highfidelity.io/jobs #jobs #graphics')
?>
<section id="particle-system"></section>
<div role="main" id="main">
    <h2><strong>1.</strong> Full-time Jobs</h2>
    <article class="no-border-bottom">
        <p class="lead">Graphics Software Engineer</p>
        <p>
            We're looking for additional engineers to join our team of eight, 
            working side-by-side with us writing code, testing ideas, 
            learning a lot, and enjoying the experience of creating something astonishing.  
        </p>
        <div id="requirements">
            <h3>Skills / Requirements</h3>
            <ul>
                <li><span>Proficiency in C and C++</span></li>
                <li><span>Experience with real-time graphics</span></li>
            </ul>
            <br/>
            <h3>Bonus Points</h3>
            <ul>
                <li><span>Experience with physics simulations</span></li>
                <li><span>Experience with OpenGL, voxels, GPU's</span></li>
                <li><span>Experience building in Git environments</span></li>
            </ul>
            <br/>
            <h3>Professional Qualities</h3>
            <ul>
                <li><span>Ability to switch between different projects quickly and easily while rapidly prototyping</span></li>
                <li><span>Good at explaining, good at thinking out loud, hard to frustrate, and fun to work with</span></li>
            </ul>
        </div>
        <div id="apply">
            <h3>Apply</h3>
            <p>
                Email us your resume or LinkedIn profile. 
                Sample code and links to things you’ve built are most welcome.
            </p>
            <p>
                <a href="mailto:hiring@highfidelity.io">hiring@highfidelity.io</a>
            </p>
        </div>
        <a class="tweetthis" target="_blank"
            href="http://twitter.com/home/?status=<?php echo $tweetStr; ?>">
            <i class="icon-twitter"></i>
            <span>Tweet this job</span>
        </a>
    </article>
    <article class="get-our-attention">
        <p><span class="strong">We are seeing lots of great applicants!</span> If you'd like to get our attention and also have
        more fun than sitting in an interview, do the following:</p>
        <p>Checkout our code on <a href="https://github.com/highfidelity/hifi">GitHub</a>, build the Interface client, and see if you
        can login to Hifi. Then, take a look at <a href="https://worklist.net">Worklist</a> and see if there's a job you can do
        to show us your work skills.</p>
    </article>
    <h2><strong>2.</strong> Contract jobs</h2>
    <article>
        <p>
            Our distributed development system, 
            <a target="_blank" href="<?php echo WORKLIST_URL; ?>">Worklist</a>, is ready
            for new developers proficient in <strong>C, C++, OpenGL, iOS, Android, PHP,</strong> 
            and more. Hop in and do some work.
        </p>
        <?php if (!empty($jobs)): ?>
            <div id="jobs">
                You can bid on these jobs right now:
                <ul>
                    <?php foreach ($jobs as $job): ?>
                        <li><a target="_blank" href="<?php echo $job['link']; ?>"><?php echo $job['title']; ?></a></li>
                    <?php endforeach; ?>
                    <li><a target="_blank" href="<?php echo WORKLIST_URL; ?>">View them all</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </article>
</div>
