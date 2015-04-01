<?php $i = 0; ?>
<section id="placenames">
  <article>
    <h3>Up &amp; running now</h3>
    <ul>
      <?php foreach(View::read('places') as $place): $i++; ?>
        <li>
          <a href="<?php echo htmlentities($place->address) ?>">
            <img
             src="<?php echo htmlentities($place->previews->thumbnail) ?>"
             hdsrc="<?php echo htmlentities($place->previews->lobby) ?>" />
            <h4><?php echo htmlspecialchars($place->name) ?></h4>
            <p><?php echo htmlspecialchars($place->description) ?></p>
          </a>
        </li>
      <?php endforeach; ?>
      <li>
        <a href="http://metaverse.highfidelity.io/">
          See more
        </a>
      </li>
    </ul>
    <p>
      There are <?php echo View::read('onlinedomains') ?> domains online now.
    </p>
  </article>
  <article id="openvr">
    <h3>Open Source software for shared Virtual Reality</h3>
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
  <article>
    <h3>Getting started</h3>
    <form id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form">
      <fieldset>
        <div>
          <a class='download-btn' href="/download">Download</a>
        </div>
      </fieldset>
      <fieldset>
        <div>
          <a class='download-btn' href="/download">Download</a>
        </div>
      </fieldset>
      <fieldset>
        <p>
          <a class='account-link' href="https://metaverse.highfidelity.com/signup">Create an account</a>
        </p>
      </fieldset>
    </form>
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
              many letters.
              Loves Syd Mead and making fresh pasta.
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
              Designer &amp; generalist. <br />
              Amateur carpenter. <br />
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
              programming is art.
              Obsessive hockey fan, secret ping pong champion.
            </p>
          </figure>
        </li>
        <li>
          <figure>
            <img src="img/team/brad.png" class="img-circle" alt="Brad Hefta-Gaub" />
            <h3>Brad Hefta-Gaub</h3>
            <p>
              Hacker Punk who runs<br />
              fifty miles for his coffee,<br />
              eggs, bacon, and gin.
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
              salsa dancer, and great cook. 
            </p>
          </figure>
        </li>
        <li>
          <figure>
            <img src="img/team/clement.png" class="img-circle" alt="Clement Brisset" />
            <h3>Cl&eacute;ment Brisset</h3>
            <p>
              Pool shark that fights the French stereotypes. Can solve a Rubik's Cube blindfolded.<br />
              Science = Awesome. 
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
        <li>
          <figure>
            <img src="img/team/sam.png" class="img-circle" alt="Sam Gateau" />
            <h3>Samuel Gateau</h3>
            <p>
              Minimalist Pixel Pusher. 
            </p>
          </figure>
        </li>
        <li>
          <figure>
            <img src="img/team/seth.png" class="img-circle" alt="Seth Alves" />
            <h3>Seth Alves</h3>
            <p>
              Videogame aficionado, Computer Programmer,
              Skeptical of technology. Bicycles in traffic.
            </p>
          </figure>
        </li>
        <li>
          <figure>
            <img src="img/team/brad-davis.png" class="img-circle" alt="Bradley Austin Davis" />
            <h3>Bradley Austin Davis</h3>
            <p>
              Has trouble passing the Turing test. VR, rendering, cryptography.
              Writes about Oculus. Understudy to the great/powerful Oz.
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
              shaders and  L-systems. You love algorithms 
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
          <a target="_blank" href="http://profiles.ucsf.edu/adam.gazzaley">
            <figure>
              <img src="img/advisors/adam_gazzaley.jpg" alt="Adam Gazzaley" />
              <h3>Adam Gazzaley</h3>
            </figure>
          </a>
        </li>
        <li>
          <a target="_blank" href="http://www.tonyparisi.com">
            <figure>
              <img src="img/advisors/tonyparisi.jpg" alt="Tony Parisi" />
              <h3>Tony Parisi</h3>
            </figure>
          </a>
        </li>
      </ul>
    </article>
  </section>
</div>
