<?php
class CarPolicy {
    private $policyNumber;
    private $yearlyPremium;
    private $dateOfLastClaim;

    public function __construct($policyNumber, $yearlyPremium) {
        $this->policyNumber = $policyNumber;
        $this->yearlyPremium = $yearlyPremium;
    }

    public function setDateOfLastClaim($dateOfLastClaim) {
        $this->dateOfLastClaim = $dateOfLastClaim;
    }

    public function getTotalYearsNoClaims() {
        $currentDate = new DateTime();
        $lastDate = new DateTime($this->dateOfLastClaim);
        $interval = $currentDate->diff($lastDate);
        return $interval->format("%y");
    }

    public function getDiscount() {
        $years = $this->getTotalYearsNoClaims();
        if ($years >= 3 && $years <= 5) {
            return 0.10;
        } elseif ($years > 5) {
            return 0.15;
        } else {
            return 0.0;
        }
    }

    public function getDiscountedPremium() {
        $discount = $this->getDiscount();
        return $this->yearlyPremium * (1 - $discount);
    }

    public function __toString() {
        return "PN: " . $this->policyNumber;
    }
}
?>
