    <!--Table City-->
    <div id='recipients' class="p-8 mt-6 lg:mt-0 hover: bg-white rounded-lg shadow-md dark:bg-dark-eval-1">


        <table id="example" class="stripe hover text-center hover: bg-white rounded-md shadow-md dark:bg-dark-eval-1"
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
                        <td>{{ $no + 1 }}</td>
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

                var table = $('#example').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
        </script>
    </div>
