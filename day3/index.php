<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        form {
            max-width: 400px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .required {
            color: red;
            margin-left: 5px;
        }
    </style>
</head>

<body>

    <?php
    // Initialize variables to store form data
    $name = $email = $group = $class_details = $gender = $courses = "";

    $errors = array();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Assign form data to variables
        $name = isset($_POST['name']) ? $_POST['name'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $group = isset($_POST['group']) ? $_POST['group'] : "";
        $class_details = isset($_POST['class_details']) ? $_POST['class_details'] : "";
        $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
        $courses = isset($_POST['courses']) ? $_POST['courses'] : "";
        $agree = isset($_POST['agree']) ? $_POST['agree'] : "";

        // Validation: Check if required fields are empty
        if (empty($name)) {
            $errors['name'] = true;
        }

        if (empty($email)) {
            $errors['email'] = true;
        }

        if (empty($group)) {
            $errors['group'] = true;
        }

        if (empty($class_details)) {
            $errors['class_details'] = true;
        }

        if (empty($gender)) {
            $errors['gender'] = true;
        }

        if (empty($courses)) {
            $errors['courses'] = true;
        }
        if (empty($agree )) {
          $errors['agree'] = true;
        }

        // Check if there are no errors and all required fields are non-empty
        if (empty($errors) && !empty($name) && !empty($email) && !empty($group) && !empty($class_details) && !empty($gender) && !empty($courses) && !empty($agree)) {
            
            echo "<h3>Your submitted information:</h3>";
            echo "Name: $name<br>";
            echo "Email: $email<br>";
            echo "Group: $group<br>";
            echo "Class Details: $class_details<br>";
            echo "Gender: " . ($gender == "male" ? "Male" : "Female") . "<br>";
            echo "Courses: $courses<br>";
        }else{
            echo "<h3 class=required>Please Fill all fields</h3> ";
        }
    }
    ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <label for="name">Name<span class="required"><?php echo (isset($errors['name']) && empty($name)) ? "* ( Name is required)" : ""; ?></span></label>
        <input type="text" id="name" name="name" value="<?php if(empty($nameErr)) { echo htmlspecialchars($name); } ?>">

        <label for="email">Email Address<span class="required"><?php echo (isset($errors['email']) && empty($email)) ? "* (Email is required)" : ""; ?></span>:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>">

        <label for="group">Group #<span class="required"><?php echo (isset($errors['group']) && empty($group)) ? "* (Group is required)" : ""; ?></span></label>
        <input type="text" id="group" name="group" value="<?php echo $group; ?>">

        <label for="class_details">Class details<span class="required"><?php echo (isset($errors['class_details']) && empty($class_details)) ? "* (class courses is required)" : ""; ?></span></label>
        <textarea name="class_details" id="class_details" cols="30" rows="10"><?php echo $class_details; ?></textarea>

        <label for="gender">Gender<span class="required"><?php echo (isset($errors['gender']) && empty($gender)) ? "* (gender is required)" : ""; ?></span></label>
        <input type="radio" name="gender" id="male" value="male" <?php echo ($gender == "male") ? "checked" : ""; ?>> Male
        <input type="radio" name="gender" id="female" value="female" <?php echo ($gender == "female") ? "checked" : ""; ?>> Female

        <label for="courses">Select courses<span class="required"><?php echo (isset($errors['courses']) && empty($courses)) ? "* (courses required)" : ""; ?></span></label>
        <select name="courses" id="courses">
            <option value=""></option>
            <option value="PHP" <?php echo ($courses == "PHP") ? "selected" : ""; ?>>PHP</option>
            <option value="JavaScript" <?php echo ($courses == "JavaScript") ? "selected" : ""; ?>>JavaScript</option>
            <option value="HTML" <?php echo ($courses == "HTML") ? "selected" : ""; ?>>HTML</option>
            <option value="MySQL" <?php echo ($courses == "MySQL") ? "selected" : ""; ?>>MySQL</option>
        </select> 
        <label for="agree">Agree<span class="required"><?php echo(isset($errors['agree']) && empty($agree))? "*(you must agree to terms)":"";?></span></label>
        <input type="checkbox" name="agree" id="agree" style="display:block">

        <input type="submit" value="Submit" > 
</form>

</body>

</html>
