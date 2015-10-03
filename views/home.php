<?php $i = 0; ?>

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
        <a href="https://metaverse.highfidelity.com/directory" class="external-link">All Domains</a>
        <a href="#" class="external-link">Build Your Own</a>
    </div>
    <div class="directory-list-wrap">
        <ul class="directory-list">
            <?php foreach (View::read('places') as $place): $i++; ?>
                <li>
                    <a href="<?php echo htmlentities($place->address) ?>">
                        <img height="258" width="458"
                             src="<?php echo htmlentities($place->previews->lobby) ?>"
                             hdsrc="<?php echo htmlentities($place->previews->lobby) ?>"/>
                        <h4><?php echo htmlspecialchars($place->name) ?></h4>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

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
            <div class="title">FULL 3D AUDIO</div>
            Low-latency, spatialized, server-mixed, reverberant audio from hundreds of simultaneous sources
        </li>
        <li>
            <svg viewBox="80 0 70 70">
                <use xlink:href="./img/under-the-hood.svg#facial"></use>
            </svg>
            <div class="title">FACIAL FEATURE AWARE</div>
            Supports sensor-based capture of gaze, facial expressions, and body language
        </li>
        <li>
            <svg viewBox="0 70 70 70">
                <use xlink:href="./img/under-the-hood.svg#limitless"></use>
            </svg>
            <div class="title">LIMITLESS SCALE</div>
            Sharing user-contributed computing power to scale to huge audiences
        </li>
        <li>
            <svg viewBox="80 70 70 70">
                <use xlink:href="./img/under-the-hood.svg#scriptable"></use>
            </svg>
            <div class="title">SCRIPTABLE API</div>
            Develop your own experiences via a robust Javascript API
        </li>
        <li>
            <svg viewBox="0 140 70 70">
                <use xlink:href="./img/under-the-hood.svg#devices"></use>
            </svg>
            <div class="title">MANY DEVICES & INPUTS</div>
            Supports HTC Vive, Oculus Rift, Hydra, PrioVR, Leap Motion and many others
        </li>
        <li>
            <svg viewBox="80 140 70 70">
                <use xlink:href="./img/under-the-hood.svg#scalability"></use>
            </svg>
            <div class="title">CONTENT SCALABILITY</div>
            Dynamic assignment of multiple nested levels of detail using sparse voxel octree structure
        </li>
        <li>
            <svg viewBox="0 210 70 70">
                <use xlink:href="./img/under-the-hood.svg#open-source"></use>
            </svg>
            <div class="title">OPEN SOURCE</div>
            Open source client and server
        </li>
        <li>
            <svg viewBox="80 210 70 70">
                <use xlink:href="./img/under-the-hood.svg#own-domain"></use>
            </svg>
            <div class="title">OWN YOUR DOMAIN</div>
            Claim your unique domain and location names
        </li>
    </ul>
</section>

<section id="blog" class="default-section">
    <h3>Blog</h3>
    <a href="blog" class="external-link">See All Posts</a>

    <div>
        <div class="blog-post">
            <div class="post-date">Tuesday, August 18, 2015</div>
            <div class="post-title">Summer Intern Project: Controllers, Cameras, and Vives</div>
            <div class="post-subtitle">Posted by Sam G. / 3 comments</div>
            <div class="post-text">
                Hey everyone! Sam here. I’ve spent this summer interning at High Fidelity with all these
                awesome developers and here’s some of the stuff I’ve done:<br/>
                To make controllers easier to add and maintain, I moved multiple devices like the hydras, playstation
                controllers, and 360 controllers over to the new UserInputMapper, which [...]
            </div>
            <a href="https://highfidelity.com/blog/2015/09/update-for-september-2015/" class="external-link">Read</a>
        </div>


        <div class="blog-post">
            <div class="post-date">Wednesday, July 17, 2015</div>
            <div class="post-title">Oculus Rift and HTC Vive: First Contact</div>
            <div class="post-subtitle">Posted by Philip Rosedale / 3 comments</div>
            <div class="post-text">
                <img
                    src="http://highfidelity-site-dev.s3.amazonaws.com/blog/wp-content/uploads/2015/09/7fefadf1-decf-4ee4-8a79-8907cf4e4878.jpg">
            </div>

            <a class="external-link" href="https://highfidelity.com/blog/2015/09/measuring-vr-audio-latency/">Read</a>
        </div>

    </div>

</section>

<section id="up-to-date">
    <h3>
        <span class="strong">Stay up to date</span> on the latest from High Fidelity:
    </h3>

    <div id="right-signup">
        <a href="https://www.youtube.com/user/HighFidelityio" class="external-link">
            <svg viewBox="40 0 34 29">
                <use xlink:href="./img/up-to-date.svg#subscribe"></use>
            </svg>
            Subscribe to us
            <svg class="right-arrow" viewBox="0 0 7 19">
                <use xlink:href="./img/right-arrow.svg#ra"></use>
            </svg>

        </a>
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
        The expressive faces looked incredibly human-like, which adds a whole other dimension to the interaction by
        invoking emotion
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
    <a href="https://worklist.net/" class="external-link">See All Jobs</a>

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

        <p> Check out our job listings, or visit Worklist, our distributed development system, and show us what you’ve
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


