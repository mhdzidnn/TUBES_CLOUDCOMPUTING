<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="/dashboard/products" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                              <h6 class="text-xl font-semibold mb-3">Product Information</h6>
                                <div class="mb-3">
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="mb-3">
                                    <x-input-label for="category" :value="__('Category')" />
                                    <select id="category" name="category" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm px-3 h-10" required autofocus autocomplete="name">
                                        <option value="Personal Cloud Server">Personal Cloud Server</option>
                                        <option value="Family Cloud Server">Family Cloud Server</option>
                                        <option value="Company Cloud Server">Company Cloud Server</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                </div>

                                <div class="mb-3">
                                    <x-input-label for="image" :value="__('Image')" />
                                    <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" required autofocus autocomplete="image" />
                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                </div>

                                <div class="mb-3">
                                    <x-input-label for="price" :value="__('Price')" />
                                    <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" required autofocus autocomplete="price" />
                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </div>


                                <div class="mb-3" id="input-container">
                                    <label for="description_0">Description</label>
                                    <input type="text" id="description_0" name="description[]" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm px-3 h-10" required autofocus autocomplete="description">
                                </div>

                                <button type="button" id="add-button" class="mt-1 text-blue-500">Add Description</button>

                            </div>
                            <div class="w-full md:w-1/2">
                                <div class="mb-3">
                                    <h6 class="text-xl font-semibold mb-3">Product Specification</h6>
                                    <input type="hidden" id="specs" name="specs" value="{{ old('specs', json_encode(['Capacity'=>'', 'Connector'=>'', 'System requirements'=>'', 'Add Cloud Home Mobile App'=>'', 'Compatibility'=>'', 'Supported Browsers'=>'', 'Supported Streaming Options'=>'', 'Note'=>''])) }}">
                                    <div id="specs-container">
                                        <div class="mb-2">
                                            <label for="Capacity">Capacity</label>
                                            <input type="text" id="Capacity" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm px-3 h-10" oninput="updateSpecs('Capacity', this.value)">
                                        </div>
                                        <div class="mb-2">
                                            <label for="Connector">Connector</label>
                                            <input type="text" id="Connector" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm px-3 h-10" oninput="updateSpecs('Connector', this.value)">
                                        </div>
                                        <div class="mb-2">
                                            <label for="System requirements">System requirements</label>
                                            <input type="text" id="System requirements" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm px-3 h-10" oninput="updateSpecs('System requirements', this.value)">
                                        </div>
                                        <div class="mb-2">
                                            <label for="Add Cloud Home Mobile App">Add Cloud Home Mobile App</label>
                                            <input type="text" id="Add Cloud Home Mobile App" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm px-3 h-10" oninput="updateSpecs('Add Cloud Home Mobile App', this.value)">
                                        </div>
                                        <div class="mb-2">
                                            <label for="Compatibility">Compatibility</label>
                                            <input type="text" id="Compatibility" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm px-3 h-10" oninput="updateSpecs('Compatibility', this.value)">
                                        </div>
                                        <div class="mb-2">
                                            <label for="Supported Browsers">Supported Browsers</label>
                                            <input type="text" id="Supported Browsers" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm px-3 h-10" oninput="updateSpecs('Supported Browsers', this.value)">
                                        </div>
                                        <div class="mb-2">
                                            <label for="Supported Streaming Options">Supported Streaming Options</label>
                                            <input type="text" id="Supported Streaming Options" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm px-3 h-10" oninput="updateSpecs('Supported Streaming Options', this.value)">
                                        </div>
                                        <div class="mb-2">
                                            <label for="Note">Note</label>
                                            <input type="text" id="Note" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm px-3 h-10" oninput="updateSpecs('Note', this.value)">
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('specs')" class="mt-2" />
                                </div>

                                <script>
                                    function updateSpecs(key, value) {
                                        const specsInput = document.getElementById('specs')
                                        const specsJSON = JSON.parse(specsInput.value)
                                        specsJSON[key] = value
                                        specsInput.value = JSON.stringify(specsJSON)
                                    }
                                </script>
                            </div>
                        </div>


                        <div class="mt-4 flex flex-row justify-end gap-2">
                            <x-secondary-button onclick="history.back()">Cancel</x-secondary-button>
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>


                    </form>


                </div>
            </div>
        </div>
    </div>


    <script>
        let descriptionIndex = 1;

        document.getElementById('add-button').addEventListener('click', function() {
            addDescriptionField();
        });

        function addDescriptionField() {
            const inputContainer = document.getElementById('input-container');
            const newField = document.createElement('div');
            newField.classList.add('mt-1', 'flex', 'items-center');
            newField.innerHTML = `
                <input type="text" id="description_${descriptionIndex}" name="description[]" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm px-3 h-10" autofocus autocomplete="description">
                <button type="button" onclick="removeDescriptionField(this)" class="ml-2 text-red-500">Remove</button>
            `;
            inputContainer.appendChild(newField);
            descriptionIndex++;
        }

        function removeDescriptionField(button) {
            const field = button.parentElement;
            field.remove();
        }
    </script>
</x-app-layout>
