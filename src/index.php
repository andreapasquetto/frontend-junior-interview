<?php
require "repository/User.php";
$user = User::load();

// Divide name in three parts: Title, First and Last
$nameParts = explode(" ", $user->getName());

// Load user image
$imgData = base64_encode(file_get_contents($user->getImage()->getLarge()));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Junior Front End Interview</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
  <link rel="stylesheet" href="css/app.css">
</head>
<body>
  <section class="section">
    <div class="container">
      <div class="card">
        <div class="card-content">
          <p class="title is-3 text-dark">Personal Details</p>
          <p class="text-light">Feel free to edit your basic information such as name, email, etc.</p>
          <br>
          <p class="subtitle is-5 text-light">Profile picture</p>

          <!-- Profile picture & Buttons -->
          <div class="box">
            <div class="tile is-ancestor">
              <div class="tile is-3 is-parent">
                <div class="tile is-child">
                  <figure class="image is-96x96">
                    <img id="userImage" alt="profile-picture" src="data:image/jpeg;base64,<?= $imgData ?>">
                  </figure>
                </div>
              </div>
              <div class="tile is-parent is-vertical">
                <div class="tile is-child">
                  <button class="button is-link" href="">Upload new photo</button>
                  <button class="button is-danger is-outlined" onclick="removeProfileThumbnail()">Remove</button>
                </div>
                <div class="tile is-child">
                  <p class="text-light">Image formats with max size of 3 MB</p>
                </div>
              </div>
            </div>
          </div>

          <!-- User information -->
          <div class="field">

            <!-- First name and Last name -->
            <div class="columns">
              <div class="column">
                <p class="control">
                  <label class="help has-text-weight-bold text-light">First Name</label>
                  <input class="input" type="text" name="firstName" value="<?= $nameParts[1] ?>">
                </p>
              </div>
              <div class="column">
                <p class="control">
                  <label class="help has-text-weight-bold text-light">Last Name</label>
                  <input class="input" type="text" name="lastName" value="<?= $nameParts[2] ?>">
                </p>
              </div>
            </div>

            <!-- Email address -->
            <div class="columns">
              <div class="column">
                <p class="control">
                  <label class="help has-text-weight-bold text-light">Email address</label>
                  <input class="input" type="email" value="<?= $user->getEmail() ?>">
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="js/index.js"></script>
</body>
</html>