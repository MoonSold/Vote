<?php

use controller;
use service;

require_once "vendor/fpdf/fpdf/original/fpdf.php";
require_once "bootstrap.php";

class pdf extends FPDF
{

    static function decode(string $line):string
    {
        return iconv('utf-8', 'windows-1251', $line);
    }

    function LoadData():array
    {
        global $entityManager;
        $service = new service\AdminService($entityManager);
        $adminController = new controller\AdminController($service);
        $bd_response = $adminController->controllerAdminGetResult();
        $data = [];
        foreach ($bd_response as $line) {
            $line_decode = array_map('self::decode', $line);
            $data[] = $line_decode;
        }
        return $data;
    }

    function FancyTable($header, $data):void
    {
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->AddFont('Arial', '', 'arial.php');
        $this->SetFont('Arial');
        $w = array(60, 60, 60);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, iconv('utf-8', 'windows-1251', $header[$i]), 1, 0, 'C', true);
        $this->Ln();
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, $row[2], 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

$pdf = new PDF();
$pdf->AddFont('Arial', '', 'arial.php');
$pdf->SetFont('Arial');
$header = array('Логин пользователя', 'Голосование', 'Выбор');
$data = $pdf->LoadData();
$pdf->AddPage();
$pdf->FancyTable($header, $data);
$pdf->Output();