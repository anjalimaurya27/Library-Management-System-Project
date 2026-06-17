<?php
include 'db.php';

if(isset($_GET['id']))
{
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM books WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Book | Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
 * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  background-color: #f5a957;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px 0;
  min-height: 100vh;
}

.card-container {
  background-color: #fff;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 550px;
}

h2 {
  text-align: center;
  color: #333;
  margin-bottom: 25px;
}

form {
  display: flex;
  flex-direction: column;
}

.form-group {
  margin-bottom: 20px;
}

input[type="text"],
input[type="file"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 16px;
}

.add-button {
  width: 100%;
  padding: 12px;
  background-color: #ff4500;
  color: white;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s;
}

.add-button:hover {
  background-color: #ee561f;
}

.current-img {
  width: 120px;
  height: auto;
  margin-top: 10px;
  border-radius: 8px;
  border: 1px solid #ccc;
}


  </style>
</head>
<body>

   <form action="update.php" method="POST" enctype="multipart/form-data">
      <div class="card-container">
        <h2>Edit Book</h2>
        
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="form-group">
          <label>Book Title:</label>
          <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
        </div>

        <div class="form-group">
          <label>Author Name:</label>
          <input type="text" name="author_name" value="<?php echo $row['author_name']; ?>" required>
        </div>

        <div class="form-group">
          <label>Book Link (URL):</label>
          <input type="text" name="book_link" value="<?php echo $row['book_link']; ?>">
        </div>

        

        <button class="add-button" name="update">Update Book</button>
      </div>
   </form>

</body>
</html>
<?php
$conn->close();
?>
