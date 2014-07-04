<?php
if(isset($_POST["selRating"]))
{   
	if($_POST["selRating"] == "")
	{
		echo "Please fill in a number!!";
	} 
    $number = $_POST["selRating"];
    if((is_numeric($number)) && ($number > 0) && ($number < 6))
    {
        echo "Selected rating: " . $number;
        // Write the rating to the database here
    }
    else
        echo "The rating has to be a number between 1 and 5!";
}
?>