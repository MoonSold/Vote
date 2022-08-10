<?php
register_shutdown_function(function (){
    var_dump(error_get_last());
    die;
});
var_dump($_SESSION);

if ($_SESSION['result']) {
    header("content-type:text/html; charset=cp1251");
    require_once "api/vendor/fpdf/fpdf/original/fpdf.php";
    require_once "api/bootstrap.php";

    class PDF extends FPDF
    {

        static function decode(string $line)
        {
            return iconv('utf-8', 'windows-1251', $line);
        }

        function LoadData($bd_response)
        {
            $data = [];
            foreach ($bd_response as $line) {
                $line_decode = array_map('self::decode', $line);
                $data[] = $line_decode;
            }
            return $data;
        }

        function BasicTable($header, $data)
        {
            foreach ($header as $col) {
                $decode_col = iconv('utf-8', 'windows-1251', $col);
                $this->Cell(60, 7, $decode_col, 1);
            }
            $this->Ln();
            foreach ($data as $row) {
                foreach ($row as $col) {
                    $this->Cell(60, 6, $col, 1);
                }
                $this->Ln();
            }
        }

        function FancyTable($header, $data)
        {
            // Colors, line width and bold font
            $this->SetFillColor(255, 0, 0);
            $this->SetTextColor(255);
            $this->SetDrawColor(128, 0, 0);
            $this->SetLineWidth(.3);
            $this->AddFont('Arial', '', 'arial.php');
            $this->SetFont('Arial');
            // Header
            $w = array(60, 60, 60);
            for ($i = 0; $i < count($header); $i++)
                $this->Cell($w[$i], 7, iconv('utf-8', 'windows-1251', $header[$i]), 1, 0, 'C', true);
            $this->Ln();
            // Color and font restoration
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
            // Closing line
            $this->Cell(array_sum($w), 0, '', 'T');
        }
    }

    $service = new service\AdminService($entityManager);
    $adminController = new controller\AdminController($service);
    $all_result = $adminController->controllerAdminGetResult();
    $pdf = new PDF();
    $pdf->AddFont('Arial', '', 'arial.php');
    $pdf->SetFont('Arial');
    $header = array('Логин пользователя', 'Голосование', 'Выбор');
    $data = $pdf->LoadData($all_result);
    $pdf->AddPage();
    $pdf->FancyTable($header, $data);
    $pdf->Output();
    session_unset('result');
    session_destroy();
}

if (isset($_GET['result'])) {
    session_start();
    $_SESSION['result'] = true;
    var_dump($_SESSION);
}