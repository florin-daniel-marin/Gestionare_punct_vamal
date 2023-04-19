<?php
require_once('tabel_create.php');

//------------------------------------------------
function findJudetLocalitate($tara){
$index = 0;
$ok = 0;
$linie_index_begin = 0;
$linie_index_end = 0;

if($tara == 'EUE/ROU'){
    //in Romania
    $linii = file("date_pentru_tabel\Judet_Localitate.txt");
    $buffer =  $linii[mt_rand(0, 314)];
}else{
    //in strainatate
    $linii = file("date_pentru_tabel\Strain_Judet_Localitate.txt");

    foreach ($linii as $linie) {
        if (strcmp(trim($linie), $tara) == 0) {
            $linie_index_begin = $index;
            $ok = 1;
        }
        if ($ok == 1 && strcmp(trim($linie), ".") == 0) {
            $linie_index_end = $index-1;
            break;
        }
        $index++;
    }

    $buffer =  $linii[mt_rand($linie_index_begin+1, $linie_index_end)];
}

$judet= strtok($buffer, ',');
$localitate = strtok('');
return array($judet, $localitate);
}

function findNumePrenumeSex($nat){
$index = 0;
$ok = 0;
$linie_index_begin = 0;
$linie_index_end = 0;

    if($nat == 'ROMÂNĂ' || $nat == 'REPUBLICA MOLDOVA'){
        //in Romania
        $linii = file("date_pentru_tabel\Nume.txt");
        $nume =  $linii[mt_rand(0, 230)];

        $linii = file("date_pentru_tabel\Prenume.txt");
        $prenume =  $linii[mt_rand(0, 230)];

        if (strcmp(substr(trim($prenume), -1), 'a') == 0) {
            $sex = 'F';
        } else {
            $sex = 'M';
        }
    } else {
        //in strainatate
        $linii = file("date_pentru_tabel\Strain_Nume.txt");

        foreach ($linii as $linie) {
            if (strcmp(trim($linie), $nat) == 0) {
                $linie_index_begin = $index;
                $ok = 1;
            }
            if ($ok == 1 && strcmp(trim($linie), ".") == 0) {
                $linie_index_end = $index-1;
                break;
            }
            $index++;
        }

        $nume =  $linii[rand($linie_index_begin+1, $linie_index_end)];
        $linii = file("date_pentru_tabel\Strain_Prenume_Sex.txt");
        $index = 0;
        $ok = 0;
        $linie_index_begin = 0;
        $linie_index_end = 0;

        foreach ($linii as $linie) {
            if (strcmp(trim($linie), $nat) == 0) {
                $linie_index_begin = $index;
                $ok = 1;
            }
            if ($ok == 1 && strcmp(trim($linie), ".") == 0) {
                $linie_index_end = $index-1;
                break;
            }
            $index++;
        }

        $buffer =  $linii[rand($linie_index_begin+1, $linie_index_end)];
        $prenume= strtok($buffer, ',');
        $sex = strtok('');
        $sex = trim($sex);
    }
    
    return array($nume, $prenume, $sex);  
}
//--------------------------------------------------------------------------
for ($i = 0; $i <= 1000; $i++) {
    //-------------------aici incepe randomizarea---------------------------------
//probabilitati pentru mt_randomizare:
    $prob_nat = mt_rand(1, 1000); // nationalitate
    $prob_locnastere = mt_rand(1, 100); //domiciliu = acelasi loc de nastere
    $same_locnastere = 'false';
    $prob_tara = mt_rand(1, 100); //nationalitate = acelasi domiciliu
    $same_tara = 'false';
    $ok = 'true';
    $prob_probleme_cazier = mt_rand(1, 100);

    $array_tara = array(
        'EUE/ROU',
        'MDA',
        'UKR',
        'EUE/GRC',
        'EUE/BGR',
        'RUS',
        'EUE/ITA',
        'EUE/ESP',
        'GBR',
        'EUE/HUN',
        'USA',
        'ISR',
        'EUE/POL',
        'EUE/DEU',
        'EUE/NOR',
        'JPN',
        'CHN',
        'EUE/FRA',
        'TUR'
    );


    if ($prob_locnastere <= 90) {
        $same_locnastere = 'true';
    } //alt jud/loc
    if ($prob_tara <= 80) {
        $same_tara = 'true';
    } //alta tara
    if ($same_tara === 'false') {
        $tara = $array_tara[mt_rand(0, 18)];
        $ok = 'false';
    }

    //se alege nationalitatea si tara domiciliului curent:
    if ($prob_nat <= 400) {
        $nat = 'ROMÂNĂ';
        if ($ok == 'true') {
            $tara = 'EUE/ROU';
        }
    } elseif ($prob_nat <= 700) {
        $nat = 'REPUBLICA MOLDOVA';
        if ($ok == 'true') {
            $tara = 'MDA';
        }
    } elseif ($prob_nat <= 800) {
        $nat = 'UKRAINE';
        if ($ok == 'true') {
            $tara = 'UKR';
        }
    } elseif ($prob_nat <= 840) {
        $nat = 'HELLENIC';
        if ($ok == 'true') {
            $tara = 'EUE/GRC';
        }
    } elseif ($prob_nat <= 870) {
        $nat = 'BULGARIA';
        if ($ok == 'true') {
            $tara = 'EUE/BGR';
        }
    } elseif ($prob_nat <= 900) {
        $nat = 'RUSSIAN FEDERATION';
        if ($ok == 'true') {
            $tara = 'RUS';
        }
    } elseif ($prob_nat <= 920) {
        $nat = 'ITALIANA';
        if ($ok == 'true') {
            $tara = 'EUE/ITA';
        }
    } elseif ($prob_nat <= 940) {
        $nat = 'ESPAÑOLA';
        if ($ok == 'true') {
            $tara = 'EUE/ESP';
        }
    } elseif ($prob_nat <= 950) {
        $nat = 'BRITISH CITIZEN';
        if ($ok == 'true') {
            $tara = 'GBR';
        }
    } elseif ($prob_nat <= 960) {
        $nat = 'HUNGARIAN';
        if ($ok == 'true') {
            $tara = 'EUE/HUN';
        }
    } elseif ($prob_nat <= 970) {
        $nat = 'USA';
        if ($ok == 'true') {
            $tara = 'USA';
        }
    } elseif ($prob_nat <= 980) {
        $nat = 'ISRAELI';
        if ($ok == 'true') {
            $tara = 'ISR';
        }
    } elseif ($prob_nat <= 985) {
        $nat = 'POLISH';
        if ($ok == 'true') {
            $tara = 'EUE/POL';
        }
    } elseif ($prob_nat <= 990) {
        $nat = 'DEUTSCH';
        if ($ok == 'true') {
            $tara = 'EUE/DEU';
        }
    } elseif ($prob_nat <= 992) {
        $nat = 'NORWEGIAN';
        if ($ok == 'true') {
            $tara = 'EUE/NOR';
        }
    } elseif ($prob_nat <= 994) {
        $nat = 'JAPAN';
        if ($ok == 'true') {
            $tara = 'JPN';
        }
    } elseif ($prob_nat <= 996) {
        $nat = 'CHINESE';
        if ($ok == 'true') {
            $tara = 'CHN';
        }
    } elseif ($prob_nat <= 998) {
        $nat = 'FRANÇAISE';
        if ($ok == 'true') {
            $tara = 'EUE/FRA';
        }
    } elseif ($prob_nat <= 1000) {
        $nat = 'TUR';
        if ($ok == 'true') {
            $tara = 'TUR';
        }
    }


    //se alege judetul(regiunea)/localitatea(city) domiciliului curent:
    list($judet, $localitate) = findJudetLocalitate($tara);

    //locul nasterii
    if ($same_locnastere == 'true') {
        $ln_tara = $tara;
        $ln_judet = $judet;
        $ln_localitate = $localitate;
    } else {
        $ln_tara = $array_tara[mt_rand(0, 18)];
        list($ln_judet, $ln_localitate) = findJudetLocalitate($ln_tara);
    }

    //nume si prenume si sex
    list($nume, $prenume, $sex) = findNumePrenumeSex($nat);

    //data nasterii
    $timestamp = rand(strtotime("01 Jan 1940"), strtotime("01 Jan 2010"));
    $nastere = date("Y-m-d", $timestamp);
    $a = date('dmy', $timestamp);

    //cnp
    if ($nat == 'ROMÂNĂ') {
        if ($sex == 'M') {
            $b = 1;
        } else {
            $b = 2;
        }
        $CNP = $b . $a . mt_rand(100000, 999999);
    } else {
        $CNP = 'NULL';
    }

    //antecedente ilegalitati si restrictii intrare/iesire si cautat de interpol
    $antecedente = 'nu';
    $restrictii = 'nu';
    $interpol = 'nu';

    if ($prob_probleme_cazier == 0) {
        $antecedente = 'da';
    } elseif ($prob_probleme_cazier == 1) {
        $restrictii = 'da';
    } elseif ($prob_probleme_cazier == 2) {
        $interpol = 'da';
    }

    //

    $cerere_SQL = "INSERT INTO Tranzistanti (Nume, Prenume, Sex, 
    DataNasterii, CNP, Nationalitate, [Tara/Country], [Judet/Region], 
    [Localitate/City], [Locul Nasteri_Tara], [Locul Nasteri_Judet],
    [Locul Nasteri_Localitate], Antecedente, [Restrictii intrare/iesire],
    [Wanted by INTERPOL]) VALUES ('$nume', '$prenume', 
    '$sex', '$nastere', $CNP, '$nat', '$tara', '$judet', 
    '$localitate', '$ln_tara', '$ln_judet', '$ln_localitate',
    '$antecedente', '$restrictii', '$interpol')";

    $rezultat = sqlsrv_query($conn, $cerere_SQL);
    if ($rezultat === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo 'Am adaugat valorile in baza de date';
    }
}
?>