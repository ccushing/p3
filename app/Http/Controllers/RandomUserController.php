<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Illuminate\Http\Request;

#Class for a randomly generated user
class RandomUser { 
	public $name;
	public $gender;
	public $address;
	public $telephone;
	public $email;
	public $password;
	public $image;
} 

#Class which holds the selected options in the Random User component
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



    public function postRandomUserResults(Request $request) {

		$faker = \Faker\Factory::create();

		$options = new RandomUserOptions();

    	// Validate the Form
		$this->validate($request, [
        'max-users' => 'required|integer|min:1|max:100',
        'percent-female' => 'required|integer|min:0|max:100',
        'opt-display' => 'required|in:HTML,CSV'
   		 ]);


		# Set option values for the Random User Generator - If the option is not included, use the default value in the $options object
		$options->MaxUsers = $request->input('max-users') !== null ?  $request->input('max-users') : $options->MaxUsers; 
		$options->PercentFemale = $request->input('percent-female') !== null ? $request->input('percent-female') : $options->PercentFemale ; 
		$options->ExportType = $request->input('opt-display') !== null ? $request->input('opt-display') : $options->ExportType ; 
		$options->IncludeFullName = $request->input('include-name') !== null ? $request->input('include-name') : $options->IncludeFullName ;
		$options->IncludeGender = $request->input('include-gender') !== null ? $request->input('include-gender') : $options->IncludeGender;
		$options->IncludeAddress = $request->input('include-address') !== null ? $request->input('include-address') : $options->IncludeAddress;
		$options->IncludePhone = $request->input('include-phone') !== null ? $request->input('include-phone') : $options->IncludePhone;
		$options->IncludeEmail = $request->input('include-email') !== null ? $request->input('include-email') : $options->IncludeEmail;
		$options->IncludePassword = $request->input('include-password') !== null ? $request->input('include-password') : $options->IncludePassword;
		$options->IncludeImage = $request->input('include-image') !== null ? $request->input('include-image') : $options->IncludeImage;

		# All randomly generated users are stored in an array of RandomUser objects
		$userArray = array();

		# Generate the Random Users
		for ($x = 1; $x <= $options->MaxUsers; $x++) {

			#Determine the gender based on the probability set in the PercentFemale option
			$g = 'male';
			if ($options->PercentFemale >= rand(1,100)){
				$g = 'female';
			}


			#Generate user attributes using the Faker Object
			$newUser = new RandomUser();

			$newUser->name = $faker->name($gender = $g);
			$newUser->gender = $g;
			$newUser->address = $faker->address;
			$newUser->telephone = $faker->phoneNumber;
			$newUser->email = $faker->email;
			$newUser->password = $faker->password;

			#Grab a random user pic from randomuser.me based on the user's gender
			if ($g=='female'){
				$newUser->image = 'https://randomuser.me/api/portraits/med/women/'.rand(1,90).'.jpg';
			}
			else{
				$newUser->image = 'https://randomuser.me/api/portraits/med/men/'.rand(1,90).'.jpg';
			}

			array_push($userArray, $newUser);

		}


		#Return the Results in the page via the random-user view
		if ($options->ExportType == 'HTML'){
			return view('random-user', ['randomUsers' => $userArray,'randomUserOptions' => $options]);
		}


		# Return the Array of Randomly Generated Users as a .csv file for download
		if ($options->ExportType == 'CSV'){

			#Create the header row of the .csv file
			$csvRow = $options->IncludeImage ? 'Image,' : '';
			$csvRow = $csvRow.($options->IncludeFullName ? 'Name,' : '');
			$csvRow = $csvRow.($options->IncludeGender ? 'Gender,' : '');
			$csvRow = $csvRow.($options->IncludeAddress ? 'Address,' : '');
			$csvRow = $csvRow.($options->IncludePhone ? 'Phone,' : '');
			$csvRow = $csvRow.($options->IncludeEmail ? 'Email,' : '');
			$csvRow = $csvRow.($options->IncludePassword ? 'Password' : '');

			#Remove the trailing comma
			$csvRow = rtrim($csvRow,",");

			$csvFile = $csvRow."\n";

			# Add a row to the .csv file for every user
			foreach($userArray as $user) {

				$csvRow="";

				if ($options->IncludeImage){
					$csvRow = $csvRow."\"".$user->image."\",";
				}

				if ($options->IncludeFullName){
					$csvRow = $csvRow."\"".$user->name."\",";
				}

				if ($options->IncludeGender){
					$csvRow = $csvRow."\"".$user->gender."\",";
				}

				if ($options->IncludeAddress){
					$csvRow = $csvRow."\"".preg_replace( "/\r|\n/", " ", $user->address)."\",";
				}

				if ($options->IncludePhone){
					$csvRow = $csvRow."\"".$user->telephone."\",";
				}

				if ($options->IncludeEmail){
					$csvRow = $csvRow."\"".$user->email."\",";
				}

				if ($options->IncludePassword){
					$csvRow = $csvRow."\"".$user->password."\",";
				}				

				$csvRow = rtrim($csvRow,",");
    			
    			$csvFile = $csvFile.$csvRow."\n";

			}

			#Set the response headers so the browser will prompt the user to download the file as a .csv
			header('Content-Type: text/csv');
			header('Content-Length: '.strlen($csvFile));
			header('Content-Disposition: attachment; filename="random_users.csv"');

			exit($csvFile);
		}




        
    }

    #Default View for the Random User Component
	public function getRandomUserResults() {

		# Load the default options for the form via the RandomUserOptions class
		$options = new RandomUserOptions();
		$userArray = array();
		return view('random-user', ['randomUsers' => $userArray,'randomUserOptions' => $options]);

	}



}