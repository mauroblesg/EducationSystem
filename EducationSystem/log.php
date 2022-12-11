<?php
    include './data/config.php';
    if($_SERVER['REQUEST_METHOD']=="POST"){

        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $role = $_POST['role'];

        $file = fopen('./data/students/students.json','r');
        $stArray = json_decode(fread($file,filesize('./data/students/students.json')),true);
        fclose($file);

        $fileTech = fopen('./data/teachers/teachers.json','r');
        $stArrayTech = json_decode(fread($fileTech,filesize('./data/teachers/teachers.json')),true);
        fclose($fileTech);



        switch ($role) {

            case 'st':
                foreach($stArray as $st){
                    if($st['email']==$email && $st['pass']==$pass){
                        $_SESSION['logUser'] = $st;
                        header("Location: ".$baseName.'profile.php');
                        exit();
                        break;
                    }

                    
                }
                // break;

            case 'tech':
                foreach($stArrayTech as $tech){
                    if($tech['email']==$email && $tech['pass']==$pass){
                        $_SESSION['logUser'] = $tech;
                        header("Location: ".$baseName.'profileTech.php');
                        exit();
                        break;                        
                    }

                    
                }
                    // break;

            case 'admin':
                    if($email=="mauroblesg@hotmail.com" && $pass=="mauricio"){
                        $_SESSION['logUser'] = $email && $pass;
                        header("Location: ".$baseName.'profileAdmin.php');                        
                        exit();
                        break;
                        }
                
                    // break;

            default:
                echo "Role not available";
                // break;
        }
       

        header("Location: ".$baseName.'index.php?msg=1');
        exit();
    }
?>

