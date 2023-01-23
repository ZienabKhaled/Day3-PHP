<?php
$nameerror = "";
$mailerror = "";
$gendererror = "";

$yourname = "";
$email = "";
$gender = "";
$group = "";
$selectCourses = "";
$submit = "";
$details = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["yourname"])) {
    $nameerror = "Name is Required";
  } else {
    $yourname = test_input($_POST["yourname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $yourname)) {
      $nameerror = "Only letters and white space allowed";
    }}
  }

  if (empty($_POST["email"])) {
    $mailerror = "E-mail is Required";
  }
  else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $mailerror = "Invalid email format";
    }

  if (empty($_POST["gender"])) {
    $gendererror = "Gender is Required";
  }else {
    $gender = test_input($_POST["gender"]);
  }
}

if (empty($_POST["details"])) {
  $details = "";
} else {
  $details= test_input($_POST["details"]);
}

if (empty($_POST["group"])) {
  $group = "";
} else {
  $group = test_input($_POST["group"]);
}

if (isset($_POST["submit"]) ||  isset($_POST["details"]) || isset($_POST["selectCourses"]) || isset($_POST["yourname"]) || isset($_POST["email"]) || isset($_POST["group"]) || isset($_POST["gender"])) {
  if (!empty($_POST["yourname"]) && !empty($_POST["email"]) && !empty($_POST["group"]) && !empty($_POST["gender"]) && !empty($_POST["details"]) && !empty($_POST["selectCourses"]) && !empty($_POST["submit"])) {
    echo "Your Regesteration Data: " . "</br>";
    echo "Name: " . $_REQUEST['yourname'] . "<br />";
    echo "Email:" . $_REQUEST['email'] . " <br>";
    echo "Group#:" . $_REQUEST['group'] . " <br>";
    echo "Class details:" . $_REQUEST['details'] . " <br>";
    echo "Gender:" . $_REQUEST['gender'] . " <br>";
    echo "Your courses are:". "<br>";

  foreach( $_POST['selectCourses'] as $course ){
    echo $course."<br>";
  }
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<head>
  <link rel="stylesheet" href="mystle.css" />
</head>

<body>
  <center>
    <div class="big">
      <div class="title">Application name:AAST_BIS class registration</div>
      <div class="h2">
        Field marked with are <em style="color: red">*</em>compulsory fields
      </div>
      <div>
        <table style="width: 95%; position: relative; top: -50px">
          <form action="<?php $_PHP_SELF ?>" method="POST">
            <tr class="input" style="height: 2em">
              <td>
                <label>Your Name</label>
              </td>
              <td class="td2">
                <input type="text" style="width: 250px; margin-left: 1em" name="yourname" value="<?php echo $yourname;?>" />
                <span class="error" style="color:red">* <?php echo $nameerror; ?></span>
              </td>
            </tr>
            <br />
            <tr class="input" style="height: 2em">
              <td>
                <label>E-Mail ID</label>
              </td>
              <td class="td2">
                <input type="email" style="width: 250px; margin-left: 1em" name="email" value="<?php echo $email;?>"/>
                <span class="error" style="color:red">* <?php echo $mailerror; ?></span>
              </td>
            </tr>
            <br />
            <tr class="input" style="height: 2em">
              <td><label>Group#</label></td>
              <td class="td2">
                <input type="text" style="width: 250px; margin-left: 1em" name="group" value="<?php echo $group;?>"/>
              </td>
            </tr>
            <br />
            <tr class="input" style="height: 4em">
              <td><label>Class Details</label></td>
              <td class="td2">
                <textarea name="details" style="width: 70%; height: 100px; margin-left: 1em"><?php echo $details;?></textarea>
              </td>
            </tr>
            <br />
            <tr class="input" style="height: 2em">
              <td>
                <label>Gender</label>
              </td>
              <td class="td2">
                <input type="radio" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male" name="gender" />
                <label for="">Male</label>
                <input type="radio" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female" name="gender" />
                <label for="">Female</label>
                <span class="error" style="color:red">* <?php echo $gendererror; ?></span>
              </td>
            </tr>
            <br />
            <tr class="input" style="height: 2em">
              <td><label>Select Courses</label></td>
              <td class="td2">
                <select name="selectCourses[]" multiple="multiple" style="margin-left: 80px; width: 200px; text-align: center">
                  <option value="PHP">PHP</option>
                  <option value="HTML">HTML</option>
                  <option value="JS">JS</option>
                  <option value="CSS">CSS</option>
                  <option value="OOP">OOP</option>
                </select>
              </td>
            </tr>
            <br />
            <tr>
              <td><input style="width: 50% ; height: 30px;" type="submit" name="submit" value="submit"></td>
            </tr>
          </form>
        </table>
      </div>
    </div>
  </center>
</body>

</html>