<?php
$yp = $_POST['yearlyPremium'];
$pn = $_POST['policyNumber'];
$dolc = $_POST['dateOfLastClaim'];

include("CarPolicy.php");

$thisCarPolicy = new CarPolicy($pn, $yp);
$thisCarPolicy->setDateOfLastClaim($dolc);

$t = $thisCarPolicy->getTotalYearsNoClaims();

echo "Yearly premium is " . $t;
?>
