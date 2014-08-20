<?php
$videos = View::read('videos');
$last_video = $videos[0];

$posts = View::read('posts');
?>
<section role="main" id="main">
  <iframe src="" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
  </iframe>
  <ul>
    <?php foreach($videos as $video): ?>
    <li class="<?php echo $last_video == $video ? 'current' : ''; ?>">
      <a href="<?php echo $video->url; ?>">
        <img src="<?php echo $video->thumbnail_medium; ?>" title="<?php echo htmlspecialchars($video->title); ?>"/>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</section>
<section id="blog">
  <article>
    <h3>Blog</h3>
    <?php foreach($posts as $post): setup_postdata($post); ?>
      <h4>
        <a href="<?php echo $post->guid; ?>" title="<?php echo $post->post_title; ?>">
          <?php echo $post->post_title; ?>
        </a>
        <em>by <a href="<?php echo get_author_posts_url($post->post_author); ?>"><?php the_author(); ?></a></em>
      </h4>
    <?php endforeach; ?>
  </article>
</section>
<section id="company">
  <article>
    <p class="lead">
      <strong><span>High Fidelity</span> powers inter-connected virtual worlds, using new hardware devices to 
      catalyze entirely new kinds of interactions between avatars.</strong> Our open source
      software architecture enables unlimited scalability of both content and audience.
    </p>
    <p>
      We are currently Alpha testing. You'll find our
      <a href="https://github.com/highfidelity/hifi" target="_blank">code on GitHub</a>,
      so you can use it today as well as make open source contributions. 
      <a href="#">We are hiring</a>.
      You can also help with paid part-time development using our <a href="https://worklist.net">Worklist system</a>
    </p>
    <p>
      <strong>We believe that both the hardware and the internet infrastructure are now available
      to give billions of people access to an interconnected "Metaverse" that will offer a broad
      range of capabilities for creativity, education, exploration, and play</strong>. And by using
      all of our computers together in an open shared network, we can simulate this space at a far
      larger scale than would be possible by any single company or centrally hosted system.
    </p>
    <p>
      By using a range of new hardware devices like the Oculus Rift, Leap Motion, PrioVR, Sixsense,
      and Depth Cameras, the experience of exploring these worlds can be incredibly immersive and the
      interaction with others lifelike and emotional.
    </p>
    <p>
      Our ongoing development and R&amp;D work focuses on several areas:
    </p>
  </article>
  <article>
    <h3>Low-latency sensor based interaction between avatars</h3>
    <p>
      We are using inexpensive webcams and motion controllers to capture gaze, facial expressions,
      and body language, which is then streamed at low latency along with high fidelity 3D positional
      audio to establish lifelike presence. We also use the Oculus Rift for full immersion, as well
      as hand and full body motion controllers.
    </p>
    <h3>Content scalability</h3>
    <p>
      Virtual worlds servers using a spatial tree structure for storage are nested inside each other
      and dynamically assigned to handle content load. 3D content from multiple formats can be loaded
      into the world and presented at multiple levels of detail and/or transformed into voxels to allow
      for infinite draw distances.
    </p>
    <h3>Audience scalability</h3>
    <p>
      Servers recruited from user-contributed pools of devices are dynamically reassigned to rebroadcasting
      trees to allow rapidly varying audiences at any scale.
    </p>
    <h3>Crypto-currency backed device ecosystem</h3>
    <p>
      Creators of virtual worlds using High Fidelity software can contribute their servers and other devices
      to each other for scalability, using a digital currency that compensates participants for shared 
      machine time.
    </p>
    <div id="device-network">
      <?php include('img/home/device-network.svg'); ?>
    </div>
  </article>
</section>
<section id="team">
  <article>
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
        </figure>
      </li>
      <li>
        <figure>
          <img src="img/team/andrzej.png" class="img-circle" alt="Andrzej Kapolka" />
          <h3>Andrzej Kapolka</h3>
          <p>
              Former Puzzle Pirate and Spiral Knight.  Loves abstraction, reflection, and 3D geometry.  Pronounced 'Onjay.' 
          </p>
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
  </article>
</section>
<section id="investors">
  <article>
    <h2>Investors</h2>
    <ul>
      <li
        data-0="left: 2000px; transform:rotate(-90deg);"
        data-5620="left: 2000px; transform:rotate(-90deg);"
        data-6020="left: -80px; transform:rotate(0deg);">
        <h3>True Ventures</h3>
      </li>
      <li
        data-0="left: 2000px; transform:rotate(90deg); margin-top: 9px;"
        data-5660="left: 2000px; transform:rotate(90deg); margin-top: 9px;"
        data-6060="left: 135px; transform:rotate(16deg);">
        <h3>Google Ventures</h3>
      </li>
      <li
        data-0="left: 2000px; transform:rotate(160deg); margin-top: 20px;"
        data-5600="left: 2000px; transform:rotate(160deg); margin-top: 20px;"
        data-6000="left: 370px; transform:rotate(2deg);">
        <h3>Kapor Capital</h3>
      </li>
      <li
        data-0="left: 2000px; transform:rotate(-160deg); margin-top: 185px;"
        data-5740="left: 2000px; transform:rotate(-160deg); margin-top: 185px;"
        data-6140="left: 60px; transform:rotate(4deg);">
        <h3>Linden Lab</h3>
      </li>
      <li
        data-0="left: 2000px; transform:rotate(-160deg); margin-top: 200px;"
        data-5780="left: 2000px; transform:rotate(-160deg); margin-top: 200px;"
        data-6180="left: 275px; transform:rotate(0deg);">
        <p>And an intriguing assortment of forward-looking angels.</p>
      </li>
    </ul>
  </article>
</section>
<section id="advisors">
  <article>
    <h2>Advisors</h2>
    <ul>
      <li>
        <a target="_blank" href="http://en.wikipedia.org/wiki/Peter_Diamandis">
          <figure>
            <img src="img/advisors/peter_diamandis.jpg" alt="Peter Diamandis" />
            <h3>Peter Diamandis</h3>
          </figure>
        </a>
      </li>
      <li>
        <a target="_blank" href="http://profiles.ucsf.enu/adam.gazzaley">
          <figure>
            <img src="img/advisors/adam_gazzaley.jpg" alt="Adam Gazzaley" />
            <h3>Adam Gazzaley</h3>
          </figure>
        </a>
      </li>
      <li>
        <a target="_blank" href="http://www.tonyparisi.com/">
          <figure>
            <img src="img/advisors/tonyparisi.jpg" alt="Tony Parisi" />
            <h3>Tony Parisi</h3>
          </figure>
        </a>
      </li>
    </ul>
  </article>
</section>