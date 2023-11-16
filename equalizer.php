<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Equalizer</title>
  <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
  <div class="container">
    <h1>Equalizer</h1>

    <div class="sliders">
      <label for="low">Low</label>
      <input type="range" id="low" min="-10" max="10" step="1" value="0" oninput="updateEqualizer()">

      <label for="mid">Mid</label>
      <input type="range" id="mid" min="-10" max="10" step="1" value="0" oninput="updateEqualizer()">

      <label for="high">High</label>
      <input type="range" id="high" min="-10" max="10" step="1" value="0" oninput="updateEqualizer()">
    </div>

    <audio id="audio" controls>
      <source src="<?php echo getAudioFileURL(); ?>" type="audio/mp3">
      Your browser does not support the audio element.
    </audio>
  </div>

  <script src="scripts/script.js"></script>
</body>

</html>