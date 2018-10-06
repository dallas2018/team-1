<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Form</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
    crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="app.css">
  <style>
    .error {color: #FF0000;}
  </style>
</head>

<body>
  <!--  -->
  <div class="container" class="contain1">
    <div class="row">
      <div class="col-lg-4, col-med-3">
        <div>
          <h3 class="bordering" class="topp"></h3>
          <hr>

          <h2 class="bordering">Contact Form</h2>
          <hr>
          <?php
          if(!empty($_POST['inputFirstName']) && !empty($_POST['inputLastName']) && 
              !empty($_POST['inputPhoneNumber']) && !empty($_POST['inputZipcode'])) {
                echo "NICE"
          }
          else {
          ?>
            <p id="contacts">
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 10%;" aria-valuenow="25" aria-valuemin="0"
                  aria-valuemax="100">10%</div>
              </div>
              <form method="post" action="index.php" name="form" id="form">
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="inputFirstName">First Name</label><span class="error"> * </span>
                    <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" required>
                    <div class="valid-tooltip">
                      Looks good!
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="inputMiddleName">Middle Name</label>
                    <input type="text" class="form-control" id="inputMiddleName" placeholder="Middle Name">
                    <div class="valid-tooltip">
                      Looks good!
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="inputLastName">Last Name</label><span class="error"> * </span>
                  <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationTooltip03">City</label>
                    <input type="text" class="form-control" id="validationTooltip03" placeholder="City">
                    <div class="invalid-tooltip">
                      Please provide a valid city.
                    </div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="validationTooltip04">State</label>
                    <input type="text" class="form-control" id="validationTooltip04" placeholder="State">
                    <div class="invalid-tooltip">
                      Please provide a valid state.
                    </div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="inputZipcode">Zip</label></label><span class="error"> * </span>
                    <input type="text" class="form-control" id="inputZipcode" placeholder="Zip" required>
                    <div class="invalid-tooltip">
                      Please provide a valid zip.
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="inputPhoneNumber">Phone number</label><span class="error"> * </span>
                    <input type="tel" class="form-control" id="inputPhoneNumber" placeholder="111-1111-1111" required>
                    <div class="invalid-tooltip">
                      Please provide a valid cell phone number.
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationTooltip02">County</label>
                  <input type="text" class="form-control" id="validationTooltip05" placeholder="Brazoria">
                  <div class="invalid-tooltip">
                    Please provide a County.
                  </div>
                </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationTooltip02">Date of Birth</label>
            <input type="date" class="form-control" id="validationTooltip05" placeholder="MM/DD/YYYY" required>
            <div class="invalid-tooltip">
              Please provide a County.
            </div>
          </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
        </p>
        <?php
      }
      ?>
    </div>
  </div>
  </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
</body>

</html>