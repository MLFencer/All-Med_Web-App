<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmacy Creation</title>
    <link rel="stylesheet" href="pharmacyStyles.css">
</head>
<body class="pageBody">
<div class="topofpage">
    <h1 class="pageHeader">All-Med</h1>
    <h3 class="subHeader">Complete Patient Management</h3>
</div>
<div id="container1">
    <div id="container2">
        <div id="container3">

            <div id="col1">
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="registerMenu">
                    <br>
                    <br>
                    <br>
                    <a style="margin-left: 20%" href="index.php">Main Menu</a>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>

            <div id="col2">
                <div id="centerStuff">
                    <?php
                    if(isset($_POST['submit'])){
                        if($_POST['Fname']!=null && $_POST['Lname']!=null && $_POST['email']!=null && $_POST['username']!=null && $_POST['password']!=null && $_POST['password2']!=null && $_POST['phone']!=null && $_POST['name']!=null && $_POST['street']!=null && $_POST['city']!=null && $_POST['state']!=null && $_POST['zip'] )
                        {
                            if($_POST['password']==$_POST['password2'])
                            {

                                $json = json_encode(array(
                                    "manager" => array(
                                        "fname" => $_POST['Fname'],
                                        "lname" => $_POST['Lname'],
                                        "email" => $_POST['email'],
                                        "username" => $_POST['username'],
                                        "password" => $_POST['password'],
                                    ),
                                    "pharmacy" => array(
                                        "name" => $_POST['name'],
                                        "phone" => $_POST['phone'],
                                        "location" => array(
                                            "street" => $_POST['street'],
                                            "city" => $_POST['city'],
                                            "state" => $_POST['state'],
                                            "zip" => $_POST['zip']
                                        )
                                    )
                                ));

                                $client = fsockopen("localhost", 8088, $errno, $errorMessage, 30);

                                if(!$client){
                                    echo "$errorMessage ($errno)<br>\n";
                                } else{
                                    fwrite($client, "web:pharmacy:$json");
                                }
                                fclose($client);

                            } else{
                                echo "<h5>Passwords do not match</h5>";
                            }
                        } else {
                            echo "<h5>Missing Inputs</h5>";
                        }
                    }
                    ?>
                    <form action method="post" enctype="multipart/form-data">
                        <div id="label">Manager First Name:</div> <div id="theInput"><input name="Fname" type="text"></div>
                        <div id="label">Manager Last Name:</div> <div id="theInput"><input name="Lname" type="text"></div>
                        <div id="label">Manager Email:</div> <div id="theInput"><input name="email" type="email"></div>
                        <div id="label">Manager Username:</div> <div id="theInput"><input name="username" type="text"></div>
                        <div id="label">Password:</div> <div id="theInput"><input name="password" type="password"></div>
                        <div id="label">Repeat Password:</div> <div id="theInput"><input name="password2" type="password"></div>
                        <div id="label">Pharmacy Phone Number:</div> <div id="theInput"><input name="phone" type="tel"></div>
                        <div id="label">Pharmacy Name:</div> <div id="theInput"><input name="name" type="text"></div>
                        <div id="label">Pharmacy Location:</div><div id="theInput"><br> </div>
                        <div id="label">Street Address:</div> <div id="theInput"><input name="street" type="text"></div>
                        <div id="label">City: </div><div id="theInput"><input name="city" type="text"></div>
                        <div id="label">State:</div> <div id="theInput"><input name="state" type="text"></div>
                        <div id="label">Zip:</div> <div id="theInput"><input name="zip" type="number"></div>
                        <input type="submit" name="submit" value="Submit" style="margin-top: 50%">


                    </form>
                </div>
            </div>


            <div id="col3">

            </div>

        </div>
    </div>
</div>
</body>
</html>