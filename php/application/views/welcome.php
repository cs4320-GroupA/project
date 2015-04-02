<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Welcome</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jumbotron.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  </head>

  <body>

  <div class="container"> 
      <hr>
      <br>
      <center>
      <h1><b>Welcome to the Mizzou CS/IT TA & PLA Application Website</b></h1>
      <h3>Please sign in or register</h3>
      <br>
    <button class="btn btn-primary btn-lg" href="#signup" data-toggle="modal" data-target=".bs-modal-sm">Log In</button>
    </center>
    <br>
      <hr>
   </div>
    
  <!-- Modal -->
    <div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Log In</h3>
          </div>
          <div class="modal-body">
            <div class="tab-pane fade active in" id="signin">
                <form class="form-horizontal" action="#" method="POST">
        <input type = "hidden" name = "action" value = "do_login">
                <fieldset>
                <div class="control-group">
                  <label class="control-label" for="userinput">Username:</label>
                  <div class="controls">
                    <input required="" id="userinput" name="userinput" type="text" class="form-control" placeholder="username" class="input-medium" required="">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="passwordinput">Password:</label>
                  <div class="controls">
                    <input required="" id="passwordinput" name="passwordinput" class="form-control" type="password" placeholder="****" class="input-medium">
                  </div>
                </div>
                <!-- Button -->
                <div class="control-group">
                  <label class="control-label" for="signin"></label>
                  <div class="controls">
                    <button id="signin" name="signin" class="btn btn-success">Sign In</button>
                  </div>
                </div>
                </fieldset>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="/tabsub/js/bootstrap.min.js"></script>
  </body>
</html>