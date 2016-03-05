<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;




class LoremController extends Controller {


    public function postLoremTextResults() {

    	echo 'Return Output of Lorem Ipsum Generator<br>';
		echo ' Post Variable Values '.print_r($_POST);

    }

}