<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Add Data Students') }}
            </h2>
            <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Star on Github</span>
            </x-button>
        </div>
    </x-slot>
    <form action="{{ route('students.update', $student->id) }}" method="POST" id="dataForm" class="space-y-4">
        @csrf
        @method('PUT')
        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1" id="dataForm">
            <div class="flex gap-3">
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="grid-password">
                            ID
                        </label>
                        <input type="number" disabled="true"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 bg-slate-200 text-slate-600 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="{{ $student->id }}">
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="grid-password">
                            Name
                        </label>
                        <input type="text" id="name" name="name" required
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="{{ $student->name }}" placeholder="Enter Your Name">
                    </div>
                </div>
            </div>

            <div class="flex gap-3 ml-4">
                <div class="flex items-center mr-4">
                    <input id="male" name="gender" type="radio" value="male"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        {{ $student->gender === 'male' ? 'checked' : '' }}>
                    <label for="male" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                </div>
                <div class="flex items-center mr-4">
                    <input id="female" type="radio" name="gender" value="female"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        {{ $student->gender === 'female' ? 'checked' : '' }}>
                    <label for="female"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                </div>
            </div>

            <div class="flex gap-3 mt-3">
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="major">
                            Major
                        </label>
                        <select id="major" name="major" required
                            class="cursor-pointer border-0 px-3 py-3 placeholder-blueGray-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            <option value="">Choose Major</option>
                            <option value="Biology" {{ $student->major === 'Biology' ? 'selected' : '' }}>Biology
                            </option>
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
                            <option value="">Choose State</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}"
                                    {{ $city->id === $student->city_id ? 'selected' : '' }}>
                                    {{ $city->state }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="date_apply">
                            Date Apply
                        </label>
                        <input type="date" id="date_apply" name="date_apply" required
                            class="cursor-pointer border-0 px-3 py-3 placeholder-blueGray-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="{{ $student->date_apply }}" />
                    </div>
                </div>
            </div>

            <div class="container px-4 py-3 text-right">
                <button type="button"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out"
                    id="submitBtn">
                    Update
                </button>
            </div>

        </div>
    </form>
</x-app-layout>
<script>
    document.getElementById('submitBtn').addEventListener('click', function() {
        Swal.fire({
            title: 'Confirm Update',
            text: 'Are you sure you want to update?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('buttons.icon') }}"; // Redirect to the update URL
            }
        });
    });

    // Add a listener to handle the successful update and show a success message
    window.addEventListener('load', function() {
        let successMessage = '{{ session('success') }}';
        if (successMessage) {
            Swal.fire({
                title: 'Success',
                text: successMessage,
                icon: 'success',
                showConfirmButton: true
            });
        }
    });
</script>
