 <?php
  require_once('../connect.php');
  require_once('../functions.php');

  header("Content-Type: application/xls");
  header("Content-Disposition: attachment; filename=staffExport.xls");
  header("Pragma: no-cache");
  header("Expires: 0");

  echo '<table border="1">';
  echo '<tr> 
    <th>S/N </th>
    <th>First name</th>
    <th>Middle name</th>
    <th>Last name</th>
    <th>Nationality</th>
    <th>Years of experience</th>
    <th>Education Level</th>
    <th>Field of Interest</th>
    <th>Course of Study</th>
    <th>Phone number</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Marital Status</th>
    <th>Address</th> 
    <th>Skills</th>
    <th>Date of Birth</th>
    <th>CV status</th>
  </tr>';

  /**
   * Fetch all the available Cars
   **/
  $query = "SELECT * FROM pendingstaff";
  $response = @mysqli_query($dbc, $query);
  $counter = 1;

  if ($response) {    
    while ($row = mysqli_fetch_assoc($response)) {
      $firstname = $row["firstname"];
      $middlename = $row["middlename"];
      $lastname = $row["lastname"];
      $nationality = $row["nationality"];
      $expYears = $row["expYears"];
      $educationLevel = $row["educationLevel"];
      $fieldOfInterest = $row["fieldOfInterest"];
      $course = $row["course"];
      $phoneNumber = $row["phoneNumber"];
      $email = $row["email"];
      $gender = $row["gender"];
      $maritalStatus = $row["maritalStatus"];
      $address = $row["address"];
      $skills = $row["skills"];
      $dateOfBirth = $row['dateOfBirth'];
      $cvStatus = $row['cvStatus'];

      echo "<tr>
        <td>$counter</td>
        <td>$firstname</td>
        <td>$middlename</td>
        <td>$lastname</td>
        <td>$nationality</td>
        <td>$expYears</td>
        <td>$educationLevel</td>
        <td>$fieldOfInterest</td>
        <td>$course</td>
        <td>$phoneNumber</td>
        <td>$email</td>
        <td>$gender</td> 
        <td>$maritalStatus</td>
        <td>$address</td>
        <td>$skills</td>
        <td>$dateOfBirth</td>
        <td>$cvStatus</td>
      </tr>";

      $counter++;
    }
  }
  echo '</table>';
  ?>