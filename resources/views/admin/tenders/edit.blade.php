@extends('layouts.app')

@section('title', 'Edit Tender')

@section('content')
    <div class="bg-white shadow rounded-lg p-6 max-w-4xl mx-auto">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Tender - {{ $tender->tender_no }}</h2>

        <form action="{{ route('admin.tenders.update', $tender->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tender Number -->
                <div>
                    <label for="tender_no" class="block text-sm font-medium text-gray-700 mb-1">Tender Number*</label>
                    <input type="text" name="tender_no" id="tender_no" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('tender_no', $tender->tender_no) }}">
                    @error('tender_no')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category*</label>
                    <select name="category" id="category" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="" selected disabled>Select Category</option>
                        <option value="Construction"
                            {{ old('category', $tender->category) == 'Construction' ? 'selected' : '' }}>Construction
                        </option>
                        <option value="Supplies" {{ old('category', $tender->category) == 'Supplies' ? 'selected' : '' }}>
                            Supplies</option>
                        <option value="Services" {{ old('category', $tender->category) == 'Services' ? 'selected' : '' }}>
                            Services</option>
                    </select>
                    @error('category')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Eligible to Quote -->
                <div>
                    <label for="entitled_to_quote" class="block text-sm font-medium text-gray-700 mb-1">Eligible to
                        Quote*</label>
                    <input type="text" name="entitled_to_quote" id="entitled_to_quote" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('entitled_to_quote', $tender->entitled_to_quote) }}"
                        placeholder="E.g., Registered contractors only">
                    @error('entitled_to_quote')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Items -->
                <div class="md:col-span-2">
                    <label for="items" class="block text-sm font-medium text-gray-700 mb-1">Items/Description*</label>
                    <textarea name="items" id="items" rows="3" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('items', $tender->items) }}</textarea>
                    @error('items')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date of Opening -->
                <div>
                    <label for="date_of_opening" class="block text-sm font-medium text-gray-700 mb-1">Opening Date*</label>
                    <input type="date" name="date_of_opening" id="date_of_opening" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('date_of_opening', $tender->date_of_opening->format('Y-m-d')) }}">
                    @error('date_of_opening')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Type -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type*</label>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input id="type_local" name="type" type="radio" value="Open"
                                class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300"
                                {{ old('type', $tender->type) == 'local' ? 'checked' : '' }}>
                            <label for="type_local" class="ml-3 block text-sm font-medium text-gray-700">Local</label>
                        </div>
                        <div class="flex items-center">
                            <input id="type_foreign" name="type" type="radio" value="foreign"
                                class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300"
                                {{ old('type', $tender->type) == 'foreign' ? 'checked' : '' }}>
                            <label for="type_foreign" class="ml-3 block text-sm font-medium text-gray-700">Foreign</label>
                        </div>
                    </div>
                    @error('type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-3">
                <a href="{{ route('admin.tenders.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </a>
                <button type="submit"
                    class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Update Tender
                </button>
            </div>
        </form>
    </div>
@endsection
