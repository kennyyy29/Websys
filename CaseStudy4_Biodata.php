<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST;
    $errors = [];

    // --- Validate required fields ---
    if (empty($data['fullname'])) {
        $errors[] = "Full Name is required.";
    }

    if (empty($data['position'])) {
        $errors[] = "Position Desired is required.";
    }

    if (empty($data['contact']) || !is_numeric($data['contact'])) {
        $errors[] = "Contact Number is required and must be numeric.";
    }

    
    $uploadedPhoto = null;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

       
        $allowedTypes = ['jpg', 'jpeg', 'png'];
        $fileType = strtolower(pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION));

       
        $maxSize = 2 * 1024 * 1024;

        if (!in_array($fileType, $allowedTypes)) {
            $errors[] = "Only JPG and PNG files are allowed.";
        } elseif ($_FILES["photo"]["size"] > $maxSize) {
            $errors[] = "File size must be under 2MB.";
        } else {
            $targetFile = $targetDir . uniqid("img_") . "." . $fileType;
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                $uploadedPhoto = $targetFile;
            } else {
                $errors[] = "Failed to upload the image.";
            }
        }
    } else {
        $errors[] = "Photo is required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bio-Data Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      margin: 20px;
    }
    .container {
      max-width: 900px;
      margin: auto;
      background: #fff;
      padding: 20px;
      border: 2px solid #000;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      text-transform: uppercase;
    }
    .section {
      border: 1px solid #000;
      margin-bottom: 20px;
    }
    .section h3 {
      background: #000;
      color: #fff;
      margin: 0;
      padding: 6px;
      font-size: 16px;
      text-transform: uppercase;
    }
    .section table {
      width: 100%;
      border-collapse: collapse;
    }
    .section td {
      padding: 6px;
      border: 1px solid #ccc;
      font-size: 14px;
      vertical-align: top;
    }
    input, textarea {
      width: 95%;
      padding: 4px;
      font-size: 14px;
    }
    .signature {
      margin-top: 30px;
      text-align: right;
    }
    .submit-btn {
      display: block;
      width: 200px;
      padding: 10px;
      background: #000;
      color: #fff;
      border: none;
      margin: 20px auto;
      cursor: pointer;
      font-size: 16px;
    }
    .submit-btn:hover {
      background: #444;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Bio-Data</h2>

    <form action="display.php" method="POST" enctype="multipart/form-data">

      
      <div class="section">
        <h3>Personal Data</h3>
        <table>
          <tr>
  <td colspan="2">
    Upload Photo: <input type="file" name="photo" accept="image/*">
  </td>
</tr>
          <tr>
            <td>Position Desired: <input type="text" name="position" required></td>
            <td>Date: <input type="date" name="date"></td>
          </tr>
          <tr>
            <td>Name: <input type="text" name="name" required></td>
            <td>Gender: <input type="text" name="gender"></td>
          </tr>
          <tr>
            <td>City Address: <input type="text" name="city_address"></td>
            <td>Provincial Address: <input type="text" name="prov_address"></td>
          </tr>
          <tr>
            <td>Telephone: <input type="text" name="telephone"></td>
            <td>Cellphone: <input type="text" name="cellphone"></td>
          </tr>
          <tr>
            <td>Email: <input type="email" name="email"></td>
            <td>Date of Birth: <input type="date" name="dob"></td>
          </tr>
          <tr>
            <td>Birth Place: <input type="text" name="birth_place"></td>
            <td>Citizenship: <input type="text" name="citizenship"></td>
          </tr>
          <tr>
            <td>Height: <input type="text" name="height"></td>
            <td>Weight: <input type="text" name="weight"></td>
          </tr>
          <tr>
            <td>Religion: <input type="text" name="religion"></td>
            <td>Civil Status: <input type="text" name="civil_status"></td>
          </tr>
          <tr>
            <td>Spouse: <input type="text" name="spouse"></td>
            <td>Occupation: <input type="text" name="spouse_occ"></td>
          </tr>
          <tr>
            <td>Children Name: <input type="text" name="children"></td>
            <td>Children DOB: <input type="date" name="child_dob"></td>
          </tr>
          <tr>
            <td>Father's Name: <input type="text" name="father"></td>
            <td>Occupation: <input type="text" name="father_occ"></td>
          </tr>
          <tr>
            <td>Mother's Name: <input type="text" name="mother"></td>
            <td>Occupation: <input type="text" name="mother_occ"></td>
          </tr>
          <tr>
            <td colspan="2">Language/Dialect: <input type="text" name="language"></td>
          </tr>
          <tr>
            <td colspan="2">Emergency Contact (Name/Phone): <input type="text" name="emergency"></td>
          </tr>
        </table>
      </div>

     
      <div class="section">
        <h3>Educational Background</h3>
        <table>*
          <tr>
            <td>Elementary: <input type="text" name="elementary"></td>
            <td>Year Graduated: <input type="text" name="elem_year"></td>
          </tr>
          <tr>
            <td>High School: <input type="text" name="highschool"></td>
            <td>Year Graduated: <input type="text" name="hs_year"></td>
          </tr>
          <tr>
            <td>College: <input type="text" name="college"></td>
            <td>Year Graduated: <input type="text" name="college_year"></td>
          </tr>
          <tr>
            <td>Degree Received: <input type="text" name="degree"></td>
            <td>Special Skills: <input type="text" name="skills"></td>
          </tr>
        </table>
      </div>

      
      <div class="section">
        <h3>Employment Record</h3>
        <table>
          <tr>
            <td>Company Name: <input type="text" name="company1"></td>
            <td>Position: <input type="text" name="position1"></td>
          </tr>
          <tr>
            <td>From: <input type="date" name="from1"></td>
            <td>To: <input type="date" name="to1"></td>
          </tr>
          <tr>
            <td>Company Name: <input type="text" name="company2"></td>
            <td>Position: <input type="text" name="position2"></td>
          </tr>
          <tr>
            <td>From: <input type="date" name="from2"></td>
            <td>To: <input type="date" name="to2"></td>
          </tr>
        </table>
      </div>

      
      <div class="section">
        <h3>Character Reference</h3>
        <table>
          <tr>
            <td>Name: <input type="text" name="ref1_name"></td>
            <td>Company: <input type="text" name="ref1_company"></td>
          </tr>
          <tr>
            <td>Position: <input type="text" name="ref1_pos"></td>
            <td>Contact No: <input type="text" name="ref1_contact"></td>
          </tr>
          <tr>
            <td>Name: <input type="text" name="ref2_name"></td>
            <td>Company: <input type="text" name="ref2_company"></td>
          </tr>
          <tr>
            <td>Position: <input type="text" name="ref2_pos"></td>
            <td>Contact No: <input type="text" name="ref2_contact"></td>
          </tr>
        </table>
      </div>

      
      <div class="section">
        <h3>Other Details</h3>
        <table>
          <tr>
            <td>Res. Cert. No: <input type="text" name="res_cert"></td>
            <td>Issued at: <input type="text" name="issued_at"></td>
          </tr>
          <tr>
            <td>SSS: <input type="text" name="sss"></td>
            <td>TIN: <input type="text" name="tin"></td>
          </tr>
          <tr>
            <td>NBI No: <input type="text" name="nbi"></td>
            <td>Passport No: <input type="text" name="passport"></td>
          </tr>
        </table>
      </div>

     
      <div class="signature">
        <p>I hereby certify that the above information is true and correct.</p>
        <br><br>
        <p>_____________________________<br>
        Applicant's Signature</p>
      </div>

      <button type="submit" class="submit-btn">Submit</button>
    </form>
  </div>
</body>
</html>
