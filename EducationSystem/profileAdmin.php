<?php 
    include './pages/header.php';
    
    if(!isset($_SESSION['logUser'])) {
        header("Location: ".$baseName.'index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Assignation</title>
</head>
<style>
    div{
        display:flex;
    }
</style>
<body>
    <form action="student_add.php" method="post">
                       
            <label for="course">Course:</label>
            <select id="course" name="course">
                <option selected value="">Select one</option>
                <option value="HTML">HTML</option>
                <option value="CSS">CSS</option>
                <option value="JavaScript">Java Script</option>
                <option value="JavaScriptAdvance">Java Script Advance</option>
                <option value="PHP">PHP</option>
                <option value="CMS">CMS</option>
            </select>
        
            <label for="student">Student:</label>
            <select id="student" name="student">
            <option selected value="student">Select one</option>            
            <?php

                include './data/config.php';                    
            
                $stID = $_POST['stID'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
        
                $file = fopen('./data/students/students.json','r');
                $file_r = fread($file,filesize('./data/students/students.json'));
                $stArray = json_decode($file_r,true);                    
                fclose($file);

                foreach ($stArray as $student){
                    echo "<option> ".$student ['stID']." ".$student ['fname']." ".$student ['lname']. "</option>";
                
                }
                                   
                ?>            
            </select>      
            <input type="submit" value="submit">
    </form>
</body>
</html>