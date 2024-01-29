<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submissions</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .button {
            margin-top: 30px;
            margin-left:10px;
            padding:10px 15px;
            background-color:lime;
            color:#fff;
            border:none;
            cursor: pointer;
            border-radius:15px;
            transition:.4s;
        }
        .button:hover{
            transform: scale(1.1,1.1);
            background-color:transparent;
            color:black;
            border:1px solid lime;
           ;


        }
    </style>
</head>

<body>

    <?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'day4';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM form";
    $result = mysqli_query($conn, $sql);
    ?>

    <h3>All submitted information:</h3>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Group</th><th>Class Details</th><th>Gender</th><th>Courses</th><th>Agree</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Group'] . "</td>";
            echo "<td>" . $row['Class_details'] . "</td>";
            echo "<td>" . $row['Gender'] . "</td>";
            echo "<td>" . $row['courses'] . "</td>";
            echo "<td>" . $row['checked'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>please enter data</p>";
    }
    mysqli_close($conn);
    ?>

    <button class="button" onclick="location.href='index.php'">Add New User</button>

</body>

</html>
