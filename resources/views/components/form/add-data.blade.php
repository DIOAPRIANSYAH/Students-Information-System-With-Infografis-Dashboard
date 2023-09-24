<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Add Data Students') }}
            </h2>
        </div>
    </x-slot>
    <form action="{{ route('students.store') }}" method="POST" id="dataForm" class="space-y-4">
        @csrf
        <div class="p-6 overflow-hidden hover: bg-white rounded-md shadow-md dark:bg-dark-eval-1" id="dataForm"
            class="space-y-4">
            <div class="flex gap-3">
                <div class="w-full lg:w-6/12 px-4 ">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            ID
                        </label>
                        <input type="number" disabled="true"
                            class=" border-0 px-3 py-3 placeholder-blueGray-300 bg-slate-200 text-slate-600  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Name
                        </label>
                        <input type="text" id="name" name="name" required
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            placeholder="Enter Your Name">
                    </div>
                </div>
            </div>

            <div class="flex gap-3 ml-4">
                <div class="flex items-center mr-4">
                    <input checked id="gender" id="gender" name="gender" type="radio" value="male"
                        name="gender"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="gender" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                </div>
                <div class="flex items-center mr-4">
                    <input id="gender" type="radio" id="gender" name="gender" value="female" name="gender"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-2-radio"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                </div>

            </div>

            <div class="flex gap-3 mt-3">
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            Major
                        </label>
                        <select id="major" name="major" required
                            class="cursor-pointer border-0 px-3 py-3 placeholder-blueGray-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            <option value="">Choose Major</option>
                            <option value="Biology">Biology</option>
                            <option value="Medicine">Medicine</option>
                            <option value="Information Technology">
                                Information Technology
                            </option>
                            <option value="Physics">Physics</option>
                            <option value="Chemistry">Chemistry</option>
                            <option value="Philosophy">Philosophy</option>
                            <option value="Engineering Science">Engineering Science</option>
                            <option value="Social Relation">Social Relation</option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label for="city_id" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            State
                        </label>
                        <select id="city_id" name="city_id" required
                            class="cursor-pointer border-0 px-3 py-3 placeholder-blueGray-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            >
                            <option value="">Choose State</option>
                            @foreach ($cities as $x)
                                <option value="{{ $x->id }}">{{ $x->state }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            Date Apply
                        </label>
                        <input type="date" id="date_apply" name="date_apply" required
                            class="cursor-pointer border-0 px-3 py-3 placeholder-blueGray-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
                    </div>
                </div>
            </div>

            <div class="container px-4 py-3 text-right">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out"
                    id="submitBtn">
                    Simpan
                </button>
            </div>
    </form>
    {{-- <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="gender">Jenis Kelamin:</label>
            <select name="gender" class="form-control" required>
                <option value="Male">Laki-laki</option>
                <option value="Female">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="major">Jurusan:</label>
            <input type="text" name="major" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date_apply">Tanggal Apply:</label>
            <input type="date" name="date_apply" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="city_id">Kota:</label>
            <select name="city_id" class="form-control" required>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form> --}}

    </div>
</x-app-layout>
<script>
    const submitBtn = document.getElementById('submitBtn');
    const dataForm = document.getElementById('dataForm');

    submitBtn.addEventListener('click', () => {
        // Prevent the default form submission
        event.preventDefault();

        Swal.fire({
            icon: 'info',
            title: 'Simpan Data',
            text: 'Apakah Anda yakin ingin menyimpan data?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform data submission using AJAX
                const formData = new FormData(dataForm);
                fetch('{{ route('students.store') }}', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Show success notification
                        Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil disimpan',
                            showConfirmButton: true,
                            confirmButtonText: 'OK'
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        });
    });
</script>
