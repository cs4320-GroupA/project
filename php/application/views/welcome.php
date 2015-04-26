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
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>css/bespoke.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <hr>
      <br>
      <center>
      <h1><b>Welcome to the Mizzou CS/IT TA & PLA Application Website</b></h1>
      <h3>Please log in or register</h3>
      <?php
        if($this->session->userdata('logged_in')) {
          if($this->session->userdata('logged_in') == TRUE) {
            redirect('home', 'refresh');
          }
        }
        if($this->session->userdata('failed_login')) {
          if($this->session->userdata('failed_login') == TRUE) {
            echo '<font color=red>Invalid username, access code, and/or password.</font><br />';
          }
        }
        if($this->session->userdata('account_exists')) {
          if($this->session->userdata('account_exists') == TRUE) {
            echo '<font color=red>Username already exists.</font><br />';
          }
        }
      ?>
      <br>
      <button class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#login">Log In</button>
      <button class="btn btn-danger btn-lg" href="#" data-toggle="modal" data-target="#register">Register</button>
      </center>
      <br>
      <hr>
    </div>
    <!-- Modal -->
    <div class="modal fade bs-modal-sm" id="login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Log In with an Existing Account</h3>
          </div>
          <div class="modal-body">
            <div class="tab-pane fade active in" id="signin">
              <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/login/validate" method="POST">
                <input type = "hidden" name = "action" value = "signin">
                <fieldset>
                  <div class="control-group">
                    <label class="control-label" for="pawprint">Pawprint:</label>
                    <div class="controls">
                      <input required="" id="pawprint" name="pawprint" type="text" class="form-control" placeholder="abc123" class="input-medium" required="">
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
                      <button id="signin" name="signin" class="btn btn-success">Log In</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade bs-modal-sm" id="register" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Register a New Account</h3>
          </div>
          <div class="modal-body">
            <div class="tab-pane fade active in" id="signin">
              <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/login/register" method="POST">
                <input type = "hidden" name = "action" value = "register">
                <fieldset>
                  <div class="control-group">
                    <label class="control-label" for="pawprint">Pawprint:</label>
                    <div class="controls">
                      <input id="pawprint" name="pawprint" type="text" placeholder="abc123" class="input-small" required>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="passwordinput">Password:</label>
                    <div class="controls">
                      <input required="" id="passwordinput" name="passwordinput" type="password" placeholder="****" class="input-small">
                    </div>
                  </div>
                  <div class="container">
                    <label class="control-label" for="accountRadio">Account Type:</label>
                    <div class="radio">
                      <label><input type="radio" id = "accountRadio" name = "accountRadio" value = "APPLICANT" required checked>Applicant</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" id = "accountRadio" name = "accountRadio" value = "INSTRUCTOR" required>Instructor</label>
                    </div>
                  </div>
                  <div class="controls">
                    <label class="control-label" for="accessCode">Access Code For Instructors Only:</label><br>
                    <input id="accessCode" name="accessCode" type="text" placeholder="f9hd34ks" class="input-small">
                  </div>
                  <!-- Button -->
                  <div class="control-group">
                    <label class="control-label" for="signin"></label>
                    <div class="controls">
                      <button id="signin" name="signin" class="btn btn-success">Register</button>
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
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  </body>
</html>