<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Illuminate\Http\Request;


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
	public $ExportType = "HTML";
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



    public function postRandomUserResults(Request $request) {

		$faker = \Faker\Factory::create();

		$options = new RandomUserOptions();

    	// Validate the Form
		$this->validate($request, [
        'MaxUsers' => 'required|integer|min:1|max:100',
        'PercentFemale' => 'required|integer|min:0|max:100'
   		 ]);


		#Loop through the max number of users
		$options->MaxUsers = isset($_POST["MaxUsers"]) ?  $_POST["MaxUsers"] : $options->MaxUsers; 
		$options->PercentFemale = isset($_POST["PercentFemale"]) ? $_POST["PercentFemale"] : $options->PercentFemale ; 
		$options->ExportType = isset($_POST["optDisplay"]) ? $_POST["optDisplay"] : $options->ExportType ; 


		$options->IncludeFullName = isset($_POST["IncludeName"]);
		$options->IncludeGender = isset($_POST["IncludeGender"]);
		$options->IncludeAddress = isset($_POST["IncludeAddress"]);
		$options->IncludePhone = isset($_POST["IncludePhone"]);
		$options->IncludeEmail = isset($_POST["IncludeEmail"]);
		$options->IncludePassword = isset($_POST["IncludePassword"]);
		$options->IncludeImage = isset($_POST['IncludeImage']);


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

		if ($options->ExportType == 'HTML'){
			return view('random-user', ['randomUsers' => $userArray,'randomUserOptions' => $options]);
		}

		if ($options->ExportType == 'CSV'){
			return view('random-user-csv', ['randomUsers' => $userArray,'randomUserOptions' => $options]);
		}

		if ($options->ExportType == 'EXCEL'){
			return Excel::create('Filename', function($excel) {})->download('xlsx');
		}


        
    }

	public function getRandomUserResults() {

		$options = new RandomUserOptions();
		$userArray = array();
		return view('random-user', ['formIsValid' => true,'errorMessage' => '','randomUsers' => $userArray,'randomUserOptions' => $options]); 

	}


    public function getRandomUserResultsCSV() {
        return 'Return Output of Random User Generator as a CSV file';
    }

    public function postRandomUserResultsExcel() {
        return 'Return Output of Random User Generator as an Excel Document';
    }



}