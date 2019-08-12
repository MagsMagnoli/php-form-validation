<?php
// init variables
$Name = "";
$Email = "";
$Gender = "";
$Website = "";
$NameError = "";
$EmailError = "";
$GenderError = "";
$WebsiteError = "";

// on submit the below executes
if (isset($_POST['Submit'])) {

    // name
    if (empty($_POST["Name"])) {
        $NameError = "Name is Required";
    } else {
        $Name = Test_User_Input($_POST['Name']);

        // validate name
        if (!preg_match("/^[A-Za-z\. ]*$/", $Name)) {
            $NameError = "Invalid name";
        }
    }

    // email
    if (empty($_POST["Email"])) {
        $EmailError = "Email is Required";
    } else {
        $Email = Test_User_Input($_POST['Email']);

        // validate email
        if (!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $Email)) {
            $EmailError = "Invalid email";
        }
    }

    // gender
    if (empty($_POST["Gender"])) {
        $GenderError = "Gender is Required";
    } else {
        $Gender = Test_User_Input($_POST['Gender']);
    }

    // website
    if (empty($_POST["Website"])) {
        $WebsiteError = "Website is Required";
    } else {
        $Website = Test_User_Input($_POST['Website']);

        // validate website
        if (!preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/", $Website)) {
            $WebsiteError = "Invalid website";
        }
    }

    // if form filled below executes
    if (!empty($Name) && !empty($Email) && !empty($Gender) && !empty($Website)) {
        // if no errors
        if (empty($NameError) && empty($EmailError) && empty($GenderError) && empty($WebsiteError)) {
            echo "<h2>Your Information</h2>";
            echo "Name: " . ucwords($Name) . "<br>";
            echo "Email: $Email<br>";
            echo "Gender: $Gender<br>";
            echo "Website: $Website<br>";
            echo "Comment: {$_POST['Comment']}<br>";
        } else {
            echo "<span class=\"error\">* Please update your information and try again</span>";
        }
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
</head>

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