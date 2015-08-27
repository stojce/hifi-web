<?php
$json = trim(str_replace(PHP_EOL, '', View::read('slideshowData')));
?>
<div class="galleria galleria-theme-fullscreen">
</div>
<script>
    var slideData = <?php echo "'" , $json , "';"; ?>

</script>
