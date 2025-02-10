@extends('dashbordLayout')

@section('content')
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F]">
    <div class="card-body">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold mb-6">Edit Accessory</h6>
        </div>
        <form action="{{ route('accessories.update', $accessory->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4">

                <!-- First Column: Fields -->
                <div>
                    <!-- Name Field -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ $accessory->name }}">
                    </div>

                    <!-- Type Field -->
                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                        <input type="text" id="type" name="type" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ $accessory->type }}">
                    </div>

                    <!-- Quantity Field -->
                    <div class="mb-4">
                        <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantity</label>
                        <input type="number" id="quantity" name="quantity" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ $accessory->quantity }}">
                    </div>
                </div>

            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">Update Accessory</button>
            </div>
        </form>
    </div>
</div>
@endsection
