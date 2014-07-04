<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Your name:
    <input type="text" name="txtName" />
    <input type="submit" name="btnSendForm" value="Send" />
</form>


<?php
if(isset($_POST["txtName"]))
{
    echo "The form was submitted - your name is: " . $_POST["txtName"];
}
?>

<?php
if(isset($_GET["name"]))
{
    echo "Your name: " . $_GET["name"];
}
?>

<?php
if(isset($_POST["selRating"]))
{
    $number = $_POST["selRating"];
    echo "Selected rating: " . $number;
    // Write the rating to the database here
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Select a rating from 1 to 5:
    <select name="selRating">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <input type="submit" name="btnSendForm" value="Send" />
</form>


<form action="FormTrainingSecondFile.php" method="post">
    Fake rating: <input type="text" name="selRating" value="1000" />
    <input type="submit" name="btnSendForm" value="Send" />
</form>