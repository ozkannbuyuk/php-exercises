<?php
require('fpdf/fpdf.php');

class CVGenerator extends FPDF
{
    private $name;
    private $jobTitle;
    private $experience;
    private $email;

    public function __construct($name, $jobTitle, $experience, $email)
    {
        parent::__construct();
        $this->name = $name;
        $this->jobTitle = $jobTitle;
        $this->experience = $experience;
        $this->email = $email;
    }

    public function generateCV()
    {
        $this->AddPage();
        $this->SetFont('Arial', 'B', 16);

        $this->Cell(0, 10, "CV - {$this->name}", 0, 1, 'C');
        $this->Ln(10);

        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, "Name: {$this->name}", 0, 1);
        $this->Cell(0, 10, "Job Title: {$this->jobTitle}", 0, 1);
        $this->Ln(5);

        $this->MultiCell(0, 10, $this->experience);
        $this->Ln(5);

        $this->SetFont('Arial', 'U', 12);
        $this->Cell(0, 10, "Email: {$this->email}", 0, 1, 'C', false, "mailto:{$this->email}");
        $this->Ln(5);

        $this->Output("{$this->name}_cv.pdf", "F");
    }
}

// Kullanım Örneği:
$name = "Ozkan Buyuk";
$jobTitle = "Full-Stack Developer";
$experience = "I have over 10 years of experience in web and mobile development. Throughout this period, I have worked in software-focused companies and provided software support to clients individually. I started my software journey with Php and Java, and since then, I have developed numerous web and mobile applications.";
$email = "info@ozkanbuyuk.com";

$cvGenerator = new CVGenerator($name, $jobTitle, $experience, $email);
$cvGenerator->generateCV();
