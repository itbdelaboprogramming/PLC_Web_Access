<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="h-full flex-1 bg-blue-950 pl-[3.5rem]">
    <div id="header" class="text-center bg-slate-950 py-4">
        <h1 class="mx-auto text-nowrap font-bold text-xl text-white">
            Energy Chart page
        </h1>
    </div>
    <div id="content" class="bg-blue-950 flex flex-row h-full w-full p-6 justify-between">
        <!-- Wrapper div with fixed height and overflow for scroll -->
        <div class="chart-container mx-auto" style="flex flex-col p-1 border-2 text-white">
            <div id="lamp" class="flex flex-col p-1 border-2 text-white">
                <h2 id="energy-title" class="text-nowrap mx-auto my-1 text-center font-semibold ">Group by:</h2>
                <div id="lamp-control" class="mx-auto w-full flex flex-row justify-around my-auto">
                    <button
                        class="bg-slate-900 border border-gray-400 text-white px-4 py-1 hover:bg-slate-700 active:bg-slate-800 rounded"
                        onclick="change_time('hour')">
                        Hour
                    </button>
                    <button
                        class="bg-slate-900 border border-gray-400 text-white px-4 py-2 hover:bg-slate-700 active:bg-slate-800 rounded"
                        onclick="change_time('day')">
                        Day
                    </button>
                    <button
                        class="bg-slate-900 border border-gray-400 text-white px-4 py-2 hover:bg-slate-700 active:bg-slate-800 rounded"
                        onclick="change_time('month')">
                        Month
                    </button>
                </div>
            </div>
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>



<script>
    var time = "month"
    function change_time(new_time) {
        time = new_time
        fetch_data(time);
    }

    function fetch_data(time) {
        console.log('Sending time:', time); // Debugging line
        const data = {
            'time': time
        };
        console.log('JSON to send:', JSON.stringify(data)); // Check the actual JSON string
        fetch('backend/chart/data_query', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.log("Data error");
                } else {
                    const label = [];
                    const seenValues = new Set();

                    data.time.forEach(item => {
                        if (!seenValues.has(item.value)) {
                            seenValues.add(item.value);
                            label.push(item);
                        }
                    });
                    chartdata.labels = label;
                    chartdata.datasets[0].data = data.currentMeter;
                    chartdata.datasets[1].data = data.voltMeter;
                    chartdata.datasets[2].data = data.powerMeter;
                    myChart.update();
                    console.log("Data received:", data);
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    const canvas = document.getElementById('myChart');
    var chartdata = {
        labels: [],
        datasets: [{
            label: 'Volt',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [],
        }, {
            label: 'Current',
            backgroundColor: 'rgb(54, 162, 235)',
            borderColor: 'rgb(54, 162, 235)',
            data: [],
        }, {
            label: 'Power',
            backgroundColor: 'rgb(75, 192, 192)',
            borderColor: 'rgb(75, 192, 192)',
            data: [],
        }]
    };

    const config = {
        type: 'line',
        data: chartdata,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const myChart = new Chart(canvas, config);
    // Fetch data and initialize chart
    fetch_data(time);
    setInterval(() => {
        fetch_data(time);
    }, 1000);
</script>