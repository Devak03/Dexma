<?php

///// VARIABILI /////

    $andamento_nazionale = "https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-andamento-nazionale/dpc-covid19-ita-andamento-nazionale.csv";
    $andamento_regionale = "https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-regioni/dpc-covid19-ita-regioni-latest.csv";

///// FUNZIONI /////
    

    $csv = array_map('str_getcsv', file($andamento_nazionale));
    array_walk($csv, function(&$a) use ($csv) {
    $a = array_combine($csv[0], $a);
    });
    array_shift($csv);
    $numero_elementi = count($csv);
    

    $csv_regionale = array_map('str_getcsv', file($andamento_regionale));
    array_walk($csv_regionale, function(&$a1) use ($csv_regionale) {
        $a1 = array_combine($csv_regionale[0], $a1);
    });
    array_shift($csv_regionale);
    $numero_elementi1 = count($csv_regionale);


    function stampa_ultimi_10_gg_regionale($csv_regionale,$numero_elementi1)
    {
        $tab = '<table class="mt-5 table-striped text-center" border="1" align="center" style="background-color:grey; color: white; width:100%;" >
        <thead>
        <tr>
        <td>REGIONE</td>
        <td>CODICE REGIONE</td>
        <td>NUOVI POSITIVI</td>
        <td>TOTALE POSITIVI</td>
        <td>TOTALE TAMPONI</td>
        <td>DECEDUTI</td>
        <td>TERAPIA INTENSIVA</td>
        </tr>
        </thead>
        <tbody>
        ';
        for ($i=0;$i<$numero_elementi1;$i++)
        {
            $tab = $tab .' 
            <tr>
            <td>'.$csv_regionale[$i]["denominazione_regione"].'</td>
            <td>'.$csv_regionale[$i]["codice_regione"].'</td>
            <td>'.$csv_regionale[$i]["nuovi_positivi"].'</td>
            <td>'.$csv_regionale[$i]["totale_positivi"].'</td>
            <td>'.$csv_regionale[$i]["tamponi"].'</td>
            <td>'.$csv_regionale[$i]["deceduti"].'</td>
            <td>'.$csv_regionale[$i]["terapia_intensiva"].'</td>
            </tr>
            ';
        }

        $tab = $tab. '</tbody></table>';
        echo $tab;


    }

    function stampa_ultimi_10_gg($csv,$numero_elementi)
    {
        $arraytab = array();
        for ($i=($numero_elementi-10);$i<$numero_elementi;$i++)
            {
                $arraytab[$i] = '<h1>DATA = '.substr($csv[$i]["data"],0,10).'</h1>
                <table class="table-striped text-center" border="1" align="center" style="background-color:grey; color: white;">
                <tr><td>STATO</td><td>'.$csv[$i]["stato"].'</tr></td>
                <tr><td>RICOVERATI</td><td>'.$csv[$i]["ricoverati_con_sintomi"].'</td></tr>
                <tr><td>TERAPIA INTENSIVA</td><td>'.$csv[$i]["terapia_intensiva"].'</td></tr>
                <tr><td>OSPEDALIZZATI</td><td>'.$csv[$i]["totale_ospedalizzati"].'</td></tr>
                <tr><td>ISOLAMENTO DOMICILIARE</td><td>'.$csv[$i]["isolamento_domiciliare"].'</td></tr>
                <tr><td>TOTALE POSITIVI</td><td>'.$csv[$i]["totale_positivi"].'</td></tr>
                <tr><td>VARIAZIONE TOTALE POSITIVI</td><td>'.$csv[$i]["variazione_totale_positivi"].'</td></tr>
                <tr><td>NUOVI POSITIVI</td><td>'.$csv[$i]["nuovi_positivi"].'</td></tr>
                <tr><td>DIMESSI GUARITI</td><td>'.$csv[$i]["dimessi_guariti"].'</td></tr>
                <tr><td>DECEDUTI</td><td>'.$csv[$i]["deceduti"].'</td></tr>
                <tr><td>CASI SOSPETTO DIAGNOSTICO</td><td>'.$csv[$i]["casi_da_sospetto_diagnostico"].'</td></tr>
                <tr><td>CASI SCREENING</td><td>'.$csv[$i]["casi_da_screening"].'</td></tr>
                <tr><td>TOTALE CASI</td><td>'.$csv[$i]["totale_casi"].'</td></tr>
                <tr><td>TAMPONI</td><td>'.$csv[$i]["tamponi"].'</td></tr>
                <tr><td>CASI TESTATI</td><td>'.$csv[$i]["casi_testati"].'</td></tr>
                <tr><td>NOTE</td><td>'.$csv[$i]["note"].'</td></tr>
                <tr><td>INGRESSI TERAPIA INTENSIVA</td><td>'.$csv[$i]["ingressi_terapia_intensiva"].'</td></tr>
                <tr><td>NOTE TEST</td><td>'.$csv[$i]["note_test"].'</td></tr>
                <tr><td>NOTE CASI</td><td>'.$csv[$i]["note_casi"].'</td></tr>
                </table><br>';
            }
        return $arraytab;  
    }


    function tamponi_giornalieri($csv,$numero_elementi)
    {
    $tamponi_giorno= array();
    for($i=($numero_elementi-10);$i<$numero_elementi;$i++)
    {
        $tamponi_giorno[$i] = $csv[$i]["tamponi"]-$csv[$i-1]["tamponi"];
    }
    return $tamponi_giorno;
    }


    function tabella_rapporto($csv,$numero_elementi)
    {

        $tamponi_giorno= tamponi_giornalieri($csv,$numero_elementi);
        $rapporto_giorno = array();
        for($i=($numero_elementi-10);$i<$numero_elementi;$i++)
        {
            $rapporto_giorno[$i] = number_format((($csv[$i]["nuovi_positivi"]/$tamponi_giorno[$i])*100),1);
        }
        return $rapporto_giorno;
    }



    function javascript($csv)
    {
        echo "
        <script>
        var json = ". json_encode($csv).";
        var str = JSON.stringify(json);
        var obj = JSON.parse(str);
        var i;
        for(i=(obj.length-11);i<obj.length;i++)
        {

            var nuoviCasi =parseInt(obj[(obj.length-10)].nuovi_positivi);
            var dataCovid = obj[(obj.length-10)].data;
            dataCovid = dataCovid.slice(0,10);

            var nuoviCasi2 =parseInt(obj[(obj.length-9)].nuovi_positivi);
            var dataCovid2 = obj[(obj.length-9)].data;
            dataCovid2 = dataCovid2.slice(0,10);
            
            var nuoviCasi3 =parseInt(obj[(obj.length-8)].nuovi_positivi);
            var dataCovid3 = obj[(obj.length-8)].data;
            dataCovid3 = dataCovid3.slice(0,10);
            
            var nuoviCasi4 =parseInt(obj[(obj.length-7)].nuovi_positivi);
            var dataCovid4 = obj[(obj.length-7)].data;
            dataCovid4 = dataCovid4.slice(0,10);
            
            var nuoviCasi5 =parseInt(obj[(obj.length-6)].nuovi_positivi);
            var dataCovid5 = obj[(obj.length-6)].data;
            dataCovid5 = dataCovid5.slice(0,10);
            
            var nuoviCasi6 =parseInt(obj[(obj.length-5)].nuovi_positivi);
            var dataCovid6 = obj[(obj.length-5)].data;
            dataCovid6 = dataCovid6.slice(0,10);
        
            var nuoviCasi7 =parseInt(obj[(obj.length-4)].nuovi_positivi);
            var dataCovid7 = obj[(obj.length-4)].data;
            dataCovid7 = dataCovid7.slice(0,10);

            var nuoviCasi8 =parseInt(obj[(obj.length-3)].nuovi_positivi);
            var dataCovid8 = obj[(obj.length-3)].data;
            dataCovid8 = dataCovid8.slice(0,10);

            var nuoviCasi9 =parseInt(obj[(obj.length-2)].nuovi_positivi);
            var dataCovid9 = obj[(obj.length-2)].data;
            dataCovid9 = dataCovid9.slice(0,10);

            var nuoviCasi10 =parseInt(obj[(obj.length-1)].nuovi_positivi);
            var dataCovid10 = obj[(obj.length-1)].data;
            dataCovid10 = dataCovid10.slice(0,10);

            
            var totalePositivi = parseInt(obj[(obj.length-1)].totale_positivi);
            var tamponi = parseInt(obj[(obj.length-1)].tamponi);
            
            var tamponi_giorno10 = (parseInt(obj[(obj.length-1)].tamponi))-(parseInt(obj[(obj.length-2)].tamponi));
            var tamponi_giorno9 = (parseInt(obj[(obj.length-2)].tamponi))-(parseInt(obj[(obj.length-3)].tamponi));
            var tamponi_giorno8 = (parseInt(obj[(obj.length-3)].tamponi))-(parseInt(obj[(obj.length-4)].tamponi));
            var tamponi_giorno7 = (parseInt(obj[(obj.length-4)].tamponi))-(parseInt(obj[(obj.length-5)].tamponi));
            var tamponi_giorno6 = (parseInt(obj[(obj.length-5)].tamponi))-(parseInt(obj[(obj.length-6)].tamponi));
            var tamponi_giorno5 = (parseInt(obj[(obj.length-6)].tamponi))-(parseInt(obj[(obj.length-7)].tamponi));
            var tamponi_giorno4 = (parseInt(obj[(obj.length-7)].tamponi))-(parseInt(obj[(obj.length-8)].tamponi));
            var tamponi_giorno3 = (parseInt(obj[(obj.length-8)].tamponi))-(parseInt(obj[(obj.length-9)].tamponi));
            var tamponi_giorno2 = (parseInt(obj[(obj.length-9)].tamponi))-(parseInt(obj[(obj.length-10)].tamponi));
            var tamponi_giorno1 = (parseInt(obj[(obj.length-10)].tamponi))-(parseInt(obj[(obj.length-11)].tamponi));
        
            var rapporto_giorno10 = (nuoviCasi10/tamponi_giorno10)*100;
            var rapporto_giorno9 = (nuoviCasi9/tamponi_giorno9)*100;
            var rapporto_giorno8 = (nuoviCasi8/tamponi_giorno8)*100;
            var rapporto_giorno7 = (nuoviCasi7/tamponi_giorno7)*100;
            var rapporto_giorno6 = (nuoviCasi6/tamponi_giorno6)*100;
            var rapporto_giorno5 = (nuoviCasi5/tamponi_giorno5)*100;
            var rapporto_giorno4 = (nuoviCasi4/tamponi_giorno4)*100;
            var rapporto_giorno3 = (nuoviCasi3/tamponi_giorno3)*100;
            var rapporto_giorno2 = (nuoviCasi2/tamponi_giorno2)*100;
            var rapporto_giorno1 = (nuoviCasi/tamponi_giorno1)*100;
        }

    </script>";    
    }

    function javascript2($csv_regionale)
    {
        echo "
        <script>
        var json = ". json_encode($csv_regionale).";
        var str = JSON.stringify(json);
        var obj = JSON.parse(str);
        var i;
        for(i=0;i<obj.length;i++)
        {
            var nuoviCasi_r =parseInt(obj[0].nuovi_positivi);
            var nuoviCasi_r1 =parseInt(obj[1].nuovi_positivi);
            var nuoviCasi_r2 =parseInt(obj[2].nuovi_positivi);
            var nuoviCasi_r3 =parseInt(obj[3].nuovi_positivi);
            var nuoviCasi_r4 =parseInt(obj[4].nuovi_positivi);
            var nuoviCasi_r5 =parseInt(obj[5].nuovi_positivi);
            var nuoviCasi_r6 =parseInt(obj[6].nuovi_positivi);
            var nuoviCasi_r7 =parseInt(obj[7].nuovi_positivi);
            var nuoviCasi_r8 =parseInt(obj[8].nuovi_positivi);
            var nuoviCasi_r9 =parseInt(obj[9].nuovi_positivi);
            var nuoviCasi_r10 =parseInt(obj[10].nuovi_positivi);
            var nuoviCasi_r11 =parseInt(obj[11].nuovi_positivi);
            var nuoviCasi_r12 =parseInt(obj[12].nuovi_positivi);
            var nuoviCasi_r13 =parseInt(obj[13].nuovi_positivi);
            var nuoviCasi_r14 =parseInt(obj[14].nuovi_positivi);
            var nuoviCasi_r15 =parseInt(obj[15].nuovi_positivi);
            var nuoviCasi_r16 =parseInt(obj[16].nuovi_positivi);
            var nuoviCasi_r17 =parseInt(obj[17].nuovi_positivi);
            var nuoviCasi_r18 =parseInt(obj[18].nuovi_positivi);
            var nuoviCasi_r19 =parseInt(obj[19].nuovi_positivi);
            var nuoviCasi_r20 =parseInt(obj[20].nuovi_positivi);

            regione = obj[0].denominazione_regione;
            regione1 = obj[1].denominazione_regione;
            regione2 = obj[2].denominazione_regione;
            regione3 = obj[3].denominazione_regione;
            regione4 = obj[4].denominazione_regione;
            regione5 = obj[5].denominazione_regione;
            regione6 = obj[6].denominazione_regione;
            regione7 = obj[7].denominazione_regione;
            regione8 = obj[8].denominazione_regione;
            regione9 = obj[9].denominazione_regione;
            regione10 = obj[10].denominazione_regione;
            regione11 = obj[11].denominazione_regione;
            regione12 = obj[12].denominazione_regione;
            regione13 = obj[13].denominazione_regione;
            regione14 = obj[14].denominazione_regione;
            regione15 = obj[15].denominazione_regione;
            regione16 = obj[16].denominazione_regione;
            regione17 = obj[17].denominazione_regione;
            regione18 = obj[18].denominazione_regione;
            regione19 = obj[19].denominazione_regione;
            regione20 = obj[20].denominazione_regione;
        }

    </script>";    
    }
?>