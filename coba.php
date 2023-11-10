<?php

// Inisialisasi matriks kapal
$matrix = [
    // bay 1
    [
        [0, 0, 3],
        [4, 1, 6],
        [7, 8, 9]
    ],
    // bay 2
    [
        [0, 0, 0],
        [0, 0, 0],
        [0, 0, 0]
    ]
];

$temp = [];
$inputReceived = false; // Menyimpan status apakah input dari pengguna sudah diterima

// Fungsi untuk memeriksa apakah kontainer dapat dibongkar
function checkAtas($matrix, $i, $j, $k)
{
    if ($i < 0 || $j < 0 || $k < 0 || count($matrix) <= $i || count($matrix[$i]) <= $j || count($matrix[$i][$j]) <= $k) {
        return false;
    } else {
        if ($matrix[$i][$j][$k] != 0) {
            if ($j - 1 == -1) {
                echo $matrix[$i][$j][$k] . " bisa di bongkar";
                return true;
            }

            if ($matrix[$i][$j - 1][$k] == 0) {
                echo $matrix[$i][$j - 1][$k] . " bisa di bongkar";
                return true;
            } else {
                return false;
            }
        }
    }
}

// Fungsi untuk memeriksa apakah lokasi kosong
function checkSpace($matrix, $i, $j, $k)
{
    if ($i < 0 || $j < 0 || $k < 0 || count($matrix) <= $i || count($matrix[$i]) <= $j || count($matrix[$i][$j]) <= $k) {
        return false;
    } else {
        return $matrix[$i][$j][$k] == 0;
    }
}

// Menangani input pengguna
if (isset($_POST['submitted'])) {
    $pilihan = $_POST['menu'];

    switch ($pilihan) {
        case 'bongkar':
            $bay = $_POST['bay_bongkar'];
            $baris = $_POST['baris_bongkar'];
            $kolom = $_POST['kolom_bongkar'];

            if (checkAtas($matrix, $bay, $baris, $kolom)) {
                $temp[] = $matrix[$bay][$baris][$kolom];
                $matrix[$bay][$baris][$kolom] = 0;
            } else {
                echo "Ada tumpukan / container yang dipilih tidak ada";
            }
            break;

        case 'susun':
            $bay = $_POST['bay_susun'];
            $baris = $_POST['baris_susun'];
            $kolom = $_POST['kolom_susun'];

            if (checkSpace($matrix, $bay, $baris, $kolom)) {
                $container = (int) $_POST['container'];
                if (in_array($container, $temp) && count($temp) != 0) {
                    $matrix[$bay][$baris][$kolom] = $container;
                    $key = array_search($container, $temp);
                    unset($temp[$key]);
                } else {
                    echo "Pilih container yang terdapat dalam temp";
                }
            }
            break;

        case 'keluar':
            exit(0); // Keluar dari program
            break;

        default:
            echo "Pilihan tidak valid";
            break;
    }

    // Setelah pengguna memberikan input, atur ulang variabel dan keluar dari loop
    $inputReceived = true;
}

// Tampilan HTML
echo "<html><head><style>table { border-collapse: collapse; } table, th, td { border: 1px solid black; padding: 5px; }</style></head><body>";

echo "<h2>STATE KAPAL</h2>";

// Menampilkan matriks kapal dalam bentuk tabel
for ($i = 0; $i < count($matrix); $i++) {
    echo "<h3>BAY " . ($i + 1) . "</h3>";
    echo "<table>";
    for ($j = 0; $j < count($matrix[$i]); $j++) {
        echo "<tr>";
        for ($k = 0; $k < count($matrix[$i][$j]); $k++) {
            echo "<td>" . $matrix[$i][$j][$k] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

echo "<h3>MENU SIMPLE GAME</h3>";
echo "<form method='post' action=''>";
echo "<input type='hidden' name='submitted' value='1'>";

echo "<label>Pilih Menu</label><br>";
echo "<select name='menu'>";
echo "<option value='bongkar'>Bongkar</option>";
echo "<option value='susun'>Susun</option>";
echo "<option value='keluar'>Keluar</option>";
echo "</select><br>";

echo "Input bay berapa: <input type='text' name='bay_bongkar'><br>";
echo "Input baris berapa: <input type='text' name='baris_bongkar'><br>";
echo "Input kolom berapa: <input type='text' name='kolom_bongkar'><br>";

// Tombol Submit
echo "<br>";
echo "<input type='submit' value='Submit'>";
echo "</form>";

if (count($temp) != 0) {
    echo "<h3>KONTAINER YANG DAPAT DISUSUN</h3>";
    foreach ($temp as $container) {
        echo $container . " ";
    }
    echo "<br>";
}

echo "</body></html>";
?>
