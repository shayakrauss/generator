<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Generator :: Home</title>
  <link rel="stylesheet" href="css/global.css">
</head>
<body>

  <div class="error" id="mainErrorMsg"></div>

  <form id="genForm">
    <select name="genSelect" id="genSelect">
      <option value="">What Do You Want to Generate?</option>
      <option value="base64_encode">Base64 Encode</option>
      <option value="base64_decode">Base64 Decode</option>
      <option value="url_shorten">Shorten URL</option>
    </select>
    
    <input type="text" name="genInput" id="genInput">

    <input type="submit" value="Generate!">
  </form>

  <div id="resDiv">
    <a href="#0" id="resSelect">Select Result</a>
    <div id="genResult">&nbps;</div>
  </div>



  <script src="js/min/jquery.min.js"></script>
  <script src="js/min/global.min.js"></script>
</body>
</html>