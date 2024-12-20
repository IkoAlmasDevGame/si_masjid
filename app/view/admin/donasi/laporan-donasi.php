<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Keuangan</title>
        <?php if ($_SESSION['akses'] == 'admin') { ?>
        <?php require_once("../ui/header.php"); ?>
        <?php } else { ?>
        <?php
        header("location:../ui/header.php?page=beranda");
        exit(0);
        ?>
        <?php } ?>
    </head>

    <body>
        <?php require_once("../../../../dist/library/pdf/fpdf.php"); ?>
        <?php $pdf = new FPDF('P', 'mm', 'A4'); ?>
        <?php if (isset($_GET['export'])): ?>
        <?php $export = htmlspecialchars($_GET['export']); ?>
        <?php $no = 1; ?>
        <?php $SQL = "SELECT * FROM donasi"; ?>
        <?php $laporan = $koneksi->query($SQL); ?>
        <?php
        // Your PDF generation code here
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);
        // Add title to the PDF
        $pdf->Cell(0, 10, 'Data Laporan Donatur', 0, 1, 'C');
        $pdf->Cell(30, 9, 'No', 1, 0, 'C');
        $pdf->Cell(50, 9, 'Nama Donatur', 1, 0, 'C');
        $pdf->Cell(50, 9, 'Nominal Transfer', 1, 0, 'C');
        $pdf->Ln(); // Move to next line after headers        
        ?>
        <?php if (mysqli_num_rows($laporan) > 0) { ?>
        <?php while ($row = $laporan->fetch_array()) { ?>
        <?php $pdf->Cell(30, 9, $no++, 1, 0, 'C'); ?>
        <?php $pdf->Cell(50, 9, $row['nama_donatur'], 1, 0, 'C'); ?>
        <?php $pdf->Cell(50, 9, "Rp. " . number_format($row['nominal_transfer'], 2), 1, 0, 'C'); ?>
        <?php $pdf->Ln(); ?>
        <?php } ?>
        <?php } else { ?>
        <?php $pdf->Cell(130, 9, "No records found.", 1, 0, 'C'); ?>
        <?php } ?>
        <?php endif; ?>
        <?php $pdf->Output('../../../../assets/files/laporan-donasi.pdf', 'F'); ?>
        <?php header("location:../ui/header.php?page=donasi"); ?>
        <?php exit(0); ?>
        <?php require_once("../ui/footer.php"); ?>