<?php
include 'db.php';

// Fetch all books
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List | Admin Dashboard</title>

    <!-- FontAwesome Icon CDN -->
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
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
            padding: 20px;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: #3c1518;
            color: white;
            padding: 20px;
            border-radius: 15px;
            margin-right: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 10px;
            font-size: 22px;
            color: #f73e10;
            border-bottom: 2px solid #f73e10;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: white;
            display: flex;
            align-items: center;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background: #f73e10;
            font-weight: bold;
            transform: translateX(5px);
        }

        .sidebar ul li a i {
            margin-right: 10px;
        }

        /* Main Section */
        .main-content {
            flex: 1;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        .card {
            width: 100%;
            max-width: 1000px;
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0px 6px 18px rgba(20, 20, 30, 0.1);
            text-align: center;
        }

        .table-wrap {
            margin-top: 15px;
            border-radius: 8px;
            overflow-x: auto;
            border: 1px solid #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            background: #3c1518;
            color: #fff;
            padding: 12px;
            font-size: 14px;
        }

        tbody td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
            text-align: center;
        }

        tbody img {
            width: 55px;
            height: 70px;
            border-radius: 5px;
            object-fit: cover;
        }

        /* Buttons */
        .btn {
            padding: 6px 12px;
            margin: 3px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
        }

        .btn-edit {
            background: linear-gradient(#3d8b3d, #2f7a2f);
            color: white;
        }

        .btn-delete {
            background: linear-gradient(#e0554d, #c83b36);
            color: white;
        }

        .btn:hover {
            opacity: 0.85;
        }
    </style>
</head>

<body>

    <div class="dashboard">

        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="../index.html"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
                <li><a href="../add_book.php"><i class="fa-solid fa-book"></i> Add Book</a></li>
                <li><a class="active"><i class="fa-solid fa-book-open"></i> Book List</a></li>
                <li><a href="../admin_logout/index.html"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="card">
                <h1>Book List</h1>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <!-- <th>Book Image</th> -->
                                <th>Title</th>
                                <th>Author</th>
                                <th>Book Link</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {

                                    // $photo = (!empty($row["photo"]))
                                    //     ? "../uploads/" . $row["photo"]
                                    //     : "https://via.placeholder.com/55x70";

                                    echo "
                                    <tr>
                                        <td>{$row['id']}</td>

                                        <td>{$row['title']}</td>
                                        <td>{$row['author_name']}</td>
                                        <td><a href='{$row['book_link']}' target='_blank'>Link</a></td>
                                        <td>
                                            <a href='edit.php?id={$row['id']}' class='btn btn-edit'>Edit</a>
                                            <a href='delete.php?id={$row['id']}' class='btn btn-delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No Books Found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

</body>

</html>
