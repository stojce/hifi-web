<?php
$posts = View::read('posts');
$posts = array_slice($posts, 0, 2);
?>

<div id="heading">
    <h3>We’re building an
        <span class="strong">open-source virtual reality</span>
        platform that gives everyone the power
        <span class="strong">to create, explore and share virtual worlds.</span></h3>

    <div>
        <a data-scroll href="#download-summary">
            <svg viewBox="0 0 46 13">
                <use xlink:href="./img/down-arrow.svg#arrow"></use>
            </svg>
        </a>
    </div>
</div>

<section id="download-summary">
    <article>
        <div class="deploy">
            <h4><span class="strong">In less time than it takes to deploy a website,</span>
                anyone can launch their own sharable, scalable
                and immersive virtual reality environment.
            </h4>
        </div>
    </article>

    <article>
        <div class="download-text">
            <p>
                Whether from a laptop with a webcam or with a head-mounted display,
                High Fidelity’s free platform faithfully captures the way we move
                and communicate, creating the possibility for lifelike and emotional interactions.
            </p>

            <p>
                The Metaverse is still being built, and the Alpha version of our platform
                for Mac OS, Windows and Linux is open to everybody.
            </p>

            <a href="download" class="crazy-link">
                <span>download</span>
            </a>

        </div>
    </article>
</section>

<section id="the-market">
    <div>
        <img src="img/market/market1.png" width="245" height="245">
        <img src="img/market/market2.png" width="245" height="245">
        <img src="img/market/market3.png" width="245" height="245">
        <img src="img/market/market4.png" width="245" height="245">
        <img src="img/market/market5.png" width="245" height="245">
        <img src="img/market/market6.png" width="245" height="245">
    </div>
    <div>

        <h4>The Market</h4>

        <p>The Market in High Fidelity is full of shared digital goods that can enrich and enliven experiences in
            virtual reality.</p>

        <a class="external-link" href="https://metaverse.highfidelity.com/marketplace">Visit The Market</a>

    </div>
</section>

<section id="directory">
    <div class="directory-title">
        <h4>Directory</h4>
        <a class="domains-link" href="https://metaverse.highfidelity.com/directory"
           target="_blank"><?php echo View::read('onlinedomains') ?> Domains Online Now</a>
        <span class="top-links">
            <a href="https://metaverse.highfidelity.com/directory" class="external-link">All Domains</a>
            <a href="https://docs.highfidelity.com/" class="external-link">Build Your Own</a>
        </span>
    </div>
    <div id='owl-carousel'>
        <?php foreach (View::read('places') as $place): ?>
            <div class="item">
                <a href="<?php echo $place['address'] ?>">
                    <img
                        src="<?php echo $place['thumb'] ?>"
                        hdsrc="<?php echo $place['thumb'] ?>"/>
                    <h4><?php echo $place['name'] ?></h4>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="bottom-links">
        <a href="https://metaverse.highfidelity.com/directory" class="external-link">All Domains</a>
        <a href="#" class="external-link">Build Your Own</a>
    </div>
</section>

<section id="under-hood">
    <div class="hood-title">
        In High Fidelity, you can use common formats, tools and languages to build complex interactive experiences,
        share processing power among users and
        <span class="strong">scale to thousands of people and petabytes of data in a single space</span>
    </div>

    <h3 class="hood-title">
        Under the Hood
    </h3>

    <ul>
        <li>
            <svg viewBox="0 0 70 70">
                <use xlink:href="./img/under-the-hood.svg#3d-audio"></use>
            </svg>
            <div>
                <div class="title">FULL 3D AUDIO</div>
                Low-latency, spatialized, server-mixed, reverberant audio from hundreds of simultaneous sources
            </div>
        </li>
        <li>
            <svg viewBox="80 0 70 70">
                <use xlink:href="./img/under-the-hood.svg#facial"></use>
            </svg>
            <div>
                <div class="title">FACIAL FEATURE AWARE</div>
                Supports sensor-based capture of gaze, facial expressions, and body language
            </div>
        </li>
        <li>
            <svg viewBox="0 70 70 70">
                <use xlink:href="./img/under-the-hood.svg#limitless"></use>
            </svg>
            <div>
                <div class="title">LIMITLESS SCALE</div>
                Sharing user-contributed computing power to scale to huge audiences
            </div>
        </li>
        <li>
            <svg viewBox="80 70 70 70">
                <use xlink:href="./img/under-the-hood.svg#scriptable"></use>
            </svg>
            <div>
                <div class="title">SCRIPTABLE API</div>
                Develop your own experiences via a robust Javascript API
            </div>
        </li>
        <li>
            <svg viewBox="0 140 70 70">
                <use xlink:href="./img/under-the-hood.svg#devices"></use>
            </svg>
            <div>
                <div class="title">MANY DEVICES & INPUTS</div>
                Supports HTC Vive, Oculus Rift, Hydra, PrioVR, Leap Motion and many others
            </div>
        </li>
        <li>
            <svg viewBox="80 140 70 70">
                <use xlink:href="./img/under-the-hood.svg#scalability"></use>
            </svg>
            <div>
                <div class="title">CONTENT SCALABILITY</div>
                Dynamic assignment of multiple nested levels of detail using sparse voxel octree structure
            </div>
        </li>
        <li>
            <svg viewBox="0 210 70 70">
                <use xlink:href="./img/under-the-hood.svg#open-source"></use>
            </svg>
            <div>
                <div class="title">OPEN SOURCE</div>
                Open source client and server
            </div>
        </li>
        <li>
            <svg viewBox="80 210 70 70">
                <use xlink:href="./img/under-the-hood.svg#own-domain"></use>
            </svg>
            <div>
                <div class="title">OWN YOUR DOMAIN</div>
                Claim your unique domain and location names
            </div>
        </li>
    </ul>
