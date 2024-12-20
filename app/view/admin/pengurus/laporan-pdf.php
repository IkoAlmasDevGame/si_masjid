<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Pengurus</title>
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
        <?php $pdf = new FPDF(); ?>
        <?php if (isset($_GET['export'])): ?>
        <?php $export = htmlspecialchars($_GET['export']); ?>
        <?php $no = 1; ?>
        <?php $SQL = "SELECT * FROM pengurus"; ?>
        <?php $pengurus = $koneksi->query($SQL); ?>
        <?php
        // Your PDF generation code here
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);
        // Add title to the PDF
        $pdf->Cell(0, 10, 'Data Susunan Pengurus', 0, 1, 'C');
        $pdf->Cell(40, 9, 'No.', 1, 0, 'C');
        $pdf->Cell(50, 9, 'Nama Pengurus', 1, 0, 'C');
        $pdf->Cell(50, 9, 'No Handphone', 1, 0, 'C');
        $pdf->Cell(50, 9, 'Jabatan', 1, 0, 'C');
        $pdf->Ln(); // Move to next line after headers        
        ?>
        <?php if (mysqli_num_rows($pengurus) > 0) { ?>
        <?php while ($row = $pengurus->fetch_array()) { ?>
        <?php $pdf->Cell(40, 9, $no++, 1, 0, 'C'); ?>
        <?php $pdf->Cell(50, 9, $row['nama_pengurus'], 1, 0, 'C'); ?>
        <?php $pdf->Cell(50, 9, $row['no_hp'], 1, 0, 'C'); ?>
        <?php $pdf->Cell(50, 9, $row['jabatan'], 1, 0, 'C'); ?>
        <?php $pdf->Ln(); ?>
        <?php } ?>
        <?php } else { ?>
        <?php $pdf->Write(0, "No records found."); ?>
        <?php } ?>
        <?php endif; ?>
        <?php $pdf->Output('../../../../assets/files/laporan-pengurus.pdf', 'F'); ?>
        <?php header("location:../ui/header.php?page=pengurus"); ?>
        <?php exit(0); ?>
        <?php require_once("../ui/footer.php"); ?>