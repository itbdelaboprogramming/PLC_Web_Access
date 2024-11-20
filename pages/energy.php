<div class="h-full flex-1 bg-blue-950 pl-[3.5rem]">
    <div id="header" class="text-center bg-slate-950 py-4">
        <h1 class="mx-auto text-nowrap font-bold text-xl text-white">
            Energy Chart page
        </h1>
    </div>
    <div id="content" class="bg-blue-950 flex flex-row h-full w-full p-6 justify-between">
        <!-- Wrapper div with fixed height and overflow for scroll -->
        <div class="chart-container" style="position: relative; height: 400px; width: 100%; overflow-x: auto;">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let labelVolt = [];
    let voltData = [];

    function fetch_data() {
        fetch('backend/chart/data_query')
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.log("Data error");
                } else {
                    labelVolt = Object.keys(data.voltMeter);
                    voltData = Object.values(data.voltMeter);

                    // Initialize the chart after data is fetched
                    initializeChart();
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    function initializeChart() {
        const canvas = document.getElementById('myChart');
        const data = {
            labels: labelVolt,
            datasets: [{
                label: 'Test',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: voltData,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false, // Ensures the chart resizes properly within the container
                scales: {
                    x: {
                        display: true,
                    },
                    y: {
                        display: true,
                    }
                }
            }
        };

        const myChart = new Chart(canvas, config);

        // Function to update the chart 
        function addData(chart, label, data) {
            chart.data.labels.push(label);
            chart.data.datasets.forEach((dataset) => {
                dataset.data.push(data);
            });
            chart.update();
        }

        function removeData(chart) {
            chart.data.labels.pop();
            chart.data.datasets.forEach((dataset) => {
                dataset.data.pop();
            });
            chart.update();
        }
    }

    // Fetch data and initialize chart
    fetch_data();
</script>
