<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Form</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="app1.css">
</head>
<body>
        <div class="container"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        
        <div class="container" class="contain1">
                
            <!--This is the top of the page/heading -->
                <div class="row">
                    <div>
                        <h3 class="bordering" class="topp"></h3>
                        <hr>
                        
                        <h2 class="bordering">Questionnare</h2>
                        <hr>
                        <p id="contacts">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                          40%
                        </div>
                    </div>

            <!--BUttons-->
            <?php
            $from='From: Mail Contact Form <team1@serhouston.dx.am>';
            $to='2148813311@mymetropcs.com';
            $subject='SER Houston Application';
            $body='Please do not forget to complete your application on http://serhouston.dx.am !';
            mail($to,$subject,$body,$from);
            ?>
            <form>
                    <div class="container" id="imgbuttons">
                            <div class="container" id="question">What best represents your living situation?</div>
                            <label class="col-md-3 col-sm-1">
                                    <input type="radio" name="living" value="house" />
                                    <img src="house.jpg" title="house">
                                    <h3>House</h3>
                            </label>
                            <label class="col-md-3 col-sm-1">
                                    <input type="radio" name="living" value="bench" />
                                    <img src="bench.jpg" title="bench">
                                    <h3>Bench</h3>
                            </label>
                            <label class="col-md-3 col-sm-1">
                                    <input type="radio" name="living" value="car" />
                                    <img src="car.jpg" title="car">
                                    <h3>Car</h3>
                            </label>
                            <label class="col-md-3 col-sm-1">
                                    <input type="radio" name="living" value="tent" />
                                    <img src="tent.jpg">
                                    <h3>Tent</h3>
                            </label>
                </div>

                
                <div class="container" id="imgbuttons">
                        <div class="container" id="question">What is your marital status?</div>
                        
                            <label class="col-md-3 col-sm-1">
                                    <input type="radio" name="marital" value="single" />
                                    <img src="single.jpg">
                                    <h3>Single</h3>
                            </label>
                            <label class="col-md-3 col-sm-1">
                                    <input type="radio" name="marital" value="married" />
                                    <img src="married.jpg">
                                    <h3>Married</h3>
                            </label>
                            <label class="col-md-3 col-sm-1">
                                    <input type="radio" name="marital" value="divorced" />
                                    <img src="divorced.jpg">
                                    <h3>Divorced</h3>
                            </label>
                            <label class="col-md-3 col-sm-1">
                                    <input type="radio" name="marital" value="widow" />
                                    <img src="widow.jpg">
                                    <h3>Widow</h3>
                            </label>
                </div>
                <div class="container" id="imgbuttons">
                        <div class="container" id="question">What is your highest level of education?</div>
                            <label class="col-md-3 col-sm-1">
                                    <input type="radio" name="education" value="none" />
                                    <img src="none.jpg">
                                    <h3>Little education</h3>
                            </label>
                            <label class="col-md-3 col-sm-1">
                                    <input type="radio" name="education" value="GED" />
                                    <img src="GED.jpg">
                                    <h3>GED</h3>
                            </label>
                            <label class="col-md-3 col-sm-1">
                                    <input type="radio" name="education" value="HS" />
                                    <img src="HS.jpg">
                                    <h3>HS diploma</h3>
                            </label>
                            <label class="col-md-3 col-sm-1">
                                    <input type="radio" name="education" value="college" />
                                    <img src="college.jpg">
                                    <h3>College</h3>
                            </label>
                </div>
                <button class="btn btn-primary" ><a href="goal.php">Back</a></button>
                <button class="btn btn-primary" type="submit"><a href="specificQuestions.php">Next</a></button>
            </form>
            <p class="image">
                    <img src="serlogo50.jpg" class="center">
                    </p>
                    <p class="ending">Privacy Notice:<br>
            We are the sole owners of the information collected on this site. We only have access to/collect information that you voluntarily give us via email or other direct contact from you. We will not sell or rent this information to anyone.
            We will use your information to respond to you, regarding the reason you contacted us. We will not share your information with any third party outside of our organization, other than as necessary to fulfill your request.
                    </p>

                        </p>
                </div>
                 </div>
                 </div>
                 </div>
        </body>
</html>

