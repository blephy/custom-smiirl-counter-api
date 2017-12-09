<?php if ($_POST) { ?>
  <?php $random = random_int(0, 19); ?>
  <?php if ( $random <= 4 ) { ?>
    <iframe src="https://giphy.com/embed/7rj2ZgttvgomY" width="480" height="275" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
    <audio id="audio2" preload="auto" autoplay>
      <source src="../template/applause.mp3" type="audio/mp3">
    </audio>
    <script type="text/javascript">
      var audio2 = document.getElementById('audio2');
      audio2.autoplay = true;
      audio2.volume = 0.7;
      audio2.currentTime = 0;
      audio2.load();
      audio2.play();
    </script>
  <?php } elseif ( $random <= 9 && $random >= 5 ) { ?>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/JBHKVAs85Ko?autoplay=1&amp;rel=0&amp;controls=0&amp;showinfo=0&amp;start=13&amp;autohide=1" frameborder="0" allowfullscreen></iframe>
  <?php } elseif ( $random <= 14 && $random >= 10 ) { ?>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/O-lbDu-5xUg?autoplay=1&amp;rel=0&amp;controls=0&amp;showinfo=0&amp;start=42&amp;autohide=1" frameborder="0" allowfullscreen></iframe>
  <?php } elseif ( $random <= 19 && $random >= 15 ) { ?>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/nWom_qN2plA?autoplay=1&amp;rel=0&amp;controls=0&amp;showinfo=0&amp;start=53&amp;autohide=1" frameborder="0" allowfullscreen></iframe>
  <?php } ?>
<?php } ?>
