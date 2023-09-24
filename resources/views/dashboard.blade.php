<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <!--Count Data-->
    <div class="container xl:max-w-8xl mx-auto mb-3  space-y-4 lg:space-y-8">
        <!-- Quick Stats -->
        <div class="bg-white shadow-md dark:bg-dark-eval-1 bg-opacity-50 rounded-lg p-5 grid grid-cols-2 lg:grid-cols-4">
            <div class="p-5">
                <dl>
                    <dt class="text-sm uppercase font-semibold text-gray-400 tracking-wider">Student Total</dt>
                    <dd class="font-semibold text-4xl pt-2 pb-3">{{ $student_count }}</dd>
                </dl>
                <div class="flex items-center space-x-2">
                    <svg class="hi-solid hi-arrow-up inline-block w-3 h-3 text-green-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm text-gray-400 font-semibold">Count Data</span>
                </div>
            </div>
            <div class="p-5">
                <dl>
                    <dt class="text-sm uppercase font-semibold text-gray-400 tracking-wider">State Total</dt>
                    <dd class="font-semibold text-4xl pt-2 pb-3">{{ $state_count }}</dd>
                </dl>
                <div class="flex items-center space-x-2">
                    <svg class="hi-solid hi-arrow-up inline-block w-3 h-3 text-green-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm text-gray-400 font-semibold">Count Data</span>
                </div>
            </div>
            <div class="p-5">
                <dl>
                    <dt class="text-sm uppercase font-semibold text-gray-400 tracking-wider">Female Total</dt>
                    <dd class="font-semibold text-4xl pt-2 pb-3">{{ $female_count }}</dd>
                </dl>
                <div class="flex items-center space-x-2">
                    <svg class="hi-solid hi-arrow-up inline-block w-3 h-3 text-green-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm text-gray-400 font-semibold">Count Data</span>
                </div>
            </div>
            <div class="p-5">
                <dl>
                    <dt class="text-sm uppercase font-semibold text-gray-400 tracking-wider">Male Total</dt>
                    <dd class="font-semibold text-4xl pt-2 pb-3">{{ $male_count }}</dd>
                </dl>
                <div class="flex items-center space-x-2">
                    <svg class="hi-solid hi-arrow-up inline-block w-3 h-3 text-green-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm text-gray-400 font-semibold">Count Data</span>
                </div>
            </div>
        </div>
        <!-- END Quick Stats -->
    </div>

    <!--Charts-->
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
    <div class="container mb-6">
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

    <!--Table Students-->
    <div id='recipients' class="p-8 mt-6 mb-6 lg:mt-0 hover: bg-white rounded-lg shadow-md dark:bg-dark-eval-1">
        <div class="container mx-auto mb-6 text-center">
            <h4 class="text-[14px]">Overview</h4>
            <span class="font-bold text-[22px] hover:text-blue-700 cursor-pointer">Table Students</span>
        </div>
        <table id="tableStudent"
            class="stripe hover text-center hover: bg-white rounded-md shadow-md dark:bg-dark-eval-1"
            style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">No</th>
                    <th data-priority="2">Name</th>
                    <th data-priority="3">Gender</th>
                    <th data-priority="4">Major</th>
                    <th data-priority="5">Apply Date</th>
                    <th data-priority="6">State</th>
                    <th data-priority="6">Address</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $no => $person)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $person->name }}</td>
                        <td>{{ $person->gender }}</td>
                        <td>{{ $person->major }}</td>
                        <td>{{ $person->date_apply }}</td>
                        <td>{{ $person->city->state }}</td>
                        <td>{{ $person->city->city_name }}</td>
                    </tr>
                @endforeach

                <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
            </tbody>

        </table>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <!--Datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script>
            $(document).ready(function() {

                var table = $('#tableStudent').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
        </script>
    </div>

    <!--Table City-->
    <div id='recipients' class="p-8  mt-6 lg:mt-0 hover: bg-white rounded-lg shadow-md dark:bg-dark-eval-1">

        <div class="container mx-auto mb-6 text-center">
            <h4 class="text-[14px]">Overview</h4>
            <span class="font-bold text-[22px] hover:text-blue-700 cursor-pointer">Table City</span>
        </div>
        <table id="tableStudent1"
            class="stripe hover text-center hover: bg-white rounded-md shadow-md dark:bg-dark-eval-1"
            style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">No</th>
                    <th data-priority="2">City Name</th>
                    <th data-priority="3">Address</th>
                    <th data-priority="4">Updated At</th>
                    <th data-priority="5">Created At</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $no => $person)
                    <tr>
                        <td>{{ $person->id }}</td>
                        <td>{{ $person->state }}</td>
                        <td>{{ $person->city_name }}</td>
                        <td>{{ $person->updated_at }}</td>
                        <td>{{ $person->created_at }}</td>
                    </tr>
                @endforeach
                <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
            </tbody>

        </table>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <!--Datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script>
            $(document).ready(function() {

                var table = $('#tableStudent1').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
        </script>
    </div>
</x-app-layout>
