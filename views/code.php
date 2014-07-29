<?php
$github_repos = View::read('github_repos');
?>

<canvas id="canvas" height="220" width="715"></canvas>
<div role="main" id="main">

    <?php foreach ($github_repos as $repo): ?>
        <div class="cloud">
            <h2><a href="//github.com/<?php echo $repo['github_repo']; ?>">
                    <i class="icon-github"></i><?php echo $repo['title']; ?></a></h2>
            <h3><?php echo $repo['description']; ?></h3>
            <?php if (!empty($repo['words'])): ?>
                <ul>
                    <?php foreach ($repo['words'] as $item): ?>
                        <li weight="<?php echo $item['weight']; ?>" related="<?php echo $item['related']; ?>">
                            <?php echo $item['text']; ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

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