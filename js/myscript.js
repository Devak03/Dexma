      function drawStuff() 
    {
        var data = google.visualization.arrayToDataTable([

            ['DATA', 'CONTAGI',  { role: "style" }],
            [dataCovid10, nuoviCasi10,"white"],
            [dataCovid9, nuoviCasi9, "grey"],
            [dataCovid8, nuoviCasi8, "white"],
            [dataCovid7, nuoviCasi7, "grey"],
            [dataCovid6, nuoviCasi6, "white"],
            [dataCovid5, nuoviCasi5, "grey"],
            [dataCovid4, nuoviCasi4, "white"],
            [dataCovid3, nuoviCasi3, "grey"],
            [dataCovid2, nuoviCasi2, "white"],
            [dataCovid, nuoviCasi, "grey"]
          ]);
    
          var view = new google.visualization.DataView(data);
          view.setColumns([0, 1,
                          { calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation" },
                          2]);
    
          var options = {
            width: 900,
            height: 600,
            bar: {groupWidth: "30%"},
            legend: { position: "none" },
            chartArea:{top:60},
            backgroundColor: "#adad85",
          };
          var chart = new google.visualization.BarChart(document.getElementById("ciao"));
          chart.draw(view, options);
      }


      function drawChart1()
      {
        var data = new google.visualization.arrayToDataTable([
          ['', 'PERCENTUALE'],
          [dataCovid, rapporto_giorno10],
          [dataCovid2, rapporto_giorno9],
          [dataCovid3, rapporto_giorno8],
          [dataCovid4, rapporto_giorno7],
          [dataCovid5, rapporto_giorno6],
          [dataCovid6, rapporto_giorno5],
          [dataCovid7, rapporto_giorno4],
          [dataCovid8, rapporto_giorno3],
          [dataCovid9, rapporto_giorno2],
          [dataCovid10, rapporto_giorno1]
        ]);

        var options = {
          chartArea: {backgroundColor:"#adad85"},
          width: 900,
          height: 400,
          backgroundColor: "#adad85",
          colors:['grey'],
          legend: { position: 'none' },
          bar: { groupWidth: "90%" },
          
        };

        var chart = new google.charts.Bar(document.getElementById('grafico1'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

      function drawRegionsMap() {
          var data = google.visualization.arrayToDataTable([
            ['City',   'Positivi'],
            [regione, nuoviCasi_r],
            [regione1, nuoviCasi_r1],
            [regione2, nuoviCasi_r2],
            [regione3, nuoviCasi_r3],
            [regione4, nuoviCasi_r4],
            [regione5, nuoviCasi_r5],
            [regione6, nuoviCasi_r6],
            [regione7, nuoviCasi_r7],
            [regione8, nuoviCasi_r8],
            [regione9, nuoviCasi_r9],
            [regione10, nuoviCasi_r10],
            [regione11, nuoviCasi_r11],
            [regione12, nuoviCasi_r12],
            [regione13, nuoviCasi_r13],
            [regione14, nuoviCasi_r14],
            [regione15, nuoviCasi_r15],
            [regione16, nuoviCasi_r16],
            [regione17, nuoviCasi_r17],
            [regione18, nuoviCasi_r18],
            [regione19, nuoviCasi_r19],
            [regione20, nuoviCasi_r20]

           

          ]);
  
          var options = {
            backgroundColor: "#adad85",
            region: 'IT', 
            resolution:'provinces',
            colorAxis: {colors: ['yellow', 'orange', 'red']},
            datalessRegionColor: 'grey',
            defaultColor: '#f5f5f5',
          };
  
          var chart = new google.visualization.GeoChart(document.getElementById('regione'));
          chart.draw(data, options);
        };
    
      