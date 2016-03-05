<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;




class RandomUserController extends Controller {


    public function postRandomUserResults() {
        return 'Return Output of Random User Generator';
    }

    public function postRandomUserResultsCSV() {
        return 'Return Output of Random User Generator as a CSV file';
    }

    public function postRandomUserResultsExcel() {
        return 'Return Output of Random User Generator as an Excel Document';
    }



}