<?php
// init variables
$NameError = "";
$EmailError = "";
$GenderError = "";
$WebsiteError = "";

// on submit the below executes
if (isset($_POST['Submit'])) {

    // name
    if (empty($_POST["Name"])) {
        $NameError = "Name is Required";
    }

    // email
    if (empty($_POST["Email"])) {
        $EmailError = "Email is Required";
    }

    // gender
    if (empty($_POST["Gender"])) {
        $GenderError = "Gender is Required";
    }

    // website
    if (empty($_POST["Website"])) {
        $WebsiteError = "Website is Required";
    }
}

function Test_User_Input($Data)
{
    return $Data;
}

?>

<!DOCTYPE>
<html>

<head>
    <title>Form Validation</title>
</head>
<style type="text/css">
    input[type="text"],
    input[type="email"],
    textarea {
        border: 1px solid dashed;
        background-color: rgb(221, 216, 212);
        width: 600px;
        padding: .5em;
        font-size: 1.0em;
    }

    .error {
        color: red;
    }
</style>

<body>

    <h2>Form Validation with PHP</h2>

    <form action="FormValidation.php" method="post">
        <legend>* Please fill out the following fields</legend>
        <fieldset>
            Name:<br>
            <input class="input" type="text" name="Name" value="">
            <span class="error">*<?php echo " $NameError"; ?></span><br>
            Email:<br>
            <input class="input" type="text" name="Email" value="">
            <span class="error">*<?php echo " $EmailError"; ?></span><br>
            Gender:<br>
            <input class="radio" type="radio" name="Gender" value="Female">Female
            <input class="radio" type="radio" name="Gender" value="Male">Male
            <span class="error">*<?php echo " $GenderError"; ?></span><br>
            Website:<br>
            <input class="input" type="text" name="Website" value="">
            <span class="error">*<?php echo " $WebsiteError"; ?></span><br>
            Comment:<br>
            <textarea name="Comment" rows="5" cols="25"></textarea>
            <br>
            <br>
            <input type="submit" name="Submit" value="Submit">
        </fieldset>
    </form>

</body>


</html>