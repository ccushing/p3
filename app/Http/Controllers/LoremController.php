<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Faker\Provider\Lorem;



class LoremController extends Controller {


    public function postLoremTextResults() {

		$errorMessage='There was an error in your input. Please try again.';

    	// Validate the Form
    	if (true==false)
    	{
			return view('main', ['formIsValid' => false,'errorMessage' => $errorMessage,'loremResults' => '']);
    	}


		// use the factory to create a Faker\Generator instance
		$faker = \Faker\Factory::create();

    	#echo 'Return Output of Lorem Ipsum Generator<br>';
		#echo ' Post Variable Values <br>'.print_r($_POST);
		#echo '<br>';

		#Generate random number of sentences (between 4 and 12)
		
		$randomText="";


		$maxParagraphsArray = explode(",",$_POST["MaxParagraphs"]);
		$maxListItemsArray = explode(",",$_POST["MaxListItems"]);


		# 1=Never 2=Rarely 3=Sometimes 4=Often 5=Always
		# Probability Matrix : 1:0,2=.25:.2,3=.5,4=.75,5=1  (x-1)*.25
		$includeHeader = $_POST["IncludeHeaders"]; 
		$includeLists = $_POST["IncludeLists"];

		#echo 'includelists='.$includeLists.'<br>';
		#echo 'listitemsmin='.$maxListItemsArray[0].'<br>';
		#echo 'listitemsmax='.$maxListItemsArray[1].'<br>';


		$maxParagraphs = rand($maxParagraphsArray[0],$maxParagraphsArray[1]);


		#Get Random Text using the Faker package
		for ($x = 1; $x <= $maxParagraphs; $x++) {
				$numberOfSentences = rand(5, 25);

				#Include Headers if specified
				if ($includeHeader >= rand(1,100))
				{
					$randomText = $randomText.'<h3>'.$faker->paragraph($nbSentences = 1, $variableNbSentences = true).'</h3>';
				}

				$randomText = $randomText.'<p>'.$faker->paragraph($nbSentences = $numberOfSentences, $variableNbSentences = true).'</p>';

				#Include Lists if specified
				if ($includeLists >= rand(1,100))
				{
					$listSize = rand($maxListItemsArray[0], $maxListItemsArray[1]);
					$listArray = $faker->sentences($nb = $listSize, $asText = false) ;

					$randomText = $randomText.'<ul>';

					if(is_array($listArray))
					{
						foreach ($listArray as $v) {
						    $randomText = $randomText.'<li>'.$v.'</li>';
						}
					}

					$randomText = $randomText.'</ul>';
				}

			} 

		#$randomText = $randomText.dd($_POST);

		# Return the results view for the component with the randomly generated text
		#return view('main')->with('loremResults', $randomText);
		return view('main', ['formIsValid' => true,'errorMessage' => '','loremResults' => $randomText]);

    }


    public function formIsValid()
    {
    	return false;
    }

}