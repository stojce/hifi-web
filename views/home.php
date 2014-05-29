<?php
$jobs = View::read('jobList');
?>
<div id="alpha">
    <p>
        Interested in contributing to the Alpha stage of High Fidelity?
    </p>
    <p>
        Sign up here, and we'll email you when we are ready for help.
    </p>
    <a class="button" href="./alpha">
        Sign up for Alpha
    </a>
</div>
<div role="main" id="main">
    <article>
        <p class="lead">If it doesn't hurt  to think about it, we're not going to try it.</p>
        <h2>The Idea</h2>
        <p>
            <em>We're building a new virtual world</em> enabling rich
            avatar interactions driven by sensor-equipped
            hardware, simulated and served by devices (phones,
            tablets and laptops/desktops) contributed by
            end-users.
        </p>
        <h2>The Matter</h2>
        <p>
            <em>Voxels</em>. We're making a strategic bet that rich computer
            rendering is heading there. Imagine an experience
            with cubes of many different sizes, with the ability to
            scale them down to <em>a seamless molecular fabric</em>. Now
            imagine these building blocks manifesting complex
            physical properties.
        </p>
        <p>
            Finally, imagine that world extending visibly to
            vanishing points like our world does today, enabling
            you to <em>see your house, your neighborhood, distant
            mountains, and other planets in the sky</em>. We
            believe computing power and network transmission
            speeds are evolving to make such a world possible,
            represented by a sparse voxel octree data structure.
        </p>
        <p class="image" id="octal-address">
            <img src="img/octal-address-diagram.png" alt="octal address" />
        </p>
        <h2>The Engine</h2>
        <p>
            <em>A new kind of cloud</em>. We're building a coordination
            system enabling millions of people to contribute their
            devices and share them to simulate the virtual world.
        </p>
        <p>
            If we can successfully build this collective cloud,
            we think we can enable <em>audience sizes for shared
            experiences that are orders of magnitude larger</em>
            than what is possible today. Imagine contributing your
            computer to a project like SETI, but instead having it
            simulate part of the virtual world, and earning virtual
            world currency in exchange for helping to power the
            grid.
        </p>
        <p class="image" id="data-transmission">
            <img src="img/data-transmission-diagram.png" alt="data transmission" />
        </p>
        <h2>The Fetish</h2>
        <p>
            <em>Speed</em>. We hate latency. and think it's both
            imperative and possible to have a lot less of it in
            the world we're building.            
        </p>
        <p>
            <em>We believe that if the latency between avatars</em>
            (the time between when you do or say something
            and when others see or hear it) <em>can be kept
            very brief, magic will happen</em>. We think richly
            rendered avatars capturing head movements,
            eye movements, and body language offer much
            more compelling person-to-person interaction
            possibilities than the poorly-lit, awkwardly-framed
            facsimiles of ourselves we share through
            videoconferencing today.
        </p>
        <h2>The Threads</h2>
        <p>
            <em>We work in labcoats</em>. Starched and ironed.
        </p>
        <h2>The Ask</h2>
        <p>
            <em>Does our pursuit interest you?</em> See our 
            <a href="./jobs" title="High Fidelity jobs">jobs page</a> for more
            details. Or help us now. Our internal distributed development system, 
            <a href="<?php echo WORKLIST_URL; ?>" target="_blank">Worklist</a>, is
            ready for new developers. Sign up, do some work, and get paid.
        </p>
    </article>
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
    <figure id="flocking">
        <img src="img/flocking-with-colors-inverted.jpg" alt="flocking dots" />
        <figcaption>
            <a class="grey-link" target="_blank" href="http://youtu.be/hX_c0m-o2K8">What are these dots?</a>
        </figcaption>
    </figure>
