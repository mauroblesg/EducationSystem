<?php
    include './data/config.php';
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $course = $_POST ['course'];
        $student = $_POST ['student'];

        $fileSt = fopen("./data/students/students.json",'r');
        $dataSt = fread($fileSt,filesize("./data/students/students.json"));
        $dataSt = json_decode($dataSt,true);

        foreach($dataSt as $st){

            if($st['stID']==$student){
                $newData = ['id'=>$st['id'],'mark'=>$st['mark']];
                break;
            }

            if (file_exists("./data/course/course.json")){
                $dataFile = fopen("./data/course/course.json",'r');
                $stringData = fread($dataFile,filesize("./data/course/course.json")); 
                fclose($dataFile);
                $mainArray = json_decode($stringData,true);
            }else {
                $mainArray = [];
            }
            array_push($mainArray,$newData);
            $dataFile = fopen("./data/course/course.json",'w');
            fwrite($dataFile,json_encode($mainArray));
            fclose($dataFile);
        }

        header ("Location: ".$baseName. 'add.php?msg=Student added');
        exit();

        
    }
?>