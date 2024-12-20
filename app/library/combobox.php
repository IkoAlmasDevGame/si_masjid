<?php
function combotgl($awal, $akhir, $var, $terpilih)
{
    echo "<select name=$var style='background: #000;'>";
    for ($i = $awal; $i <= $akhir; $i++) {
        $lebar = strlen($i);
        switch ($lebar) {
            case 1: {
                    $g = "0" . $i;
                    break;
                }
            case 2: {
                    $g = $i;
                    break;
                }
        }
        if ($i == $terpilih)
            echo "<option value=$g selected>$g</option>";
        else
            echo "<option value=$g>$g</option>";
    }
    echo "</select> ";
}

function combobln($awal, $akhir, $var, $terpilih)
{
    echo "<select name=$var style='background: #000;'>";
    for ($bln = $awal; $bln <= $akhir; $bln++) {
        $lebar = strlen($bln);
        switch ($lebar) {
            case 1: {
                    $b = "0" . $bln;
                    break;
                }
            case 2: {
                    $b = $bln;
                    break;
                }
        }
        if ($bln == $terpilih)
            echo "<option value=$b selected>$b</option>";
        else
            echo "<option value=$b>$b</option>";
    }
    echo "</select> ";
}

function combothn($awal, $akhir, $var, $terpilih)
{
    echo "<select name=$var style='background: #000;'>";
    for ($i = $awal; $i <= $akhir; $i++) {
        if ($i == $terpilih)
            echo "<option value=$i selected>$i</option>";
        else
            echo "<option value=$i>$i</option>";
    }
    echo "</select> ";
}

function combotgl2($awal, $akhir, $var, $terpilih)
{
    $cektg = 0;
    echo "<select name=$var style='background: #000;'>";
    for ($i = $awal; $i <= $akhir; $i++) {
        $lebar = strlen($i);
        switch ($lebar) {
            case 1: {
                    $g = "0" . $i;
                    break;
                }
            case 2: {
                    $g = $i;
                    break;
                }
        }
        if ($i == $terpilih) {
            $cektg = 1;
            echo "<option value=$g selected>$g</option>";
        } else {
            echo "<option value=$g>$g</option>";
        }
    }

    if ($cektg == 0) {
        echo "<option value='00' selected>-</option> </select> ";
    } else {
        echo "</select> ";
    }
}


function combobln2($awal, $akhir, $var, $terpilih)
{
    echo "<select name=$var style='background: #000;'>";
    $cekb = 0;
    for ($bln = $awal; $bln <= $akhir; $bln++) {
        $lebar = strlen($bln);
        switch ($lebar) {
            case 1: {
                    $b = "0" . $bln;
                    break;
                }
            case 2: {
                    $b = $bln;
                    break;
                }
        }
        if ($bln == $terpilih) {
            $cekb = 1;
            echo "<option value=$b selected>$b</option>";
        } else {
            echo "<option value=$b>$b</option>";
        }
    }

    if ($cekb == 0) {
        echo "<option value='00' selected>-</option></select> ";
    } else {
        echo "</select> ";
    }
}


function combothn2($awal, $akhir, $var, $terpilih)
{
    $cekt = 0;
    echo "<select name=$var style='background: #000;'>";
    for ($i = $awal; $i <= $akhir; $i++) {
        if ($i == $terpilih) {
            $cekt = 1;
            echo "<option value=$i selected>$i</option>";
        } else {
            echo "<option value=$i>$i</option>";
        }
    }
    if ($cekt == 0) {
        echo "<option value='0000' selected>-</option> </select> ";
    } else {
        echo "</select> ";
    }
}
