<!DOCTYPE html>
<html>
    <head>
        <title>ULTIMI 10 GIORNI</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="../js/myscript.js?version=<?=time()?>"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawStuff);
        </script>
    </head>
    <body style="background-color:#adad85;">
    <?php require ("funzioni.php"); $array = stampa_ultimi_10_gg($csv,$numero_elementi);?>

        <div class="container-fluid text-center  border border-dark bg-dark">
        <h1 class="text-center border border-dark bg-dark " style="color: #adad85;">BOLLETTINI DEGLI ULTIMI 10 GIORNI</h1>
        <nav class="navbar navbar-expand-sm justify-content-center ">
            <ul class="navbar-nav">
            <li class="nav-item btn btn-secondary mr-2">
                <a class="nav-link" href="../php/rapporto.php"  style="color:#adad85;">ANALISI RAPPORTO</a>
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

        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-12">
                    <?php javascript($csv) ?>
                    <h3 class="text-center ">ULTIMI CONTAGI IN ITALIA </h3>
                    <p align="center" id="ciao"></p>
                </div>
            </div>
        </div>

        <div class="container-fluid text-center mt-4">

            <div class="row">
                <div class="col-6">
                    <?php echo $array[$numero_elementi-1]; ?>
                </div>
                <div class="col-6">
                    <?php echo $array[$numero_elementi-2]; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <?php echo $array[$numero_elementi-3]; ?>
                </div>
                <div class="col-6">
                    <?php echo $array[$numero_elementi-4]; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <?php echo $array[$numero_elementi-5]; ?>
                </div>
                <div class="col-6">
                    <?php echo $array[$numero_elementi-6]; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <?php echo $array[$numero_elementi-7]; ?>
                </div>
                <div class="col-6">
                    <?php echo $array[$numero_elementi-8]; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <?php echo $array[$numero_elementi-9]; ?>
                </div>
                <div class="col-6">
                    <?php echo $array[$numero_elementi-10]; ?>
                </div>
            </div>
 
    </body>
</html>