<?php 
    header("Content-type: application/json");
    if(isset($_POST['btn'])){
       $firstName = $_POST['firstName'];
       $lastName = $_POST['lastName'];
       $bYear = $_POST['bYear'];
       $address = $_POST['address'];
       $idCity = $_POST['idCity'];
       $gen = $_POST['gen'];

       $answer = "";
       $status = "";

       //regex

        $reName = '/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,15}$/';
        $reBYear = '/^(19|20)\d{2}$/';
        $reAddress = '/^([A-Z]|[1-9]{1,5})[A-Za-z\d\-\.\s]+$/';

        //db data
        $cityArray = [1,2];
        $genArray = ["M" , "Z"];


       $errors = 0;

       if(!preg_match($reName, $firstName)){
         $errors++;
       }
       if(!preg_match($reName, $lastName)){
        $errors++;
      }
      if(!preg_match($reBYear, $bYear)){
        $errors++;
      }
       if(!preg_match($reAddress, $address)){
         $errors++;
       }
      if(!in_array($idCity, $cityArray)){
        $errors++;
       }
       if(!in_array($gen, $genArray)){
        $errors++;
       }

       if($errors != 0){
        $answer = ["message" => "Greska prilikom obrade podataka!"];
        $status = 422;
       }
       else{
        $done = true;

        if($done){
            $answer = ["message" => "Podaci upisani"];
            $status = 201;
        }
        else{
            $answer = ["message" => "Doslo je do greske prilikom upisa podataka u bazu!"];
            $status = 500; 
        }
    } 

    echo json_encode($answer);
    http_response_code($status);
}
