<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$empId = $_POST["empID"];
$pass = $_POST["pass"];

echo 'https://employer-api.herokuapp.com/Employer/Employee/'.$empId;
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_URL => 'https://employer-api.herokuapp.com/Employer/Employee/'.$empId,

));

$resp = curl_exec($curl);
$json = json_decode($resp, true);



curl_close($curl);

    if($pass == $json['employee_password']){

        $_SESSION['userempid'] = $empId;
        header('Location: consentform_emp.php');

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <title>Login</title>

    <style>
p {
  font-family: verdana;
  text-align: center;
}
    </style>
</head>

<body>
<?php include "navbar_emp.php" ?>
    <form action="" method="post">

        <div class="container">
            <label for="empID"><b><p>EmployeeID</b><p></label>
            <input type="text" placeholder="EmployeeID" name="empID" required>
                    <br><br>
            <label for="pass"><p><b>Password</b><p></label>
            <input type="password" placeholder="Password" name="pass" required>
            <br> <br>
            <button type="submit">Login</button>
        </div>
    </form>
</body>

</html>