<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Charts Tables') }}
            </h2>
            <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Star on Github</span>
            </x-button>
        </div>
    </x-slot>

    <div class="container mx-auto flex gap-6 mb-6">
        <!-- Major Chart -->
        <div class="transform transition duration-700 hover:scale-110 p-6 overflow-hidden text-center hover: bg-white rounded-md shadow-md dark:bg-dark-eval-1"
            style="width: 45%">
            <h4 class="text-[12px]">Overview</h4>
            <span class="font-bold hover:text-blue-700 cursor-pointer">Major Students</span>
            <canvas class="mt-2" id="majorChart"></canvas>
        </div>

        <!-- Gender Chart -->
        <div class="transform transition duration-700 hover:scale-110 p-6 overflow-hidden text-center hover: bg-white rounded-md shadow-md dark:bg-dark-eval-1"
            style="width: 25%">
            <h4 class="text-[12px]">Overview</h4>
            <span class="font-bold hover:text-blue-500 cursor-pointer">Gender Students</span>
            <canvas class="mt-2" id="genderChart"></canvas>
        </div>

        <!-- State Chart -->

        <div class="transform transition duration-700 hover:scale-110 p-6 overflow-hidden text-center hover: bg-white rounded-md shadow-md dark:bg-dark-eval-1"
            style="width: 45%">
            <h4 class="text-[12px]">Overview</h4>
            <span class="font-bold hover:text-blue-700 cursor-pointer">State Students</span> <canvas
                id="stateChart"></canvas>
        </div>



        <script>
            var genderData = @json($genderData);
            var majorData = @json($majorData);
            var stateData = @json($stateData);


            // Gender Chart
            var genderCtx = document.getElementById('genderChart').getContext('2d');
            var genderChart = new Chart(genderCtx, {
                type: 'pie',
                data: {
                    labels: genderData.map(data => data.gender),
                    datasets: [{
                        data: genderData.map(data => data.total),
                        backgroundColor: ['#ff6384', '#36a2eb']
                    }]
                }
            });

            // Major Chart
            var majorCtx = document.getElementById('majorChart').getContext('2d');
            var majorChart = new Chart(majorCtx, {
                type: 'line',
                data: {
                    labels: majorData.map(data => data.major),
                    datasets: [{
                        label: 'Major',
                        data: majorData.map(data => data.total),
                        borderColor: '#36a2eb',
                        fill: false
                    }]
                }
            });

            // State Chart
            var stateCtx = document.getElementById('stateChart').getContext('2d');
            var stateChart = new Chart(stateCtx, {
                type: 'bar',
                data: {
                    labels: stateData.map(data => data.state),
                    datasets: [{
                        label: 'State',
                        data: stateData.map(data => data.total),
                        backgroundColor: '#ff6384'
                    }]
                }
            });
        </script>

    </div>
    <div class="container mb-6 mx-auto">
        <div class="p-6 overflow-hidden text-center hover: bg-white rounded-md shadow-md dark:bg-dark-eval-1"
            style="width: 100%">
            <h4 class="text-[12px]">Overview</h4>
            <span class="font-bold hover:text-blue-700 cursor-pointer">Date Apply Students</span> <canvas
                id="mixChart"></canvas>
        </div>
        <script>
            var studentMonthlyCount = @json($studentMonthlyCount);
            var mixCtx = document.getElementById('mixChart').getContext('2d');
            var mixChart = new Chart(mixCtx, {
                type: 'bar',
                data: {
                    labels: studentMonthlyCount.map(data => data.month),
                    datasets: [{
                        label: 'Student Count',
                        data: studentMonthlyCount.map(data => data.total),
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        yAxisID: 'bar-axis'
                    }]
                },
                options: {
                    scales: {
                        x: {
                            display: true
                        },
                        y: {
                            display: true,
                            beginAtZero: true,
                            position: 'left',
                            axis: 'y',
                            id: 'bar-axis'
                        },
                        y1: {
                            display: true,
                            beginAtZero: true,
                            position: 'right',
                            axis: 'y',
                            id: 'line-axis'
                        }
                    }
                }
            });
        </script>
    </div>

</x-app-layout>
