<?php

  $user = $_POST['user'];
  $pass = $_POST['pass'];



  $conn = new mysqli("localhost", "root", "", "Prime");

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT * FROM usuarios WHERE nombre='$user' AND password='$pass'";
                            $result = $conn->query($sql);
                            $res = null;
                            if ($result->num_rows > 0) {
                              header('Location: adminInbox.php');
                              exit;
                            } else {
                              echo "<div class='container'> <h4>Usuario o contraseña incorrectos</h4></div>";
                              echo $user.",".$pass;
                            }
                            $conn->close();


?>
