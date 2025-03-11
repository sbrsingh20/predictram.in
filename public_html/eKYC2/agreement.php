<?php
// Include TCPDF manually
require_once('tcpdf/tcpdf.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Simulate Aadhar OTP verification for Agreement signing
    $otpEntered = $_POST['otp'];
    $validOTP = "1100"; // Hardcoded valid OTP for demo

    if ($otpEntered != $validOTP) {
        die('Invalid OTP entered!');
    }

    // Example of eKYC data (can be dynamically fetched from a database or session)
    $clientName = "John Doe"; 
    $clientAddress = "123, ABC Street, City, State";
    $clientEmail = "john.doe@example.com";
    $clientMobile = "9876543210";

    // Initialize TCPDF
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);

    // Add eKYC data to the PDF
    $pdf->Cell(0, 10, 'eKYC Information', 0, 1, 'L');
    $pdf->Cell(0, 10, 'Name: ' . $clientName, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Address: ' . $clientAddress, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Email: ' . $clientEmail, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Mobile: ' . $clientMobile, 0, 1, 'L');

    // Add the Investment Advisor Agreement to the PDF
    $pdf->AddPage();
    $pdf->Cell(0, 10, 'Investment Advisor Agreement', 0, 1, 'L');
    $pdf->MultiCell(0, 10, '...'); // Add the full agreement text here

    // Output the final PDF
    $pdf->Output('final_agreement.pdf', 'D');
}
?>
