<?php if ($_POST) { ?>
  <?php if ( random_int(0, 10) <= 4 ) { ?>
    <iframe id="iframe" src="https://giphy.com/embed/7rj2ZgttvgomY" width="480" height="275" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
    <audio id="audio" preload="auto" autoplay>
      <source src="../template/applause.mp3" type="audio/mp3">
    </audio>
  <?php } else { ?>
    <iframe id="iframe" width="560" height="315" src="https://www.youtube.com/embed/JBHKVAs85Ko?autoplay=1&amp;rel=0&amp;controls=0&amp;showinfo=0&amp;start=13" frameborder="0" allowfullscreen></iframe>
  <?php } ?>
  <script>
  var iframe = document.getElementById("iframe");
  window.onload = function() {
    window.setTimeout(function() {
      iframe.style.display = "none";
    }, 10500);
  }
  </script>
<?php } ?>
