<?php
// Your SQL query to fetch all records from the e_book table
$portal_sql = "SELECT * FROM students"; // Adjust the table name if different
$portal_result = $portal_conn->query($portal_sql);

// Check if there are any results
if ($portal_result->num_rows > 0) {
// Loop through each row in the result set
while ($row = $portal_result->fetch_assoc()) {
// Extract the data from the current row
$bookId = $row['id'];
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$email = $row['email'];
$reg_number = $row['reg_number'];
$student_dpt = $row['student_department'];
$student_img = $row['passport'];
$gender = $row['gender'];

$full_name = $firstname.' '.$lastname;
if($student_img == ''){
    $student_img = 'default.png';
}


?>

<div class="d-flex align-items-center justify-content-between gap-3 mb-32">
    <div class="d-flex align-items-center">
        <img src="<?=$siteUrl?>cms/assets/added/img/student/<?=$student_img?>" alt="<?=$full_name?>"
             class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
        <div class="flex-grow-1">
            <h6 class="text-md mb-0"><?=$full_name?></h6>
            <span class="text-sm text-secondary-light fw-medium"><?=$student_dpt?></span>
        </div>
    </div>
    <span class="text-primary-light text-md fw-medium"><?=$gender?></span>
</div>

    <?php
}
} else {
    echo "No records found.";
}
?>