<!DOCTYPE html>
<html>
    <head>
        <title>RAPPORTO</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="../js/myscript.js?version=<?=time()?>"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart1);
        </script>
    </head>

    <body style="background-color:#adad85;">
     
    <div class="container-fluid text-center  border border-dark bg-dark">
        <h1 style="color: #adad85;">RAPPORTO</h1>
        <nav class="navbar navbar-expand-sm justify-content-center ">
            <ul class="navbar-nav">
                <li class="nav-item btn btn-secondary mr-2">
                <a class="nav-link" href="../php/ultimi10_Giorni.php" style="color:#adad85; ">ANALISI  BOLLETTINI</a>
                </li>
                <li class="nav-item btn btn-secondary mr-2">
                <a class="nav-link" href="../php/regioni.php" style="color:#adad85; ">ANALISI  REGIONALE</a>
                </li>
                <li class="nav-item btn btn-secondary">
                <a class="nav-link" href="../index.html"  style="color:#adad85;">HOMEPAGE</a>
                </li>
            </ul>
        </nav>
    </div>

    <h2 class="text-center mb-2 mt-2">RAPPORTO NUOVI POSITIVI/TAMPONI GIORNALIERI DEGLI ULTIMI 10 GIORNI</h2>
        <div class="container-fluid mt-5">
            <div class="row" >
                    <div class="col-12">
                        <?php require ("funzioni.php"); javascript($csv)?>
                        <p align="center" id="grafico1"></p>
                    </div>
            </div>
        </div>

            <?php $array = tabella_rapporto($csv,$numero_elementi);?>
            <?php $array2 = tamponi_giornalieri($csv,$numero_elementi);?>

        <div class="container-fluid mt-5">
            <div class="row">
                    <div class="col-12">
                        <table class=" table-striped text-center" border="1" align="center" style="background-color:grey; color: white; width:100%;">
                        <thead>    
                        <tr>
                                <td>DATA</td>
                                <td>POSITIVI</td>
                                <td>TAMPONI EFFETTUATI</td>
                                <td>RAPPORTO</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo substr($csv[$numero_elementi-1]["data"],0,10);?></td>
                                <td><?php echo $csv[$numero_elementi-1]["nuovi_positivi"];?></td>
                                <td><?php echo $array2[$numero_elementi-1];?></td>
                                <td><?php echo $array[$numero_elementi-1]."%";?></td>
                            </tr>
                            <tr>
                                <td><?php echo substr($csv[$numero_elementi-2]["data"],0,10);?></td>
                                <td><?php echo $csv[$numero_elementi-2]["nuovi_positivi"];?></td>
                                <td><?php echo $array2[$numero_elementi-2];?></td>
                                <td><?php echo $array[$numero_elementi-2]."%";?></td>
                            </tr>   
                            <tr>
                                <td><?php echo substr($csv[$numero_elementi-3]["data"],0,10);?></td>
                                <td><?php echo $csv[$numero_elementi-3]["nuovi_positivi"];?></td>
                                <td><?php echo $array2[$numero_elementi-3];?></td>
                                <td><?php echo $array[$numero_elementi-3]."%";?></td>
                            </tr>  
                            <tr>
                                <td><?php echo substr($csv[$numero_elementi-4]["data"],0,10);?></td>
                                <td><?php echo $csv[$numero_elementi-4]["nuovi_positivi"];?></td>
                                <td><?php echo $array2[$numero_elementi-4];?></td>
                                <td><?php echo $array[$numero_elementi-4]."%";?></td>
                            </tr>  
                            <tr>
                                <td><?php echo substr($csv[$numero_elementi-5]["data"],0,10);?></td>
                                <td><?php echo $csv[$numero_elementi-5]["nuovi_positivi"];?></td>
                                <td><?php echo $array2[$numero_elementi-5];?></td>
                                <td><?php echo $array[$numero_elementi-5]."%";?></td>
                            </tr>  
                            <tr>
                                <td><?php echo substr($csv[$numero_elementi-6]["data"],0,10);?></td>
                                <td><?php echo $csv[$numero_elementi-6]["nuovi_positivi"];?></td>
                                <td><?php echo $array2[$numero_elementi-6];?></td>
                                <td><?php echo $array[$numero_elementi-6]."%";?></td>
                            </tr>  
                            <tr>
                                <td><?php echo substr($csv[$numero_elementi-7]["data"],0,10);?></td>
                                <td><?php echo $csv[$numero_elementi-7]["nuovi_positivi"];?></td>
                                <td><?php echo $array2[$numero_elementi-7];?></td>
                                <td><?php echo $array[$numero_elementi-7]."%";?></td>
                            </tr>  
                            <tr>
                                <td><?php echo substr($csv[$numero_elementi-8]["data"],0,10);?></td>
                                <td><?php echo $csv[$numero_elementi-8]["nuovi_positivi"];?></td>
                                <td><?php echo $array2[$numero_elementi-8];?></td>
                                <td><?php echo $array[$numero_elementi-8]."%";?></td>
                            </tr>  
                            <tr>
                                <td><?php echo substr($csv[$numero_elementi-9]["data"],0,10);?></td>
                                <td><?php echo $csv[$numero_elementi-9]["nuovi_positivi"];?></td>
                                <td><?php echo $array2[$numero_elementi-9];?></td>
                                <td><?php echo $array[$numero_elementi-9]."%";?></td>
                            </tr>  
                            <tr>
                                <td><?php echo substr($csv[$numero_elementi-10]["data"],0,10);?></td>
                                <td><?php echo $csv[$numero_elementi-10]["nuovi_positivi"];?></td>
                                <td><?php echo $array2[$numero_elementi-10];?></td>
                                <td><?php echo $array[$numero_elementi-10]."%";?></td>
                            </tr> 
                    </tbody>
                        </table>
                    </div>  
                </div>
        </div>
            
    </body>
</html>