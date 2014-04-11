<?php
$words = View::read('words');
?>
<div role="main" id="main">
    <div id="cloud">
        <h2>A look into our code</h2>
        <h3>Keywords from recent pull requests</h3>
        <ul>
            <?php for($i = 0; $i < 12; $i++) { ?>
                <div class="stamp"></div>
            <?php } ?>
            <div class="gutter-sizer"></div>
            <?php foreach($words as $item): ?>
                <li
                 weight="<?php echo $item['weight']; ?>" 
                 related="<?php echo $item['related']; ?>">
                    <?php echo $item['text']; ?>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>
