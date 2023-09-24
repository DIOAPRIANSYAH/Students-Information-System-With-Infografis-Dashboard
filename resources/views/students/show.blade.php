<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Students Tables') }}
            </h2>
        </div>
    </x-slot>

    <!--Table Student-->
    <div id='recipients' class="shadow-lg p-8 mt-6 lg:mt-0 hover: bg-white rounded-md dark:bg-dark-eval-1">


        <table id="tableStudent2"
            class="stripe hover text-center hover: bg-white rounded-md shadow-md dark:bg-dark-eval-1"
            style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">No</th>
                    <th data-priority="2">Name</th>
                    <th data-priority="3">Gender</th>
                    <th data-priority="4">Major</th>
                    <th data-priority="5">Date Apply</th>
                    <th data-priority="6">City</th>
                    <th data-priority="7">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $no)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->major }}</td>
                        <td>{{ $student->date_apply }}</td>
                        <td>{{ $student->city->state }}</td>


                        <td class="border border-white">
                            <button
                                class="bg-blue-500 max-w-xs gap-1 hover:bg-blue-700 text-white ml-1 mt-2 mb-2 py-1 px-1 rounded">
                                <a href="{{ route('students.show', $student->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg> </svg>
                                </a>
                            </button>


                            <button
                                class="bg-green-500 max-w-xs gap-1 hover:bg-green-700 text-white ml-1 mt-2 mb-2 py-1 px-1 rounded">
                                <a href="{{ route('students.edit', $student->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                            </button>

                            <form action="/students/{{ $student->id }}" method="POST" id="deleteForm">

                                @csrf
                                @method('DELETE')
                                <button id="delete-button"
                                    class="bg-red-500 max-w-xs gap-1 hover:bg-red-700 text-white ml-1 mt-2 mb-2 py-1 px-1 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg> </svg>
                                </button>
                            </form>

                        </td>

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

                var table = $('#tableStudent2').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
        </script>
    </div>

</x-app-layout>
<script>
    const deleteForm = document.getElementById('deleteForm');

    deleteForm.addEventListener('submit', (event) => {
        event.preventDefault();

        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form after confirmation
                deleteForm.submit();
            }
        });
    });
</script>