</div>
<div class="fade-container"></div>
<section id="team">
    <div>
        <h2>Team</h2>
        <ul>
            <li>
                <figure>
                    <img src="img/team/philip.gif" class="img-circle" alt="Philip Rosedale" />
                    <h3>Philip Rosedale</h3>
                    <p>
                        Thinks assembly language is cool. 
                        Physics, automata, electronics, boxing.
                    </p>
                    <p class="person-disco">
                        <a class="person-disco-stop"></a>
                        <a class="person-disco-play active"></a>
                        <a class="person-disco-pause"></a>
                    </p>
                    <audio preload="auto" autobuffer>
                      <source src="grooves/HiFiWebPhilip.mp3"/>
                      <source src="grooves/HiFiWebPhilip.ogg"/>
                    </audio>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="img/team/ryan.gif" class="img-circle" alt="Ryan Karpf" />
                    <h3>Ryan Karpf</h3>
                    <p>
                        Design-minded. Thinks MVP has too 
                        many letters. Loves Syd Mead and 
                        making fresh pasta.
                    </p>
                    <p class="person-disco">
                        <a class="person-disco-stop"></a>
                        <a class="person-disco-play active"></a>
                        <a class="person-disco-pause"></a>
                    </p>
                    <audio preload="auto" autobuffer>
                      <source src="grooves/HiFiWebRyan.mp3"/>
                      <source src="grooves/HiFiWebRyan.ogg"/>
                    </audio>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="img/team/freddy.gif" class="img-circle" alt="Freddy Heiberger" />
                    <h3>Freddy Heiberger</h3>
                    <p>
                        Thinks about audio design, economic 
                        models, and what's for dinner. Encased 
                        meat practitioner.
                    </p>
                    <p class="person-disco">
                        <a class="person-disco-stop"></a>
                        <a class="person-disco-play active"></a>
                        <a class="person-disco-pause"></a>
                    </p>
                    <audio preload="auto" autobuffer>
                      <source src="grooves/HiFiWebFreddy.mp3"/>
                      <source src="grooves/HiFiWebFreddy.ogg"/>
                    </audio>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="img/team/grayson.gif" class="img-circle" alt="Grayson Stebbins" />
                    <h3>Grayson Stebbins</h3>
                    <p>
                        Designer &amp; generalist. Amateur carpenter. 
                        Analog, digital, universal.
                    </p>
                    <p class="person-disco">
                        <a class="person-disco-stop"></a>
                        <a class="person-disco-play active"></a>
                        <a class="person-disco-pause"></a>
                    </p>
                    <audio preload="auto" autobuffer>
                      <source src="grooves/HiFiWebGrayson.mp3"/>
                      <source src="grooves/HiFiWebGrayson.ogg"/>
                    </audio>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="img/team/leo.gif" class="img-circle" alt="Leonardo Murillo" />
                    <h3>Leonardo Murillo</h3>
                    <p>
                        Enjoys juggling terminals, 
                        AWS consoles, IDEs and playdough. 
                        Avid cyclist. SciFi aficionado.
                     </p>
                    <p class="person-disco">
                        <a class="person-disco-stop"></a>
                        <a class="person-disco-play active"></a>
                        <a class="person-disco-pause"></a>
                    </p>
                        <audio preload="auto" autobuffer>
                        <source src="grooves/HiFiWebLeo.mp3"/>
                        <source src="grooves/HiFiWebLeo.ogg"/>
                      </audio>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="img/team/stephen.gif" class="img-circle" alt="Stephen Birarda" />
                    <h3>Stephen Birarda</h3>
                    <p>
                        Constant refactorer. Believes that 
                        programming is art. Obsessive hockey 
                        fan, secret ping pong champion.
                    </p>
                    <p class="person-disco">
                        <a class="person-disco-stop"></a>
                        <a class="person-disco-play active"></a>
                        <a class="person-disco-pause"></a>
                    </p>
                    <audio preload="auto" autobuffer>
                      <source src="grooves/HiFiWebBirarda.mp3"/>
                      <source src="grooves/HiFiWebBirarda.ogg"/>
                    </audio>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="img/team/brad.png" class="img-circle" alt="Brad Hefta-Gaub" />
                    <h3>Brad Hefta-Gaub</h3>
                    <p>
                        Hacker Punk who runs
                        fifty miles for his coffee,
                        eggs, bacon, and gin.
                    </p>
                    <p class="person-disco">
                        <a class="person-disco-stop"></a>
                        <a class="person-disco-play active"></a>
                        <a class="person-disco-pause"></a>
                    </p>
                    <audio preload="auto" autobuffer>
                      <source src="grooves/HiFiWebBrad.mp3"/>
                      <source src="grooves/HiFiWebBrad.ogg"/>
                    </audio>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="img/team/andrzej.png" class="img-circle" alt="Andrzej Kapolka" />
                    <h3>Andrzej Kapolka</h3>
                    <p>
                        Former Puzzle Pirate and Spiral Knight.  Loves abstraction, reflection, and 3D geometry.  Pronounced 'Onjay.' 
                    </p>
                    <p class="person-disco">
                        <a class="person-disco-stop"></a>
                        <a class="person-disco-play active"></a>
                        <a class="person-disco-pause"></a>
                    </p>
                    <audio preload="auto" autobuffer>
                      <source src="grooves/HiFiWebAndrzej.mp3"/>
                      <source src="grooves/HiFiWebAndrzej.ogg"/>
                    </audio>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="img/team/emily.png" class="img-circle" alt="Emily Donald" />
                    <h3>Emily Donald</h3>
                    <p>
                        Manages office systems to make life easier. 
                        Fast talker, avid learner, novice 
                        salsa dancer, <br/>and great cook. 
                    </p>
                    <p class="person-disco">
                        <a class="person-disco-stop"></a>
                        <a class="person-disco-play active"></a>
                        <a class="person-disco-pause"></a>
                    </p>
                    <audio preload="auto" autobuffer>
                      <source src="grooves/HiFiWebEmily.mp3"/>
                      <source src="grooves/HiFiWebEmily.ogg"/>
                    </audio>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="img/team/andrew.png" class="img-circle" alt="Andrew Meadows" />
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
                    <img src="img/team/ozan.png" class="img-circle" alt="Ozan Serim" />
                    <h3>Ozan Serim</h3>
                    <p>
                        Tenacious CG generalist in pursuit of 
                        character, music, film and story.
                    </p>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="img/team/chris.png" class="img-circle" alt="Chris Collins" />
                    <h3>Chris Collins</h3>
                    <p>
                        Gets excited when people use his products. 
                        Life hacker with kid-like curiosity. 
                        Animal spotter.
                    </p>
                </figure>
            </li>
            <li id="youimg">
                <figure>
                    <div class="img-circle"></div>
                    <h3>You?</h3>
                    <p>
                        You've dated SoLoMo, but you need something 
                        more. An OpenGL master; perhaps enamored by 
                        voxels and  L-systems. You love algorithms 
                        and are not afraid of C. Is this you?
                        <a href="mailto:<?php echo CONTACT_EMAIL_ADDRESS; ?>">Email us</a>.
                    </p>
                </figure>
            </li>
        </ul>
    </div>        
</section>
<div class="disco-container">
  <div class="disco-circle-1 disco-circle"></div>
  <div class="disco-circle-2 disco-circle"></div>
  <div class="disco-circle-3 disco-circle"></div>
  <div class="disco-circle-4 disco-circle"></div>
</div>
