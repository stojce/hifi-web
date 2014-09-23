<section id="gofcanvas">
    <canvas id="canvas" height="300" width="500"></canvas>
</section>
<div role="main" id="main">
    <h2>Press</h2>
    <section id="quotes">
        <ul>
            <li>
                <blockquote>
                    The expressive faces looked <em>incredibly human-like,</em>
                    which adds a whole other dimension to the
                    interaction by invoking <em>emotion</em>
                </blockquote>
                <cite>quoVice News</cite>
            </li>
            <li>
                <blockquote>
                    With this incredibly innovative interface, <em>virtual realities,</em> 
                    once exclusive to the fantastical world of gaming, <em>may very well 
                    become an integral part of our daily lives</em>
                </blockquote>
                <cite>CNET</cite>
            </li>
        </ul>
    </section>

    <div id="game-of-life">
        <!--
            GAME OF LIFE - http://pmav.eu

            Controls:
                'R' - run / pause the game
                'S' - step
                'C' - clear

        -->
        <div class="box">
            <div class="subtitle">Running Information</div>
            <p class="info"><abbr title="Current Generation">Generation</abbr>: <span id="generation"></span> | <abbr
                    title="Number of live cells">Live cells</abbr>: <span id="livecells"></span> | <abbr
                    title="Execution times: Algorithm / Canvas (Algorithm / Canvas Averages)">Step time</abbr>: <span
                    id="steptime"></span> ms</p>

            <span id="hint">Hint: hit the <strong>Play</strong> button!</span>
        </div>
        <div class="box controls">
            <div class="subtitle">Controls</div>
            <form action="">
                <input type="button" value="Run" id="buttonRun" title="Key: R"/>
                <input type="button" value="Step" id="buttonStep" title="Key: S"/>
                <input type="button" value="Clear" id="buttonClear" title="Key: C"/>

                <input type="button" value="Export" id="buttonExport"/>
                <span id="exportUrl">
                    | <a id="exportUrlLink">Link</a>
                    | <a id="exportTinyUrlLink" title="Tiny URL">Create micro URL</a></span>
            </form>
        </div>
        <div class="box layout">
            <div class="subtitle">Layout</div>
            <form>
                <input type="button" id="buttonTrail" value="Trail"/>
                <input type="button" id="buttonGrid" value="Grid"/>
                <input type="button" id="buttonColors" value="Colors"/>
                <span id="layoutMessages"></span>
            </form>
        </div>
   </div>
</div>