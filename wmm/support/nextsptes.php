<?php
    function create_ticket($mail, $problem){
        // Validate if passwords are same
      


        $database_server_name = "localhost";
        $database_user_name = "register";
        $database_user_password = "1234";
        $database_table_name = "game";
        // Create a database connection
        $connection = new mysqli($database_server_name, $database_user_name, $database_user_password, $database_table_name);   
        if ($connection->connect_error) {
            return "Database connection failed. " . $conn->connect_error;
        } 

        // All fields are entered, valid and the user does not exists so create a new user
        $sql = "INSERT INTO support_tickets (reporter, problem) VALUES ('$mail', '$problem')";
        if(!($connection->query($sql) === TRUE)){
            return "Cannot create a ticket, try again in a few minutes " . $connection->error;
        }

        $connection->close();
        return "
        <p>You are summoning a mighty gamemaster from the Support area</p>
        <p>This ritual takes a couple hours or days, your personal gamemaster will contact you via mail</p>
        <p>Good luck on your journey!</p>";
    }

    $email = $_POST['mail'];
    $problem = $_POST['problem'];

    $result = create_ticket($email, $problem);


    echo "
    <!DOCTYPE html>
    <html lang=\"en\">
      <head>
        <meta charset=\"UTF-8\">        
        <title>Login</title>
        <link rel=\"stylesheet\" href=\"http://localhost/styles/darkmode/centered.css\">
        <link rel=\"stylesheet\" href=\"http://localhost/styles/basic_style.css\">
      </head>
        <body>
          <div class=\"root_div root_div_color\" style=\"width: 30%\">
            <div class=\"sub_div sub_div_color horizontal_centered\">
            <h2 class=\"heading_color\">Next steps</h2>
            <br>
            $result
            <br><br>
            <input class=\"custom_button custom_button_color\" type=\"button\" onclick=\"location.href='http://localhost';\" value=\"Home\" />
            <br><br>
          </div>
          </div>
        </body>
    </html>"  
?>