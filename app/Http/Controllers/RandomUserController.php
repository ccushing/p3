<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;


class RandomUser { 
	public $name;
	public $gender;
	public $address;
	public $telephone;
	public $email;
	public $password;
	public $image;
} 

class RandomUserOptions{
	public $IncludeFullName = true;
	public $IncludeGender = true;
	public $IncludeAddress = true;
	public $IncludePhone = true;
	public $IncludeEmail = true;
	public $IncludePassword = true;
	public $IncludeImage = true;
	public $MaxUsers = 20;
	public $PercentFemale = 50;
}

class RandomUserController extends Controller {

    private function formIsValid()
    {
    	#TODO - Add Server Side Form Validation Here
    	return true;
    }

    public function GetUserOptions(){
    	return new RandomUserOptions();
    }



    public function postRandomUserResults() {

		$faker = \Faker\Factory::create();
		$generatedUsers = "";

		$options = new RandomUserOptions();

		if ($this->formIsValid() == false){
			#TODO Output Error Message here
			return 'BAD DATA!';
		}

		#Loop through the max number of users
		$options->MaxUsers = isset($_POST["MaxUsers"]) ?  $_POST["MaxUsers"] : $options->MaxUsers; 
		$options->PercentFemale = isset($_POST["PercentFemale"]) ? $_POST["PercentFemale"] : $options->PercentFemale ; 


		$options->IncludeFullName = isset($_POST["IncludeName"]);
		$options->IncludeGender = isset($_POST["IncludeGender"]);
		$options->IncludeAddress = isset($_POST["IncludeAddress"]);
		$options->IncludePhone = isset($_POST["IncludePhone"]);
		$options->IncludeEmail = isset($_POST["IncludeEmail"]);
		$options->IncludePassword = isset($_POST["IncludePassword"]);
		$options->IncludeImage = isset($_POST['IncludeImage']);



		#echo dd($_POST);



		$userArray = array();


		for ($x = 1; $x <= $options->MaxUsers; $x++) {

			$g = 'male';
			if ($options->PercentFemale >= rand(1,100)){
				$g = 'female';
			}


			$newUser = new RandomUser();


			$newUser->name = $faker->name($gender = $g);
			$newUser->gender = $g;
			$newUser->address = $faker->address;
			$newUser->telephone = $faker->phoneNumber;
			$newUser->email = $faker->email;
			$newUser->password = $faker->password;

			if ($g=='female'){
				$newUser->image = 'https://randomuser.me/api/portraits/med/women/'.rand(1,90).'.jpg';
			}
			else{
				$newUser->image = 'https://randomuser.me/api/portraits/med/men/'.rand(1,90).'.jpg';
			}

			array_push($userArray, $newUser);

		}

        return view('main', ['formIsValid' => true,'errorMessage' => '','loremResults' => '','randomUsers' => $userArray,'randomUserOptions' => $options]);
    }

    public function postRandomUserResultsCSV() {
        return 'Return Output of Random User Generator as a CSV file';
    }

    public function postRandomUserResultsExcel() {
        return 'Return Output of Random User Generator as an Excel Document';
    }



}