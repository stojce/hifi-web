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
</div>