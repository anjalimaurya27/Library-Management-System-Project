<?php
include 'connection.php';

if(isset($_POST['first']) && isset($_POST['last']) && isset($_POST['email']) && isset($_POST['topic']) && isset($_POST['message']))
{
    $first_name = $_POST['first'];
    $last_name = $_POST['last'];
    $email = $_POST['email'];
    $topic = $_POST['topic'];
    $message = $_POST['message']; 

    if (empty($first_name) || empty($last_name) || empty($email) || empty($topic) || empty($message)) 
    {
 
      echo "<script> alert (' Please insert data in all feild!!')</script>";

    }
     else 
     {
       
        $sql = "INSERT INTO contact_messages (first_name, last_name, email, topic, message) 
        VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssss', $first_name, $last_name, $email, $topic, $message);

          if ($stmt->execute()) {
            echo "<script>alert('✅ Your message has been sent successfully!'); window.location ='contact_us.html';</script>";
            
            exit;
          }
          else{
            echo "<script>alert('Error inserting data');</script>";
          }

          $stmt->close();
          // $conn->close();
     }
}

?>