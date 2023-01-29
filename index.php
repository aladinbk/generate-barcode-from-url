<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .form-container {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 5px 5px 10px gray;
      margin-top: 20px;
    }
    
    input[type="text"] {
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: none;
      margin-bottom: 20px;
      width: 60%;
    }
    
    input[type="submit"] {
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      background-color: pink;
      border: none;
      cursor: pointer;
    }
    
    .error {
      color: red;
      font-size: 14px;
    }
  </style>
</head>
<body style="background-color: lightblue;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Générateur du code QR</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <?php
        if (isset($_POST['url'])) {
          $url = $_POST['url'];
          if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            echo '<p class="error"><b>Entrez une URL valide.</b></p>';
          } else {
            $encodedUrl = urlencode($url);
            echo '
            <div class="form-container">
              <h2>Voici le code QR :</h2><br />
              <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . $encodedUrl . '" />
            </div>
            ';
          }
        } else {
          echo '
          <div class="form-container">
            <form method="post">
              <input type="text" name="url" placeholder="Taper l\'URL à coder en QR" />
              <input type="submit" value="Générer le code QR" />
            </form>
          </div>
          ';
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>


