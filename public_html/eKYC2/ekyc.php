<?php
// Include TCPDF manually
require_once('tcpdf/test/TcpdfTest.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Simulate Aadhar OTP verification
    $otpEntered = $_POST['otp'];
    $validOTP = "1100"; // Hardcoded valid OTP for demo

    if ($otpEntered != $validOTP) {
        die('Invalid OTP entered!');
    }

    // Collect form data
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $pan = $_POST['pan'];
    $bank_account = $_POST['bank_account'];
    $aadhar = $_POST['aadhar'];

    // Initialize TCPDF
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);

    // Add form data to PDF
    $pdf->Cell(0, 10, 'eKYC Information', 0, 1, 'L');
    $pdf->Cell(0, 10, 'Name: ' . $name, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Date of Birth: ' . $dob, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Address: ' . $address, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Email: ' . $email, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Mobile: ' . $mobile, 0, 1, 'L');
    $pdf->Cell(0, 10, 'PAN: ' . $pan, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Bank Account: ' . ($bank_account ? $bank_account : 'N/A'), 0, 1, 'L');
    $pdf->Cell(0, 10, 'Aadhar: ' . $aadhar, 0, 1, 'L');

    // Output PDF for download
    $pdf->Output('ekyc_details.pdf', 'D'); // D for download
}
?>
