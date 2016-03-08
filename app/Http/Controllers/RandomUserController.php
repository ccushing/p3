<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;




class RandomUserController extends Controller {


    public function postRandomUserResults() {

		$faker = \Faker\Factory::create();
		$generatedUsers = "";



		#Loop through the max number of users
		$usersToGenerate = $_POST["MaxUsers"]; 
		$percentFemale = $_POST["PercentFemale"]; 

		$userArray = array();



		for ($x = 1; $x <= $usersToGenerate; $x++) {

			$g = 'male';
			if ($percentFemale >= rand(1,100)){
				$g = 'female';
			}


			$user = $faker->name($gender = $g);
			$address = $faker->address;
			$telephone = $faker->phoneNumber;
			$email = $faker->email;
			$password = $faker->password;

			if ($g=='female'){
				$image = 'https://randomuser.me/api/portraits/med/women/'.rand(1,90).'.jpg';
			}
			else{
				$image = 'https://randomuser.me/api/portraits/med/men/'.rand(1,90).'.jpg';
			}

			#$currentUser = array();
			#array_push($currentUser, $user,$address,$telephone,$email,$password,$image)

			#array_push($userArray, $currentUser);


			echo 'Name : '.$user.'<br>';
			echo 'Gender : '.$g.'<br>';
			echo 'Address : '.$address.'<br>';
			echo 'Telephone : '.$telephone.'<br>';
			echo 'Email : '.$email.'<br>';
			echo 'Password : '.$password.'<br>';
			echo 'Image : '.$image.'<br><br>';
			
			#https://randomuser.me/api/portraits/med/women/93.jpg

		}


        return 'Return Output of Random User Generator';
    }

    public function postRandomUserResultsCSV() {
        return 'Return Output of Random User Generator as a CSV file';
    }

    public function postRandomUserResultsExcel() {
        return 'Return Output of Random User Generator as an Excel Document';
    }



}