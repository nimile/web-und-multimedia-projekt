<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <?php include "../scripts/styles.php"; ?>
    </head>
    <body>
        <div class="root_div root_div_color">
            <div class="sub_div">
                <div class="horizontal_centered">
                    <form method="POST" action="./nextsptes.php">
                        <h1 class="heading_color">Support</h1>
                        <p>Magic Wiz has forsee a mighty gamemaster from the tetris land.</p>
                        <p>In almost every case our magic support team can help you</p>
                        <p>But be aware you must exchange information below as a summon ritual</p>
                        <label>
                            <input aria-label="Enter your email address" class="custom_text_input_color custom_text_input_colo" type="email" name="mail"
                                   required="required" placeholder="email" style="width: 90%;">
                        </label>
                        <br><br>
                        <label>
                            <textarea aria-label="Describe your problem as precise as possible" class="textarea_no_resizable textarea_no_resizable_color" name="problem"
                                      required="required" placeholder="Describe your problem as precise as possible"></textarea>
                        </label>
                        <br><br><br>
                        <input aria-label="Close" class="custom_button custom_button_color" type="button" onclick="history.back()" value="Close"/>
                        <input aria-label="Start the ritual" type="submit" class="custom_button custom_button_color" value="Start the ritual">
                    </form>
                </div>
            </div>
        </div>
    </body>
    <footer>
    </footer>
</html>