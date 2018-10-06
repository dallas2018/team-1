<?php
include "base.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Form</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="app.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
  <style>
    .error {color: #FF0000;}
  </style>
  <script type="text/javascript">
        var idleTime = 0;
        $(document).ready(function () {
            //Increment the idle time counter every minute.
            var idleInterval = setInterval(timerIncrement, 1000); // 1 minute
            //Zero the idle timer on mouse movement.
            $(this).mousemove(function (e) {
                idleTime = 0;
            });
            $(this).keypress(function (e) {
                idleTime = 0;
            });
        });
        function timerIncrement() {
            idleTime = idleTime + 1;
            if (idleTime > 4) { // 20 minutes
                $("#myModal").modal('show');
            }
        }
        function refreshPage(){
            window.location.reload();
        } 
  </script>
</head>

<body>
  <!--  -->
  <?php
  launch_modal()
  ?>
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
            <h2>Saving Information<br>
                Redirecting...
            </h2>
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
            ?>
            <meta http-equiv="refresh" content"2;quiz.php"> 
            <?php
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
                    Please provide a county.
                  </div>
                </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="inputBirthday">Date of Birth</label><span class="error"> * </span>
            <input type="date" class="form-control" name="inputBirthday" id="inputBirthday" placeholder="MM/DD/YYYY" max="1900-1-1" required>
            <div class="invalid-tooltip">
              Please provide a birthday.
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

<?php
function launch_modal()
{?>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" id="header">
          You're Almost There!
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="d-inline-flex">
          <div class="d-flex justify-content-between">
                  <div class="container"> 
                          <img src="images/ciara.jpg" alt="ser ciara">
                  </div> 
                  <div class="popup">Hello, I'm Ciara and I'm here to help. <br/>
                  It looks like you've been inactive for the past 10 minutes, so don't forget to finish! <br/>
                  If you need help filling out the application, feel free to call me at 713.773.6000 x 140, or email me at Ciara.Major@serhouston.org</div>       
            </div> 
          </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onClick="refreshPage()">Resume Application</button>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>
?>
</html>