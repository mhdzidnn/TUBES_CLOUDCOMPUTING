<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="/dashboard/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <h6 class="text-xl font-semibold mb-3">Product Information</h6>
                                <div class="mb-3">
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ $product->name }}" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="mb-3">
                                    <x-input-label for="category" :value="__('Category')" />
                                    <select id="category" name="category" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm px-3 h-10" required autofocus autocomplete="name">
                                        <option value="Personal Cloud Server" {{ $product->category == 'Personal Cloud Server' ? 'selected' : '' }}>Personal Cloud Server</option>
                                        <option value="Family Cloud Server" {{ $product->category == 'Family Cloud Server' ? 'selected' : '' }}>Family Cloud Server</option>
                                        <option value="Company Cloud Server" {{ $product->category == 'Company Cloud Server' ? 'selected' : '' }}>Company Cloud Server</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                </div>

                                <div class="mb-3">
                                    <x-input-label for="image" :value="__('Image')" />
                                    <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" autofocus autocomplete="image" />
                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                    <img src="{{  asset('storage/'. $product->image) }}" alt="Product Image" class="w-20 h-20 mt-2">
                                </div>

                                <div class="mb-3">
                                    <x-input-label for="price" :value="__('Price')" />
                                    <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" value="{{ $product->price }}" required autofocus autocomplete="price" />
                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </div>

                                <div class="mb-3" id="input-container">
                                    <label for="description_0">Description</label>
                                    @foreach (json_decode($product->description) as $description)
                                            <input type="text" id="description_{{ $loop->index }}" name="description[]" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm px-3 h-10" value="{{ $description }}" required autofocus autocomplete="description">
                                    @endforeach
                                </div>

                                <button type="button" id="add-button" class="mt-1 text-blue-500">Add Description</button>

                            </div>
                            <div class="w-full md:w-1/2">
                                <h6 class="text-xl font-semibold mb-3">Product Specification</h6>
                                <div class="mb-3">
                                    <input type="hidden" id="specs" name="specs" value="{{ old('specs', json_encode($product->specs)) }}">
                                    <?php
                                        $specs = json_decode($product->specs, true);
                                    ?>
                                    <div id="specs-container">
                                        <div class="mb-2">
                                            <x-input-label for="Capacity" :value="__('Capacity')" />
                                            <x-text-input id="Capacity" name="Capacity" type="text" class="mt-1 block w-full" value="{{ $specs['Capacity'] ?? '' }}" oninput="updateSpecs('Capacity', this.value)" />
                                        </div>
                                        <div class="mb-2">
                                            <x-input-label for="Connector" :value="__('Connector')" />
                                            <x-text-input id="Connector" name="Connector" type="text" class="mt-1 block w-full" value="{{ $specs['Connector'] ?? '' }}" oninput="updateSpecs('Connector', this.value)" />
                                        </div>
                                        <div class="mb-2">
                                            <x-input-label for="System requirements" :value="__('System Requirements')" />
                                            <x-text-input id="System requirements" name="System requirements" type="text" class="mt-1 block w-full" value="{{ $specs['System requirements'] ?? '' }}" oninput="updateSpecs('System Requirements', this.value)" />
                                        </div>
                                        <div class="mb-2">
                                            <x-input-label for="AddCloudHomeMobileApp" :value="__('Add Cloud Home Mobile App')" />
                                            <x-text-input id="AddCloudHomeMobileApp" name="AddCloudHomeMobileApp" type="text" class="mt-1 block w-full" value="{{ $specs['Add Cloud Home Mobile App'] ?? '' }}" oninput="updateSpecs('Add Cloud Home Mobile App', this.value)" />
                                        </div>
                                        <div class="mb-2">
                                            <x-input-label for="Compatibility" :value="__('Compatibility')" />
                                            <x-text-input id="Compatibility" name="Compatibility" type="text" class="mt-1 block w-full" value="{{ $specs['Compatibility'] ?? '' }}" oninput="updateSpecs('Compatibility', this.value)" />
                                        </div>
                                        <div class="mb-2">
                                            <x-input-label for="SupportedBrowsers" :value="__('Supported Browsers')" />
                                            <x-text-input id="SupportedBrowsers" name="SupportedBrowsers" type="text" class="mt-1 block w-full" value="{{ $specs['Supported Browsers'] ?? '' }}" oninput="updateSpecs('Supported Browsers', this.value)" />
                                        </div>
                                        <div class="mb-2">
                                            <x-input-label for="SupportedStreamingOptions" :value="__('Supported Streaming Options')" />
                                            <x-text-input id="SupportedStreamingOptions" name="SupportedStreamingOptions" type="text" class="mt-1 block w-full" value="{{ $specs['Supported Streaming Options'] ?? '' }}" oninput="updateSpecs('Supported Streaming Options', this.value)" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 flex flex-row justify-end gap-2">
                            <x-secondary-button onclick="history.back()">Cancel</x-secondary-button>
                            <x-primary-button>{{ __('Update') }}</x-primary-button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateSpecs(key, value) {
            const specsInput = document.getElementById('specs')
            const specsJSON = JSON.parse(specsInput.value)
            specsJSON[key] = value
            specsInput.value = JSON.stringify(specsJSON)
        }
    </script>
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


