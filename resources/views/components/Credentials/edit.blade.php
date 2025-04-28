@extends('dashbordLayout')

@section('content')
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F]">
    <div class="card-body">
        <h6 class="text-lg font-semibold mb-6">Edit Credential</h6>

        <form action="{{ route('credentials.update', $credential->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username', $credential->username) }}"
                    class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('username') border-red-500 @enderror" required>
                @error('username')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter new password to change"
                    class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Leave blank to keep current password</p>
            </div>

            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                <select id="type" name="type"
                    class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('type') border-red-500 @enderror" required>
                    <option value="">Select Type</option>
                    <option value="ssh" {{ old('type', $credential->type) === 'ssh' ? 'selected' : '' }}>SSH</option>
                    <option value="icloud" {{ old('type', $credential->type) === 'icloud' ? 'selected' : '' }}>iCloud</option>
                    <option value="google" {{ old('type', $credential->type) === 'google' ? 'selected' : '' }}>Google</option>
                    <option value="microsoft" {{ old('type', $credential->type) === 'microsoft' ? 'selected' : '' }}>Microsoft</option>
                    <option value="aws" {{ old('type', $credential->type) === 'aws' ? 'selected' : '' }}>AWS</option>
                    <option value="database" {{ old('type', $credential->type) === 'database' ? 'selected' : '' }}>Database</option>
                    <option value="api" {{ old('type', $credential->type) === 'api' ? 'selected' : '' }}>API</option>
                    <option value="vpn" {{ old('type', $credential->type) === 'vpn' ? 'selected' : '' }}>VPN</option>
                    <option value="other" {{ old('type', $credential->type) === 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('type')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-2 gap-2">
                <a href="{{ route('credentials.index') }}" class="bg-gray-400 dark:bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-500 dark:hover:bg-gray-700">Cancel</a>
                <button type="submit" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
