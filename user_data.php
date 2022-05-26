<?php
if(isset($_POST['submit'])):

    $userInput = [
        'name' => sanitize($_POST['name']),
        'email' => sanitize($_POST['email']),
        'date_of_birth' => sanitize($_POST['date_of_birth']),
        'gender' => sanitize($_POST['gender']),
        'country' => sanitize($_POST['country'])
    ];

    $outputFile = 'userdata.csv';
    $fp = fopen($outputFile, 'w+');
    fputcsv($fp, $userInput);
    fclose($fp);

    // output it for the user to see
    echo '<h1>Output</h1>';
    echo '<p>Your submission has been saved to "userdata.csv"';
    echo '<p>You submitted the following values:</p>';
    print_r($userInput);
endif;

echo '<p><a href="index.html">Click here to submit again</a></p>';

// helps to sanitize any user input
function sanitize($dirtyData){
    $cleanData = htmlentities(trim($dirtyData));
    return $cleanData;
}