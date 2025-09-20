<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = $_POST;
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST;

    
    $uploadedPhoto = null;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        
        $allowedTypes = ['jpg', 'jpeg', 'png'];
        $fileType = strtolower(pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION));

        
        $maxSize = 2 * 1024 * 1024;

        if (in_array($fileType, $allowedTypes) && $_FILES["photo"]["size"] <= $maxSize) {
            $targetFile = $targetDir . uniqid("img_") . "." . $fileType;
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                $uploadedPhoto = $targetFile;
            }
        } else {
            $uploadError = "Only JPG/PNG files under 2MB are allowed.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Submitted Bio-Data</title>
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
  </style>
</head>
<body>
  <div class="container">
    <h2>Bio-Data</h2>

    
    <div class="section">
      <h3>Personal Data</h3>
      <table>
        <?php if ($uploadedPhoto): ?>
<tr>
  <td colspan="2" style="text-align:center;">
    <img src="<?= $uploadedPhoto ?>" alt="Uploaded Photo" style="max-width:150px; border:1px solid #000;">
  </td>
</tr>
<?php endif; ?>

        <tr><td>Position Desired</td><td><?= $data['position'] ?></td></tr>
        <tr><td>Date</td><td><?= $data['date'] ?></td></tr>
        <tr><td>Name</td><td><?= $data['name'] ?></td></tr>
        <tr><td>Gender</td><td><?= $data['gender'] ?></td></tr>
        <tr><td>City Address</td><td><?= $data['city_address'] ?></td></tr>
        <tr><td>Provincial Address</td><td><?= $data['prov_address'] ?></td></tr>
        <tr><td>Telephone</td><td><?= $data['telephone'] ?></td></tr>
        <tr><td>Cellphone</td><td><?= $data['cellphone'] ?></td></tr>
        <tr><td>Email</td><td><?= $data['email'] ?></td></tr>
        <tr><td>Date of Birth</td><td><?= $data['dob'] ?></td></tr>
        <tr><td>Birth Place</td><td><?= $data['birth_place'] ?></td></tr>
        <tr><td>Citizenship</td><td><?= $data['citizenship'] ?></td></tr>
        <tr><td>Height</td><td><?= $data['height'] ?></td></tr>
        <tr><td>Weight</td><td><?= $data['weight'] ?></td></tr>
        <tr><td>Religion</td><td><?= $data['religion'] ?></td></tr>
        <tr><td>Civil Status</td><td><?= $data['civil_status'] ?></td></tr>
        <tr><td>Spouse</td><td><?= $data['spouse'] ?></td></tr>
        <tr><td>Spouse Occupation</td><td><?= $data['spouse_occ'] ?></td></tr>
        <tr><td>Children</td><td><?= $data['children'] ?></td></tr>
        <tr><td>Children DOB</td><td><?= $data['child_dob'] ?></td></tr>
        <tr><td>Father</td><td><?= $data['father'] ?></td></tr>
        <tr><td>Father Occupation</td><td><?= $data['father_occ'] ?></td></tr>
        <tr><td>Mother</td><td><?= $data['mother'] ?></td></tr>
        <tr><td>Mother Occupation</td><td><?= $data['mother_occ'] ?></td></tr>
        <tr><td>Language/Dialect</td><td><?= $data['language'] ?></td></tr>
        <tr><td>Emergency Contact</td><td><?= $data['emergency'] ?></td></tr>
      </table>
    </div>

  
    <div class="section">
      <h3>Educational Background</h3>
      <table>
        <tr><td>Elementary</td><td><?= $data['elementary'] ?></td></tr>
        <tr><td>Year Graduated</td><td><?= $data['elem_year'] ?></td></tr>
        <tr><td>High School</td><td><?= $data['highschool'] ?></td></tr>
        <tr><td>Year Graduated</td><td><?= $data['hs_year'] ?></td></tr>
        <tr><td>College</td><td><?= $data['college'] ?></td></tr>
        <tr><td>Year Graduated</td><td><?= $data['college_year'] ?></td></tr>
        <tr><td>Degree Received</td><td><?= $data['degree'] ?></td></tr>
        <tr><td>Special Skills</td><td><?= $data['skills'] ?></td></tr>
      </table>
    </div>

   
    <div class="section">
      <h3>Employment Record</h3>
      <table>
        <tr><td>Company 1</td><td><?= $data['company1'] ?></td></tr>
        <tr><td>Position</td><td><?= $data['position1'] ?></td></tr>
        <tr><td>From</td><td><?= $data['from1'] ?></td></tr>
        <tr><td>To</td><td><?= $data['to1'] ?></td></tr>
        <tr><td>Company 2</td><td><?= $data['company2'] ?></td></tr>
        <tr><td>Position</td><td><?= $data['position2'] ?></td></tr>
        <tr><td>From</td><td><?= $data['from2'] ?></td></tr>
        <tr><td>To</td><td><?= $data['to2'] ?></td></tr>
      </table>
    </div>

   
    <div class="section">
      <h3>Character Reference</h3>
      <table>
        <tr><td>Name</td><td><?= $data['ref1_name'] ?></td></tr>
        <tr><td>Company</td><td><?= $data['ref1_company'] ?></td></tr>
        <tr><td>Position</td><td><?= $data['ref1_pos'] ?></td></tr>
        <tr><td>Contact No</td><td><?= $data['ref1_contact'] ?></td></tr>
        <tr><td>Name</td><td><?= $data['ref2_name'] ?></td></tr>
        <tr><td>Company</td><td><?= $data['ref2_company'] ?></td></tr>
        <tr><td>Position</td><td><?= $data['ref2_pos'] ?></td></tr>
        <tr><td>Contact No</td><td><?= $data['ref2_contact'] ?></td></tr>
      </table>
    </div>

   
    <div class="section">
      <h3>Other Details</h3>
      <table>
        <tr><td>Res. Cert. No</td><td><?= $data['res_cert'] ?></td></tr>
        <tr><td>Issued At</td><td><?= $data['issued_at'] ?></td></tr>
        <tr><td>SSS</td><td><?= $data['sss'] ?></td></tr>
        <tr><td>TIN</td><td><?= $data['tin'] ?></td></tr>
        <tr><td>NBI No</td><td><?= $data['nbi'] ?></td></tr>
        <tr><td>Passport No</td><td><?= $data['passport'] ?></td></tr>
      </table>
    </div>
  </div>
</body>
</html>
