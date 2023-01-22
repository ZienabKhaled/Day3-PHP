<?php
$nameerror="";
$mailerror="";
$gendererror="";

$yourname ="";
$email ="" ;
$gender="" ;
$group="";
$selectCourses="" ;
$submit = "";
$details="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["yourname"])){
        $nameerror = "Name is Required";
  }
  if (empty($_POST["email"])){
    $mailerror = "E-mail is Required";
  }
  if (empty($_POST["gender"])){
    $gendererror = "Gender is Required";
  }
}

if(isset($_POST["submit"]) ||  isset($_POST["details"]) || isset($_POST["selectCourses"]) || isset($_POST["yourname"]) || isset($_POST["email"]) || isset($_POST["group"]) ||isset($_POST["gender"])) 
{
    if (!empty($_POST["yourname"]) && !empty($_POST["email"]) && !empty($_POST["group"]) && !empty($_POST["gender"]) && !empty($_POST["details"]) && !empty($_POST["selectCourses"]) && !empty($_POST["submit"]))
    {
    echo "Your Regesteration Data: "."</br>";
    echo "Name: ". $_REQUEST['yourname']. "<br />";
    echo "Email:". $_REQUEST['email']. " <br>";
    echo "Group#:". $_REQUEST['group']. " <br>";
    echo "Class details:". $_REQUEST['details']. " <br>";
    echo "Gender:". $_REQUEST['gender']. " <br>";
    echo "Your courses are:". $_REQUEST['selectCourses']."<br>";
 }}
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
        <form action = "<?php $_PHP_SELF ?>" method = "POST">
          <tr class="input" style="height: 2em">
            <td>
              <label>Your Name</label>
            </td>
            <td class="td2">
              <input
                type="text"
                style="width: 250px; margin-left: 1em"
                name="yourname"
              />
              <span class="error" style="color:red">* <?php echo $nameerror;?></span>
            </td>
          </tr>
          <br />
          <tr class="input" style="height: 2em">
            <td>
              <label>E-Mail ID</label>
            </td>
            <td class="td2">
              <input
                type="email"
                style="width: 250px; margin-left: 1em"
                name="email"
              />
              <span class="error" style="color:red">* <?php echo $mailerror;?></span>
            </td>
          </tr>
          <br />
          <tr class="input" style="height: 2em">
            <td><label>Group#</label></td>
            <td class="td2">
              <input
                type="text"
                style="width: 250px; margin-left: 1em"
                name="group"
              />
            </td>
          </tr>
          <br />
          <tr class="input" style="height: 4em">
            <td><label>Class Details</label></td>
            <td class="td2">
              <textarea
                name="details"
                style="width: 70%; height: 100px; margin-left: 1em"
              ></textarea>
            </td>
          </tr>
          <br />

          <tr class="input" style="height: 2em">
            <td>
              <label>Gender</label>
            </td>
            <td class="td2">
              <input type="radio" value="male" name="gender"/>
              <label for="">Male</label>
              <input type="radio" value="male" name="gender" />
              <label for="">Female</label>
              <span class="error" style="color:red">* <?php echo $gendererror;?></span>
            </td>

          </tr>
          <br />
          <tr class="input" style="height: 2em">
            <td><label>Select Courses</label></td>
            <td class="td2">
              <select
                name="selectCourses"
                style="margin-left: 80px; width: 200px; text-align: center"
              >
                <option value="PHP">PHP</option>
                <option value="HTML">HTML</option>
                <option value="JS">JS</option>
              </select>
            </td>
          </tr>
          <br />
          <tr><td><input style="width: 50% ; height: 30px;" type="submit" name= "submit" value="submit"></td></tr>
         

        </form>
      </table>
    </div>
  </div>
</center>
</body>
</html>

