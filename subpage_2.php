<!DOCTYPE html>
<html>

    <head>

        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/general.css">
        <link rel="stylesheet" href="styles/subpage_2.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

        <meta charset="UTF-8" />
        <title>Beispielformular</title>

    </head>

    <body>

        <div class="header">
            <div class="left-section">
              <p>logo</p>
            </div>
            <div class="middle-section">
                <a href="index.html" class="link-subpage">Home</a>
                <a href="subpage_1.html" class="link-subpage">subpage 1</a>
                <a href="subpage_2.php" class="link-subpage">subpage 2</a>
                <a href="subpage_3.html" class="link-subpage">subpage 3</a>
            </div>
            <div class="right-section">
              <p>right</p>
            </div>
        </div>

        <div class="main">
          <form action="inpayment_processing.php" method="post" enctype="multipart/form-data">
            <div class="donation-form">
              <div class="form-title">enter info to donate</div>
              <div class="form-inputs">
                <div class="names-inputs">
                  <p>First name:</p>
                  <p>Last name:</p>
                  <input class="input-field" type="text" name="prename" size="20" maxlength="30" required/>
                  <input class="input-field" type="text" name="surname" size="20" maxlength="30" required/>
                </div>
                <div class="email-input">
                  <p>Email:</p>
                  <input class="input-field" type="email" name="email" size="15" maxlength="30" required/>
                </div>
                <div class="amount-input">
                  <p>Amount:</p>
                  <input class="input-field" type="number" name="amount" placeholder="CHF" size="15" maxlength="30" required/>
                </div>
                <div class="image-form">
                  <div class="image-input">
                    <p>Image (Max. 1Mb):</p>
                    <input class="input-field search-image" type="file" id="image" name="image" accept="image/*" />
                    <label for="image">
                      <div class="select-image-button" id="select-image-button">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                        Choose a photo
                      </div>
                    </label>
                  </div>
                  <figure class="image-preview-container">
                    <img class="chosen-image" id="chosen-image">
                  </figure>
                </div>
              </div>
              <input class="input-field submit-button" type="submit" value="Submit" />
            </div>
          </form>

          <div class="donations-container">
            <?php include 'donations_query.php'; ?>
          </div>
          
        </div>


        <script src="script/subpage_2.js"></script>
    </body>

</html>
