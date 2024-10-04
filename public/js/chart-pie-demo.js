Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';


    var chartTotalsElement = document.getElementById('chartTotals');
if (chartTotalsElement) {

        var totalEntradasProyecciones = chartTotalsElement.getAttribute('data-total-entradas-proyecciones');
        var totalEntradasTransacciones = chartTotalsElement.getAttribute('data-total-entradas-transacciones');

        // Convertir los valores a números si es necesario
        totalEntradasProyecciones = parseFloat(totalEntradasProyecciones);
        totalEntradasTransacciones = parseFloat(totalEntradasTransacciones);

        // Crear la gráfica de pastel usando Chart.js
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Proyecciones", "Transacciones"],
                datasets: [{
                    data: [totalEntradasProyecciones, totalEntradasTransacciones],
                    backgroundColor: ['#4e73df', '#1cc88a'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
  
  
  
  
  
  
  
         var totalSalidasProyecciones = chartTotalsElement.getAttribute('data-total-salidas-proyecciones');
        var totalSalidasTransacciones = chartTotalsElement.getAttribute('data-total-salidas-transacciones');

        // Convertir los valores a números si es necesario
        totalSalidasProyecciones = parseFloat(totalSalidasProyecciones);
        totalSalidasTransacciones = parseFloat(totalSalidasTransacciones);

        // Crear la gráfica de pastel usando Chart.js
        var ctx = document.getElementById("myPieChartSalida");
        var myPieChartSalida = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Proyecciones", "Transacciones"],
                datasets: [{
                    data: [totalSalidasProyecciones, totalSalidasTransacciones],
                    backgroundColor: ['#d95d2e', '#dfd20a'],
                    hoverBackgroundColor: ['#d95d2e', '#dfd20a'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
  
  
  
  
  
  
  
  
    }