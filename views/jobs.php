<?php
$jobs = View::read('jobList'); 
$tweetStrJob1 = urlencode('@highfidelityinc is working on building a new virtual world and they need a Graphics Engineer! Check out http://highfidelity.io/jobs #jobs #graphics');
$tweetStrJob2 = urlencode('@highfidelityinc is building a new virtual world and they need a Marketing Coordinator! Check out http://highfidelity.io/jobs #jobs #marketing');
?>
<section id="particle-system"></section>
<nav id="joblist">
  <a href="#3d-graphics-engineer"><span data-hover="3D Graphics Engineer">3D Graphics Engineer</span></a>
  <a href="#cpp-generalist"><span data-hover="C++ Generalist">C++ Generalist</span></a>
  <a href="#character-animation-engineer"><span data-hover="Character Animation Engineer">Character Animation Engineer</span></a>
  <a href="#javascript-content-developer"><span data-hover="Javascript Content Developer">Javascript Content Developer</span></a>
</nav>
<div role="main" id="main">
  <h2>Full-time Jobs</h2>
  <article class="no-border-bottom radius-border-top">
    <p class="lead"><a name="3d-graphics-engineer">3D Graphics Engineer</a></p>
    <p>
      We're looking for a 3D graphics engineer to help build our virtual 
      world’s 3D graphics engine, working closely with us to create something 
      astonishing. We are creating an open source rendering engine that can 
      display a very large user-created environment at high FPS, using data 
      streaming at low latency from multiple simultaneous servers.
    </p>
    <div class="requirements">
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
            Experience developing in Git environments
          </span>
        </li>
        <li>
          <span>
            Experience with scripting languages (e.g., Javascript)
          </span>
        </li>
      </ul>
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
  </article>
  <article class="no-border-bottom no-border-top">
    <p class="lead"><a name="cpp-generalist">C++ Generalist</a></p>
    <p>
      An online shared Virtual Reality platform has a lot of moving
      parts: high performance networking with low latency requirements
      using connectionless protocols and dynamic broadcast trees; 3D audio,
      including live mixing and room reflections; head-mounted displays;
      head, body, and hand tracking hardware API's; Physics engines; high
      end 3D rendering, including complex character avatars with both dynamic
      and offline lighting.
    </p>
    <p>
      We're looking for developers with a demonstrated ability to connect the
      dots across multiple disciplines, a willingness to learn new things,
      resilience, a curious personality, and great communication skills that
      make you fun to work with.
    </p>
    <div class="requirements">
      <h3>Requirements</h3>
      <ul>
        <li>
          <span>
            C++ fluency
          </span>
        </li>
        <li>
          <span>
            Esprit de corps
          </span>
        </li>
      </ul>
      <h3>Bonus Points</h3>
      <ul>
        <li>
          <span>
            Strong 3D math skills
          </span>
        </li>
        <li>
          <span>
            Javascript
          </span>
        </li>
        <li>
          <span>
            Git
          </span>
        </li>
        <li>
          <span>
            A track record of working on similarly complex projects
          </span>
        </li>
        <li>
          <span>
            Ping-pong affinity
          </span>
        </li>
      </ul>
    </div>
  </article>
  <article class="no-border-bottom no-border-top">
    <p class="lead"><a name="character-animation-engineer">Character Animation Engineer</a></p>
    <p>
      High Fidelity is breaking new ground using new and upcoming
      hardware like HMD's, depth cameras, and hand/body trackers to
      bring avatars to life with low-latency data streams.  We are
      looking for a developer with passion, skills, and experience in
      creating avatar characters with physics and animation driven by
      these inputs. We want to enable people to shake hands across the
      internet, read each other's body language, and sword fight. Is 
      that too much to ask?
    </p>
    <div class="requirements">
      <h3>Requirements</h3>
      <ul>
        <li>
          <span>
            Fluency in C++
          </span>
        </li>
        <li>
          <span>
            A proven history working on character animation and physics
          </span>
        </li>
        <li>
          <span>
            Strong graphics math skills
          </span>
        </li>
      </ul>
      <h3>Bonus Points</h3>
      <ul>
        <li>
          <span>
            Experience with varied facial rigging techniques
          </span>
        </li>
        <li>
          <span>
            Real-time cloth and hair simulation
          </span>
        </li>
      </ul>
    </div>
  </article>
  <article class="no-border-bottom no-border-top">
    <p class="lead"><a name="javascript-content-developer">Javascript Content Developer</a></p>
    <p>
      Interactive content inside High Fidelity is built using Javascript: from vehicles
      to presentation tools, games, music, guns, ecosystems, paddle-ball...you name it.
      Javascript is also used to extend  High Fidelity's UI itself, for  example, with
      new in-world building tools.
    </p>
    <p>
      We're looking for a San Francisco based javascript developer who wants to sit beside
      us and use the latest features of High Fidelity to build interactive content that will
      demonstrate the capabilities of an open virtual world.
    </p>
    <div class="requirements">
      <h3>Requirements</h3>
      <ul>
        <li>
          <span>
            Solid experience with Javascript 
          </span>
        </li>
        <li>
          <span>
            A portfolio: show us something amazing you've already built
          </span>
        </li>
      </ul>
      <h3>Bonus Points</h3>
      <ul>
        <li>
          <span>
            3D Math Experience
          </span>
        </li>
        <li>
          <span>
            C++ experience
          </span>
        </li>
        <li>
          <span>
            Game development experience
          </span>
        </li>
        <li>
          <span>
            Virtual World content development experience
          </span>
        </li>
        <li>
          <span>
            Physics engine experience (Bullet, etc)
          </span>
        </li>
        <li>
          <span>
            Automata, emergent systems
          </span>
        </li>
      </ul>
    </div>
  </article>
  <article class="no-border-bottom no-border-top">
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
  <article class="radius-border-bottom get-our-attention">
    <p><span class="strong">We are seeing lots of great applicants!</span> If you'd like to get our attention and also have
    more fun than sitting in an interview, do the following:</p>
    <p>Checkout our code on <a href="https://github.com/highfidelity/hifi">GitHub</a>, build the Interface client, and see if you
    can login to Hifi. Then, take a look at <a href="https://worklist.net">Worklist</a> and see if there's a job you can do
    to show us your work skills.</p>
  </article>
  <h2>Contract jobs</h2>
  <article class="no-border-bottom radius-border-top">
    <p class="lead">Raconteur</p>
      <p>
      High Fidelity seeks a master storyteller with a broad command of social media tools to engage customers and
      recruits.
      <br/><br/>
      You have worked in a consumer-facing tech company producing marketing assets across multiple media.
      <br/><br/>
      You communicate your company's ideas in powerful, interesting ways. This includes fresh and frequent short-form
      copy for websites, blogs and social media campaigns. 
      <br/><br/>
      You produce polished video shorts and webinars, and can coordinate events and convention activities.
      <br/><br/>
      You have a flare for language, an eye for detail, and like to work hard to show rather than tell.
      <br/><br/>
      You are self-directed, data driven, and game for working in a fluid startup environment.
      <br/><br/>
      You're comfortable helping to define and revise a continually-shifting set of messages as your company evolves.
      <br/><br/>
      Interested applicants should be sure to include writing samples, social media account management examples,
      multimedia examples, and references. 
      </p>
    <p>
      <a href="mailto:hiring@highfidelity.io">hiring@highfidelity.io</a>
    </p>
    <a class="tweetthis" target="_blank"
      href="http://twitter.com/home/?status=<?php echo $tweetStrJob2; ?>">
      <i class="icon-twitter"></i>
      <span>Tweet this job</span>
    </a>
  </article>
  <article class="line-border-top radius-border-bottom">
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