</section>

<?php if (!empty($posts) && is_array($posts)): ?>
    <section id="blog" class="default-section">
        <h3>Blog</h3>
        <a href="blog" class="external-link">See All Posts</a>

        <div>
            <?php foreach ($posts as $post): ?>
                <div class="blog-post">
                    <div class="post-date"><?php echo $post['time']; ?></div>
                    <div class="post-title">
                        <?php echo $post['title']; ?>
                    </div>
                    <div class="post-subtitle">Posted by <?php echo $post['author']; ?>
                        / <?php echo $post['comments']; ?></div>
                    <div class="post-text">

                        <?php
                        // if there is an image in the post -- show it, otherwise show the post text
                        if (empty($post['images'])) {
                            echo $post['post'], '[...]';
                        } else {
                            echo '<img src="', $post["images"][0], '">';
                        }
                        ?>

                    </div>
                    <a href="<?php echo $post['link']; ?>" class="external-link">Read</a>
                </div>

            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>

<section id="up-to-date">
    <h3>
        <span class="strong">Stay up to date</span> on the latest from High Fidelity:
    </h3>

    <div id="right-signup">
        <form action="<?php echo SUBSCRIBE_URL; ?>" method="post" id="mc-embedded-subscribe-form"
              name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <svg viewBox="40 0 34 29">
                <use xlink:href="./img/up-to-date.svg#subscribe"></use>
            </svg>
            <input id="email-signup" name="EMAIL" type="email" autocomplete="off" placeholder="Subscribe to us">
            <svg class="right-arrow" viewBox="0 0 7 19" onclick="$('#mc-embedded-subscribe-form').submit();">
                <use xlink:href="./img/right-arrow.svg#ra"></use>
            </svg>
        </form>

        <a href="https://twitter.com/highfidelityinc" class="external-link">
            <svg viewBox="0 0 34 29">
                <use xlink:href="./img/up-to-date.svg#twitter"></use>
            </svg>
            Follow us</a>
    </div>
</section>

<section id="press" class="default-section">

    <h3>Press</h3>
    <a href="press" class="external-link">See All Press</a>

    <blockquote>
        &ldquo;The expressive faces looked incredibly human-like, which adds a whole other dimension to the interaction
        by
        invoking emotion&rdquo;
    </blockquote>
    <cite>- quoVice News</cite>

    <ul>
        <li>
            ‘MAKING VIRTUAL REALITY LESS VIRTUAL
            <img class="atlantic" src="img/press/the-atlantic.jpg">
        </li>
        <li>
            ‘HIGH FIDELITY RAISES $11M TO BUILD DEPLOYABLE VIRTUAL WORLDS
            <img class="tc" src="img/press/techcrunch.svg">
        </li>
        <li>
            ‘THE QUEST TO PUT MORE REALITY IN VIRTUAL REALITY
            <img class="mit" src="img/press/mit-tech-review.png">
        </li>
    </ul>
</section>

<section id="alpha" class="default-section">
    <p>
        <strong>We’re in Alpha</strong> and we’re building new things every day. Come kick the tires:
    </p>

    <a href="download" class="crazy-link">
        <span>download</span>
    </a>
</section>

<section id="jobs">
    <div>
        <h3>Jobs</h3>
        <a href="https://highfidelity.com/jobs" class="external-link">See All Jobs</a>

        <div class="job-text">
            <div class="title">
                Are you a <strong>C++ Generalist?</strong>
                A <strong>Javascript Developer</strong>,
                or <strong>Physics Engineer</strong> perhaps?
            </div>

            <p>
                Even if your talents don’t fall neatly into a single title, if you‘re losing sleep imagining the great
                things yet to be built in VR, maybe you should be on our team.
            </p>

            <p> Check out our job listings, or visit Worklist, our distributed development system, and show us what
                you’ve
                got.
            </p>

            <p class="worklist-jobs">
                <svg viewBox="0 0 39 39">
                    <use xlink:href="./img/worklist.svg#worklist"></use>
                </svg>
                <a href="https://worklist.net/" class="external-link">Worklist</a>
            </p>
        </div>

    </div>

    <img src="img/windmill.png">

</section>
