<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

# This class keeps the options selected by the user and provides the default option values for the Lorem Ipsum generator
class LoremIpsumOptions {
	public $MinParagraphs = 10; 	// The Minimum number of parapgraphs to generate
	public $MaxParagraphs = 40; 	// The Maximum number of paragraphs to generate
	public $HeaderFrequency = 20; 	// The Percentage of paragraphs that should include a header
	public $ListFrequency = 15; 	// The percentage of paragraphs that should include a list
	public $MinListItems = 5; 		// This minimum number of items in a list
	public $MaxListItems = 20; 		// The maximum number of items in a list
}

# Controller for the Lorem Ipsum Component
class LoremController extends Controller {

	# This function handles the posting of the Lorem Ipsum generator form and returns the results via the lorem view.
    public function postLoremTextResults(Request $request) {


		# Instantiate the default options class
		# This class holds the default values for options included in the Lorem Ipsum Component
    	$options = new LoremIpsumOptions();


		# use the factory to create a Faker\Generator instance. This will provide the randomly generated text.
		$faker = \Faker\Factory::create();


		# This will hold the randomly generated text and is returned to the Lorem View.		
		$randomText="";


    	# Validate the Form

		# The slider values for the number of paragraphs to include is returned as an array of 2 integers from the form.
		# The number of paragraphs to include will be a random number between the two values selected by the user.

		if ($request->input('paragraph-range') !== null){
			$options->MinParagraphs = explode(",",$request->input('paragraph-range'))[0];
			$options->MaxParagraphs = explode(",",$request->input('paragraph-range'))[1];				
		}

		# The slider values for the number of list items to include is returned as an array of 2 integers from the form.
		# The number of items to include in a list will be a random number between the two values selected by the user.
		if ($request->input('listitem-range') !== null){
			$options->MinListItems = explode(",",$request->input('listitem-range'))[0];
			$options->MaxListItems = explode(",",$request->input('listitem-range'))[1];				
		}


		#Create custom validators in order to validate the slider array values
	     $input = array( 
	         'min_paragraph' => $options->MinParagraphs, 
	         'max_paragraph' => $options->MaxParagraphs, 
	         'header_frequency' => $request->input('header-frequency'), 
	         'list_frequency' => $request->input('list-frequency'), 
	         'min_listitems' => $options->MinListItems, 
	         'max_listitems' => $options->MaxListItems
	     );

	     $validator = Validator::make($input, [ 
	        'list_frequency' => 'required|integer|min:0|max:100',
	        'header_frequency' => 'required|integer|min:0|max:100',
   	        'min_paragraph' => 'required|integer|min:1|max:150',
   	        'max_paragraph' => 'required|integer|min:1|max:150',
   	        'min_listitems' => 'required|integer|min:2|max:50',
   	        'max_listitems' => 'required|integer|min:2|max:50'
	     ]);


 
	     if ($validator->fails()) { 
	         return redirect('LoremIpsum') 
	                     ->withErrors($validator) 
	                     ->withInput(); 
	     } 


		/*************************************************************************************************************

		Take values submitted from the user and store in the $options object.
		*************************************************************************************************************/


			# The IncludeHeaders value is the frequency percentage to include a header with a paragraph.
			$options->HeaderFrequency = $request->input('header-frequency') !== null ? $request->input('header-frequency') : $options->HeaderFrequency ; 

			# The ListFrequency value is the frequency percentage to include a bulleted list with a paragraph.
			$options->ListFrequency = $request->input('list-frequency') !== null ? $request->input('list-frequency') : $options->ListFrequency;


			# Randomly select the number of paragrphs to include. This will be a random number between the slider values selected by the user.
			$maxParagraphs = rand($options->MinParagraphs,$options->MaxParagraphs);


			#Genereate Random Text using the Faker package

			#Generate each paragraph and append lists and headers based on the Frequency Options
			for ($x = 1; $x <= $maxParagraphs; $x++) {

				$numberOfSentences = rand(5, 25);

				#Include Headers based on Header frequency probability selected by the user
				if ($options->HeaderFrequency >= rand(1,100))
				{
					$randomText = $randomText.'<h3>'.$faker->paragraph($nbSentences = 1, $variableNbSentences = true).'</h3>';
				}

				# Append the paragraph
				$randomText = $randomText.'<p>'.$faker->paragraph($nbSentences = $numberOfSentences, $variableNbSentences = true).'</p>';

				#Include Lists based on the List frequency probability selected by the user
				if ($options->ListFrequency >= rand(1,100))
				{
					$listSize = rand($options->MinListItems, $options->MaxListItems);
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

		# Return the results view for the component with the randomly generated text. The options object is also passed to the form to 
		# set the current values of each option on the form.
		return view('lorem', ['loremResults' => $randomText,'loremOptions' => $options]);

    
    }

    #Returns the default view for the Lorem Ipsum component
	public function getLoremTextResults() {

		# Load the default options for the form via the LoremIpsumOptions class
		$options = new LoremIpsumOptions();
		return view('lorem', ['loremResults' => '','loremOptions' => $options]);

	}

}