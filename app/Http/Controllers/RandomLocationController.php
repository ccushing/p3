<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;




class RandomLocationController extends Controller {


    public function postRandomLocationResults() {
        return 'Return Output of Random Location Generator';
    }

    public function postRandomLocationResultsCSV() {
        return 'Return Output of Random Location Generator as a CSV file';
    }

    public function postRandomLocationResultsExcel() {
        return 'Return Output of Random Location Generator as an Excel Document';
    }
}