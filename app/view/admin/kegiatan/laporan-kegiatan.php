<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kegiatan Masjid</title>
    <?php
    // Checking if the user is an admin
    if ($_SESSION['akses'] != 'admin') {
        // Redirecting if the user is not an admin
        header("location:../ui/header.php?page=beranda");
        exit(0);
    }
    require_once("../ui/header.php");
    ?>
</head>

<body>
    <?php
    require_once("../../../../dist/library/pdf/fpdf.php");
    ?>
    <div class="container-fluid">
        <div class="table-responsive">
            <?php
            $pdf = new FPDF();
            if (isset($_GET['export'])) {
                // Make sure to escape and sanitize the query string properly
                $export = htmlspecialchars($_GET['export']);
                $no = 1;

                // Database query to fetch kegiatan data
                $SQL = "SELECT * FROM kegiatan";
                $pengurus = $koneksi->query($SQL);

                // Check if query is successful
                if ($pengurus) {
                    // Start PDF generation
                    $pdf->AddPage();
                    $pdf->SetFont('Arial', '', 12);
                    // Add title to the PDF
                    $pdf->Cell(0, 10, 'Data Kegiatan Masjid', 0, 1, 'C');
                    $pdf->Cell(20, 9, 'No.', 1, 0, 'C');
                    $pdf->Cell(40, 9, 'Tanggal Diterbitkan', 1, 0, 'C');
                    $pdf->Cell(40, 9, 'Judul Kegiatan', 1, 0, 'C');
                    $pdf->Cell(90, 9, 'Keterangan Kegiatan', 1, 0, 'C');
                    $pdf->Ln(); // Move to next line after headers

                    if (mysqli_num_rows($pengurus) > 0) {
                        // Loop through the result set and add data to the PDF
                        while ($row = $pengurus->fetch_array()) {
                            $pdf->Cell(20, 9, $no++, 1, 0, 'C');
                            $pdf->Cell(40, 9, $row['tanggal_artikel'], 1, 0, 'C');
                            $pdf->Cell(40, 9, $row['judul_kegiatan'], 1, 0, 'C');
                            $pdf->MultiCell(90, 9, $row['keterangan'], 1, 'L');
                            $pdf->Ln();
                        }
                    } else {
                        $pdf->Write(0, "No records found.");
                    }

                    // Save the generated PDF file
                    $pdf->Output('../../../../assets/files/laporan-kegiatan.pdf', 'F');
                    // Optionally, provide download link
                    header("location:../ui/header.php?page=kegiatan");
                } else {
                    // Handle error if query fails
                    echo "<p>Error retrieving data from the database.</p>";
                }
            }
            ?>
        </div>
    </div>
    <?php require_once("../ui/footer.php"); ?>
</body>

</html>