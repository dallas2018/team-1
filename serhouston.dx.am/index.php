<?php
include "base.php";
?>
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
            ?>
            <h2>Saving Information...</h2>
            <?php
            $firstname = mysqli_real_escape_string($dbcon, $_POST['inputFirstName']);
            $middlename = mysqli_real_escape_string($dbcon, $_POST['inputMiddleName']);
            $lastname = mysqli_real_escape_string($dbcon, $_POST['inputLastName']);
            $city = mysqli_real_escape_string($dbcon, $_POST['inputCity']);
            $state = mysqli_real_escape_string($dbcon, $_POST['inputState']);
            $zipcode = mysqli_real_escape_string($dbcon, $_POST['inputZipcode']);
            $phonenumber = mysqli_real_escape_string($dbcon, $_POST['inputPhoneNumber']);
            $county = mysqli_real_escape_string($dbcon, $_POST['inputCounty']);
            $birthday = mysqli_real_escape_string($dbcon, $_POST['inputBirthday']);

            $addmember = mysqli_query($dbcon, "INSERT INTO contactInfo (firstName, lastName, cellNumber, birthday, zip) 
                                                    VALUES('".$firstname."', '".$lastname."', '".$phonenumber."', '".$birthday."', '".$zipcode."')");

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
                    <input type="text" pattern="^(?=.{1,40}$)[a-zA-Z]+(?:[-'\s][a-zA-Z]+)*$" class="form-control" name="inputFirstName" id="inputFirstName" placeholder="First Name" required>
                    <div class="valid-tooltip">
                      Looks good!
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="inputMiddleName">Middle Name</label>
                    <input type="text" pattern="^(?=.{1,40}$)[a-zA-Z]+(?:[-'\s][a-zA-Z]+)*$" class="form-control" name="inputMiddleName" id="inputMiddleName" placeholder="Middle Name">
                    <div class="valid-tooltip">
                      Looks good!
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="inputLastName">Last Name</label><span class="error"> * </span>
                  <input type="text" pattern="^(?=.{1,40}$)[a-zA-Z]+(?:[-'\s][a-zA-Z]+)*$" class="form-control" name="inputLastName" id="inputLastName" placeholder="Last Name" required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="inputCity">City</label>
                    <input type="text" pattern="^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$" class="form-control" name="inputCity" id="inputCity" placeholder="City">
                    <div class="invalid-tooltip">
                      Please provide a valid city.
                    </div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="inputState">State</label>
                    <input type="text" pattern="^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$" class="form-control" name="inputState" id="inputState" placeholder="State">
                    <div class="invalid-tooltip">
                      Please provide a valid state.
                    </div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="inputZipcode">Zip</label></label><span class="error"> * </span>
                    <input type="text" pattern="^\d{5}(?:[-\s]\d{4})?$" class="form-control" name="inputZipcode" id="inputZipcode" placeholder="Zip" required>
                    <div class="invalid-tooltip">
                      Please provide a valid zip.
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="inputPhoneNumber">Phone Number</label><span class="error"> * </span>
                    <input type="tel" class="form-control" pattern="\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})" name="inputPhoneNumber" id="inputPhoneNumber" placeholder="111-1111-1111" required>
                    <div class="invalid-tooltip">
                      Please provide a valid cell phone number.
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="inputCounty">County</label>
                  <input type="text" pattern="^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$" class="form-control" name="inputCounty" id="inputCounty" placeholder="Brazoria">
                  <div class="invalid-tooltip">
                    Please provide a County.
                  </div>
                </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="inputBirthday">Date of Birth</label><span class="error"> * </span>
            <input type="date" class="form-control" name="inputBirthday" id="inputBirthday" placeholder="MM/DD/YYYY" max="1900-1-1" required>
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