<?php

//Define empty error message
$nameErr = $descriptionErr = $currentCategory = "";

//Define information of requirement
$questionStr = "1. All fields are required.";

//Create Category
if (isset($_POST['create_category'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];

    if (empty($name)) {
        $nameErr = "Required.";
    } elseif (!empty($name)) {
        if (strlen($name) < 5) {
            $nameErr = "Category name must be at least 5 letter.";
        } 
    }
        
    if (empty($description)) {
        $descriptionErr = "Required.";
    }

    if (empty($nameErr) && empty($descriptionErr)) {

        $sql1 = "INSERT INTO category (category_name, description) VALUES ('$name','$description')";

        $sql_run = mysqli_query($connect, $sql1);
        if ($sql_run) {
            $_SESSION['message'] = "Created successfully.";
            header("Location: http://localhost/Computer-Store-POS-System/administration/category.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Creating Failed.";
            header("Location: http://localhost/Computer-Store-POS-System/administration/category.php");
            exit(0);
        }
    }
}


//Update Category
if (isset($_POST['update_category'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $sql2 = "UPDATE category SET category_name='$name',description='$description' WHERE category_id='$id'";

    $sql_run = mysqli_query($connect, $sql2);
    if ($sql_run) {
        $_SESSION['message'] = "Updated successfully.";
        header("Location: http://localhost/Computer-Store-POS-System/administration/category.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Updating Failed.";
        header("Location: http://localhost/Computer-Store-POS-System/administration/category.php");
        exit(0);
    }
}

//Delete Category 
if (isset($_POST['delete_category'])) {

    $id = $_POST['delete_id'];
    
    $sql4 = "DELETE FROM category WHERE category_id='$id'";
    $sql_run = mysqli_query($connect, $sql4);
    if ($sql_run) {
        $_SESSION['message'] = "Deleted successfully.";
        header("Location: http://localhost/Computer-Store-POS-System/administration/category.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Delete Failed.";
        header("Location: http://localhost/Computer-Store-POS-System/administration/category.php");
        exit(0);
    }
}

    