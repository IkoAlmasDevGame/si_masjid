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
        <?php $pdf = new FPDF('L', 'mm', 'A4'); ?>
        <?php if (isset($_GET['export'])): ?>
        <?php $export = htmlspecialchars($_GET['export']); ?>
        <?php $no = 1; ?>
        <?php $SQL = "SELECT * FROM laporan_keuangan"; ?>
        <?php $laporan = $koneksi->query($SQL); ?>
        <?php
        // Your PDF generation code here
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);
        // Add title to the PDF
        $pdf->Cell(0, 10, 'Data Laporan Keuangan', 0, 1, 'C');
        $pdf->Cell(40, 9, 'Tanggal Masuk', 1, 0, 'C');
        $pdf->Cell(30, 9, 'Uang Masuk', 1, 0, 'C');
        $pdf->Cell(40, 9, 'Tanggal Keluar', 1, 0, 'C');
        $pdf->Cell(50, 9, 'Uang Keluar', 1, 0, 'C');
        $pdf->Cell(40, 9, 'Saldo Keuangan', 1, 0, 'C');
        $pdf->Ln(); // Move to next line after headers        
        ?>
        <?php if (mysqli_num_rows($laporan) > 0) { ?>
        <?php while ($row = $laporan->fetch_array()) { ?>
        <?php $saldo += $row['uang_masuk']; ?>
        <?php $saldo -= $row['uang_keluar']; ?>
        <?php $pdf->Cell(40, 9, $row['tgl_masuk'], 1, 0, 'C'); ?>
        <?php $pdf->Cell(30, 9, "Rp." . number_format($row['uang_masuk']), 1, 0, 'C'); ?>
        <?php $pdf->Cell(40, 9, $row['tgl_keluar'], 1, 0, 'C'); ?>
        <?php $pdf->Cell(50, 9, "Rp." . number_format($row['uang_keluar']), 1, 0, 'C'); ?>
        <?php $pdf->Cell(40, 9, "Rp." . number_format($saldo, 0, ',', '.'), 1, 0, 'C'); ?>
        <?php $pdf->Ln(); ?>
        <?php } ?>
        <?php } else { ?>
        <?php $pdf->Write(0, "No records found."); ?>
        <?php } ?>
        <?php endif; ?>
        <?php $pdf->Output('../../../../assets/files/laporan-keuangan.pdf', 'F'); ?>
        <?php header("location:../ui/header.php?page=keuangan"); ?>
        <?php exit(0); ?>
        <?php require_once("../ui/footer.php"); ?>