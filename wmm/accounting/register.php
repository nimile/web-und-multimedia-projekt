<?php
    session_start();
    if (isset($_SESSION["user_id"])) {
        header("Location: /");
        die;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <?php include "../scripts/styles.php"; ?>
        <script>
            /**
             * @brief This method is invoked when the page is loaded
             * @details The method sets a random gametag into the gametag field
             */
            function pageLoaded() {
                let names = ["KoalaLean", "MarePlay", "PigStep", "PumaCook", "MuleNotice", "DeerCross", "ToadCommit", "GoatBoost", "ImpalaTry", "DogAssume", "CougarPark", "BurroReveal", "IguanaCopy", "OcelotPoop", "EweMarry", "IbexUse", "BearObey", "NewtTarget", "RamLimit", "LightBrew"];
                let index = Math.floor(Math.random() * names.length);
                document.getElementById('gametag').value = names[index];
            }
        </script>
    </head>
    <body onload="pageLoaded()">
        <div class="root_div root_div_color" style="width: 30%;">
            <div class="sub_div sub_div_color">
                <h2 class="heading_color">Register</h2>
                <form action="/scripts/user_creation.php" method="POST">
                    <div class="container">
                        <label aria-hidden="true" class="custom_input_heading custom_input_heading_color">Name *</label><br>
                        <label>
                            <input aria-label="Type your first name" class="custom_input custom_input_color" name="first_name" placeholder="First name" required="required" type="text">
                        </label>
                    </div>
                    <br>
                    <div class="container">
                        <label aria-hidden="true" class="custom_input_heading custom_input_heading_color">Family name *</label><br>
                        <label>
                            <input aria-label="Type your family name" class="custom_input custom_input_color" name="sur_name" placeholder="Surname" required="required" type="text">
                        </label>
                    </div>
                    <br>
                    <div class="container">
                        <label aria-hidden="true" class="custom_input_heading custom_input_heading_color">E-Mail *</label><br>
                        <label>
                            <input aria-label="Type your email" class="custom_input custom_input_color" name="email" placeholder="EMail" type="email">
                        </label>
                    </div>
                    <br>
                    <div class="container">
                        <label aria-hidden="true" class="custom_input_heading custom_input_heading_color">Telephone</label><br>
                        <label>
                            <input aria-label="Optional. Telephonenumber"  class="custom_input custom_input_color" name="phone" type="tel"  pattern="[0-9]{0,20}">
                        </label>
                    </div>
                    <br>
                    <div class="container">
                        <label aria-hidden="true" class="custom_input_heading custom_input_heading_color">Gametag *</label><br>
                        <label>
                            <input aria-label="Choose a game tag" class="custom_input custom_input_color" id="gametag" name="gametag" placeholder="WildCow" type="text">
                        </label>
                    </div>
                    <br>
                    <div class="container">
                        <label aria-hidden="true" class="custom_input_heading custom_input_heading_color">Password *</label><br>
                        <label>
                            <input aria-label="Type a password" class="custom_input custom_input_color" name="password" placeholder="" required="required" type="password">
                        </label>
                    </div>
                    <br>
                    <div class="container">
                        <label aria-hidden="true" class="custom_input_heading custom_input_heading_color">Reenter password *</label><br>
                        <label>
                            <input aria-label="Retype your password" class="custom_input custom_input_color" name="password_verify" placeholder="" required="required" type="password">
                        </label>
                    </div>
                    <div class="container">
                        <label aria-hidden="true" class="custom_input_heading custom_input_heading_color">Scan this code with and authenticator app</label><br>
                        <?php include "../scripts/secure_auth_create_code.php";
                        if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
                        if(isset($_SESSION["secret2faCode"])){
                            show_secret($_SESSION["secret2faCode"]);
                        }else {
                            $_SESSION["secret2faCode"] = create_code();
                        }
                        ?>
                        <label aria-hidden="true" class="custom_input_heading custom_input_heading_color">Enter code *</label><br>
                        <label>
                            <input aria-label="Enter ..." class="custom_input custom_input_color" name="code" required="required" type="text">
                        </label>
                    </div>
                    <br>
                    <div class="container">
                        <input aria-label="Register" class="custom_button custom_button_color" name="button_name" type="submit" value="Register">
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </body>
    <footer class="footer">
        <?php include "../common/floating_menu.php"; ?>
    </footer>
</html>
