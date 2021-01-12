<!DOCTYPE html>
<html>
    <head>
        <title>ANALISI REGIONALE</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="/dexma/js/myscript.js?version=<?=time()?>"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {
       'packages': ['geochart'],
       // Note: you will need to get a mapsApiKey for your project.
       // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
       'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
        });
        google.charts.setOnLoadCallback(drawRegionsMap);
        </script>
    </head>
    <body style="background-color:#adad85;">
    <?php require ("funzioni.php");?>



        <div class="container-fluid text-center  border border-dark bg-dark">
        <h1 class="text-center border border-dark bg-dark " style="color: #adad85;">ANALISI REGIONALE</h1>
        <nav class="navbar navbar-expand-sm justify-content-center ">
            <ul class="navbar-nav">
                <li class="nav-item btn btn-secondary mr-2">
                <a class="nav-link" href="/dexma/php/rapporto.php"  style="color:#adad85;">ANALISI RAPPORTO</a>
                </li>
                <li class="nav-item btn btn-secondary mr-2">
                <a class="nav-link" href="/dexma/php/ultimi10_Giorni.php" style="color:#adad85; ">ANALISI  BOLLETTINI</a>
                </li>
                <li class="nav-item btn btn-secondary">
                <a class="nav-link" href="/dexma/index.html"  style="color:#adad85;">HOMEPAGE</a>
                </li>
            </ul>
        </nav>
        </div>
        <h2 class="mt-4 mb-4" align="center">ULTIMI CASI NELLE REGIONI ITALIANE AGGIORNATI AL <?php echo substr($csv_regionale[1]["data"],0,10);?></h2>
        <div class="container text-center">
            <div class="row">
                <div class="col-12">
                <?php javascript2($csv_regionale) ?>
                <p class="text-danger" align="center" >(passare il cursore o cliccare sulle regioni per info)</p>
                <p align="center" id="regione"></p>
                </div>
            </div>
        </div>

        <div class="container-fluid text-center">
        <div class="row">
                <div class="col-12">
                    <?php stampa_ultimi_10_gg_regionale($csv_regionale,$numero_elementi1); ?>
                </div>
            </div>
</div>
    </body>
</html>