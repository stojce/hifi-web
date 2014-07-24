<?php
$jobs = View::read('jobList'); 
$tweetStrJob1 = urlencode('@highfidelityinc is working on building a new virtual world and they need a Graphics Engineer! Check out http://highfidelity.io/jobs #jobs #graphics');
$tweetStrJob2 = urlencode('@highfidelityinc is working on building a new virtual world and they need a Technical Artist! Check out http://highfidelity.io/jobs #jobs #3dartists');
?>
<section id="particle-system"></section>
<div role="main" id="main">
    <h2><strong>1.</strong> Full-time Jobs</h2>
    <article class="no-border-bottom radius-border-top">
        <p class="lead">Lead 3D Graphics Engineer</p>
        <p>
            We're looking for a lead 3D graphics engineer to help build our virtual 
            world’s 3D graphics engine, working closely with us to create something 
            astonishing. We are creating an open source rendering engine that can 
            display a very large user-created environment at high FPS, using data 
            streaming at low latency from multiple simultaneous servers.
        </p>
        <div id="requirements">
            <h3>Skills / Requirements</h3>
            <ul>
                <li>
                    <span>
                        Expert in designing and building graphics engine componentry
                    </span>
                </li>
                <li>
                    <span>
                        Deep knowledge of rendering systems, with experience working on multiple pieces 
                        of high performance visual systems—e.g., shaders, animation, lighting, particle 
                        systems, and/or procedural routines
                    </span>
                </li>
                <li>
                    <span>
                        Experience developing and maintaining multi-threaded code; skilled in optimizing 
                        around CPU and GPU architectures
                    </span>
                </li>
                <li>
                    <span>
                        Fluent in C++, and OpenGL
                    </span>
                </li>
                <li>
                    <span>
                        Dangerous 3D math skills
                    </span>
                </li>
            </ul>
            <br/>
            <h3>Bonus Points</h3>
            <ul>
                <li>
                    <span>
                        Experience with low-latency networking
                    </span>
                </li>
                <li>
                    <span>
                        Experience with physics engines / simulation
                    </span>
                </li>
                <li>
                    <span>
                        Experience with voxel-based systems
                    </span>
                </li>
                <li>
                    <span>
                        Experience developing in Git environments
                    </span>
                </li>
                <li>
                    <span>
                        Experience with scripting languages (e.g., Javascript)
                    </span>
                </li>
            </ul>
            <br/>
            <h3>Professional Qualities</h3>
            <ul>
                <li>
                    <span>
                        Demonstrable history of designing/building rendering engines/components
                    </span>
                </li>
                <li>
                    <span>
                        Ability to switch between different projects quickly and easily while rapidly prototyping
                    </span>
                </li>
                <li>
                    <span>
                        Autonomous in setting work priorities within product plans
                    </span>
                </li>
                <li>
                    <span>
                        Comfortable as both perpetrator and victim of rigorous code reviews
                    </span>
                </li>
                <li>
                    <span>
                        Appetite for sharing technical knowledge with other engineers
                    </span>
                </li>
                <li>
                    <span>
                        Good at explaining, good at thinking out loud, hard to frustrate, and fun to work with
                    </span>
                </li>
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
            href="http://twitter.com/home/?status=<?php echo $tweetStrJob1; ?>">
            <i class="icon-twitter"></i>
            <span>Tweet this job</span>
        </a>
    </article>
    <article class="no-border-top radius-border-bottom">
        <p class="lead">Marketing Coordinator</p>
            <p>
            High Fidelity seeks a marketing coordinator to help us reach and engage potential employees and customers. 
            
            </p>
            <div id="requirements">
                <h3>Skills / Requirements</h3>
                <ul>
                    <li>
                        <span>
                        The ideal candidate has worked 3+ years in a consumer-facing tech company producing marketing assets across
                        several dimensions.
                        </span>
                    </li>
                    <li>
                        <span>
                        You are a proficient writer capable of creating engaging short form copy for websites, blogs and social media
                        campaigns.
                        </span>
                    </li>
                    <li>
                        <span>
                        You can produce polished webinars and instructional videos, and coordinate events and convention activities.
                        </span>
                    </li>
                </ul>
                <br/>
                <h3>Professional Qualities</h3>
                <ul>
                    <li>
                        <span>
                        You exercise high attention to detail, are self-directed, data driven, and game for working in a fluid
                        startup environment.
                        </span>
                    </li>
                    <li>
                        <span>
                        You're comfortable helping to define and revise a continually-shifting set of messages as the company
                        evolves.
                        </span>
                    </li>
                </ul>
            </div>
            <div id="apply">
            <h3>Apply</h3>
                <p>
                    Interested applicants should be sure to include writing samples, social media account management examples, and
                    references.
                </p>
                <p>
                    <a href="mailto:hiring@highfidelity.io">hiring@highfidelity.io</a>
                </p>
            </div>
        <a class="tweetthis" target="_blank"
            href="http://twitter.com/home/?status=<?php echo $tweetStrJob1; ?>">
            <i class="icon-twitter"></i>
            <span>Tweet this job</span>
        </a>
    </article>
    <article class="get-our-attention radius-border-bottom">
        <p><span class="strong">We are seeing lots of great applicants!</span> If you'd like to get our attention and also have
        more fun than sitting in an interview, do the following:</p>
        <p>Checkout our code on <a href="https://github.com/highfidelity/hifi">GitHub</a>, build the Interface client, and see if you
        can login to Hifi. Then, take a look at <a href="https://worklist.net">Worklist</a> and see if there's a job you can do
        to show us your work skills.</p>
    </article>
    <h2><strong>2.</strong> Contract jobs</h2>
    <article class="radius-border-bottom radius-border-top">
        <p>
            Our distributed development system, 
            <a href="<?php echo WORKLIST_URL; ?>">Worklist</a>, is ready
            for new developers proficient in <strong>C, C++, OpenGL, iOS, Android, PHP,</strong> 
            and more. Hop in and do some work.
        </p>
        <?php if (!empty($jobs)): ?>
            <div id="jobs">
                <span>You can bid on these jobs right now:</span>
                <ul>
                    <?php foreach ($jobs as $job): ?>
                        <li><a href="<?php echo $job['link']; ?>"><?php echo $job['title']; ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="<?php echo WORKLIST_URL; ?>">View them all</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </article>
</div>