<!--

<?php /*


<section id="placenames">
    <article>
        <p class='online-domain-count'>
            <a href="https://metaverse.highfidelity.com/directory" target="_blank">There
                are <?php echo View::read('onlinedomains') ?> domains online now.</a>
        </p>
        <ul>
            <?php foreach (View::read('places') as $place): $i++; ?>
                <li>
                    <a href="<?php echo htmlentities($place->address) ?>">
                        <img
                            src="<?php echo htmlentities($place->previews->thumbnail) ?>"
                            hdsrc="<?php echo htmlentities($place->previews->lobby) ?>"/>
                        <h4><?php echo htmlspecialchars($place->name) ?></h4>

                        <p><?php echo htmlspecialchars($place->description) ?></p>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <a href="https://metaverse.highfidelity.com/directory" id="metaverse" target="_blank">See more places</a>

    </article>
    <article>
        <h3>We are now open for <a href="https://highfidelity.com/blog/2015/04/high-fidelity-open-alpha/">Alpha use</a>
        </h3>

        <a href="https://metaverse.highfidelity.com/signup">Create an account</a>
    </article>
    <article id="openvr">
        <ul>
            <li>
                Deploy a shared virtual space as easily as deploying a website
            </li>
            <li>
                Build complex interactive experiences using standard formats, tools and languages
            </li>
            <li>
                Share computers and scale to huge audiences
            </li>
        </ul>
    </article>
</section>
<div id="container">
    <section id="company">
        <article>
            <h2>The company</h2>

            <p class="lead">
                We believe that both the hardware and the internet infrastructure <strong>are now available
                    to give people around the world access to an interconnected Metaverse</strong> that will offer
                a broad range of capabilities for creativity, education, exploration, and play. And by using
                all of our computers together in an open shared network, we can simulate this space at a far
                larger scale than would be possible by any single company or centrally hosted system.
            </p>

            <p>
                By using a range of new hardware devices like the Oculus Rift, Samsung Gear VR, Leap Motion, PrioVR,
                Sixsense, and depth cameras, the experience of exploring these worlds can be incredibly immersive and
                the interaction with others lifelike and emotional.
            </p>

            <p>
                Our ongoing development and R&amp;D work focuses on several areas:
            </p>
        </article>
        <article>
            <h3>Low-latency sensor-based interaction between avatars</h3>

            <p>
                We use inexpensive webcams and motion controllers to capture gaze, facial expressions,
                and body language, which is then streamed at low latency along with 3D positional
                audio to establish lifelike presence. We also use head-mounted displays like the Oculus Rift
                for full immersion, as well as hand and full body motion controllers.
            </p>

            <h3>Content scalability</h3>

            <p>
                Virtual worlds servers using a spatial tree structure for storage are nested inside each other
                and dynamically assigned to handle content load. 3D content from multiple formats can be loaded
                into the world and presented at multiple levels of detail.
            </p>

            <h3>Audience scalability</h3>

            <p>
                We're building an architecture that can dynamically recruit servers from user-contributed pools
                of devices to scale across rapidly varying audiences.
            </p>
        </article>
    </section>
    <section id="team">
        <article>
            <h2>The team</h2>
            <ul>
                <li>
                    <figure>
                        <img src="img/team/philip.gif" class="img-circle" alt="Philip Rosedale"/>

                        <h3>Philip Rosedale</h3>

                        <p>
                            Thinks assembly language is cool.
                            Physics, automata, electronics, boxing.
                        </p>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="img/team/ryan.gif" class="img-circle" alt="Ryan Karpf"/>

                        <h3>Ryan Karpf</h3>

                        <p>
                            Design-minded. Thinks MVP has too
                            many letters.
                            Loves Syd Mead and making fresh pasta.
                        </p>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="img/team/freidrica.gif" class="img-circle" alt="Freidrica Heiberger"/>

                        <h3>Freidrica Heiberger</h3>

                        <p>
                            Thinks about audio design, economic
                            models, and what's for dinner. Encased
                            meat practitioner.
                        </p>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="img/team/leo.gif" class="img-circle" alt="Leonardo Murillo"/>

                        <h3>Leonardo Murillo</h3>

                        <p>
                            Enjoys juggling terminals,
                            AWS consoles, IDEs and playdough.
                            Avid cyclist. SciFi aficionado.
                        </p>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="img/team/stephen.gif" class="img-circle" alt="Stephen Birarda"/>

                        <h3>Stephen Birarda</h3>

                        <p>
                            Constant refactorer. Believes that
                            programming is art.
                            Obsessive hockey fan, secret ping pong champion.
                        </p>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="img/team/brad.png" class="img-circle" alt="Brad Hefta-Gaub"/>

                        <h3>Brad Hefta-Gaub</h3>

                        <p>
                            Hacker Punk who runs<br/>
                            fifty miles for his coffee,<br/>
                            eggs, bacon, and gin.
                        </p>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="img/team/emily.png" class="img-circle" alt="Emily Donald"/>

                        <h3>Emily Donald</h3>

                        <p>
                            Manages office systems to make life easier.
                            Fast talker, avid learner, novice
                            salsa dancer, and great cook.
                        </p>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="img/team/clement.png" class="img-circle" alt="Clement Brisset"/>

                        <h3>Cl&eacute;ment Brisset</h3>

                        <p>
                            Pool shark that fights the French stereotypes. Can solve a Rubik's Cube blindfolded.<br/>
                            Science = Awesome.
                        </p>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="img/team/andrew.png" class="img-circle" alt="Andrew Meadows"/>

                        <h3>Andrew Meadows</h3>

                        <p>
                            Physicist, motorcyclist, and listener
                            of Pink Floyd. Convinced all problems
                            have technical solutions.
                        </p>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="img/team/ozan.png" class="img-circle" alt="Ozan Serim"/>

                        <h3>Ozan Serim</h3>

                        <p>
                            Tenacious CG generalist in pursuit of
                            character, music, film and story.
                        </p>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="img/team/chris.png" class="img-circle" alt="Chris Collins"/>

                        <h3>Chris Collins</h3>

                        <p>
                            Gets excited when people use his products.
                            Life hacker with kid-like curiosity.
                            Animal spotter.
                        </p>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="img/team/sam.png" class="img-circle" alt="Sam Gateau"/>

                        <h3>Samuel Gateau</h3>

                        <p>
                            Minimalist Pixel Pusher.
                        </p>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="img/team/seth.png" class="img-circle" alt="Seth Alves"/>

                        <h3>Seth Alves</h3>

                        <p>
                            Videogame aficionado, Computer Programmer,
                            Skeptical of technology. Bicycles in traffic.
                        </p>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="img/team/brad-davis.png" class="img-circle" alt="Bradley Austin Davis"/>

                        <h3>Bradley Austin Davis</h3>

                        <p>
                            Has trouble passing the Turing test. VR, rendering, cryptography.
                            Writes about Oculus. Understudy to the great/powerful Oz.
                        </p>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="img/team/eric.png" class="img-circle" alt="Eric Levin"/>

                        <h3>Eric Levin</h3>

                        <p>
                            Loves creative coding, yoga, and hiking.
                        </p>
                    </figure>
                </li>
                <li id="youimg">
                    <figure>
                        <div class="img-circle"></div>
                        <h3>You?</h3>

                        <p>
                            You've dated SoLoMo, but you need something
                            more. An OpenGL master; perhaps enamored of
                            shaders and L-systems. You love algorithms
                            and are not afraid of C. Is this you?
                            <a href="mailto:<?php echo CONTACT_EMAIL_ADDRESS; ?>">Email us</a>.
                        </p>
                    </figure>
                </li>
            </ul>
        </article>
    </section>
    <section id="investors">
        <article>
            <h2>Investors</h2>
            <ul>
                <li>
                    <h3>True Ventures</h3>
                </li>
                <li>
                    <h3>Vulcan Capital</h3>
                </li>
                <li>
                    <h3>Kapor Capital</h3>
                </li>
                <li>
                    <h3>Google Ventures</h3>
                </li>
                <li>
                    <h3>Linden Lab</h3>
                </li>
                <li>
                    <h3>HTC</h3>
                </li>
            </ul>
            <p>And an intriguing assortment of forward-looking angels.</p>
        </article>
    </section>
    <section id="advisors">
        <article>
            <h2>Advisors</h2>
            <ul>
                <li>
                    <a target="_blank" href="http://en.wikipedia.org/wiki/Peter_Diamandis">
                        <figure>
                            <img src="img/advisors/peter_diamandis.jpg" alt="Peter Diamandis"/>

                            <h3>Peter Diamandis</h3>
                        </figure>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="http://profiles.ucsf.edu/adam.gazzaley">
                        <figure>
                            <img src="img/advisors/adam_gazzaley.jpg" alt="Adam Gazzaley"/>

                            <h3>Adam Gazzaley</h3>
                        </figure>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="http://www.tonyparisi.com">
                        <figure>
                            <img src="img/advisors/tonyparisi.jpg" alt="Tony Parisi"/>

                            <h3>Tony Parisi</h3>
                        </figure>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://mrl.nyu.edu/~perlin/">
                        <figure>
                            <img src="img/advisors/ken_perlin.png" alt="Ken Perlin"/>

                            <h3>Ken Perlin</h3>
                        </figure>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://comm.stanford.edu/faculty-bailenson/">
                        <figure>
                            <img src="img/advisors/jeremy_bailenson.png" alt="Jeremy Bailenson"/>

                            <h3>Jeremy Bailenson</h3>
                        </figure>
                    </a>
                </li>
            </ul>
        </article>
    </section>
</div>

 */ ?>

 -->
