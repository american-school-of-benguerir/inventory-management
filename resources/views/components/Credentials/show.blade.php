<!-- show a single credential -->
@extends('dashbordLayout')

@section('content')
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F] shadow-lg rounded-lg">
    <div class="card-body p-6">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold mb-6">Details</h6>
        </div>
    </div>
    <!-- credential details -->
    <div class="m-5">
        <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
            <label class="text-gray-600 dark:text-gray-400">username</label>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $credential->email }}</p>
        </div>
        <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
            <label class="text-gray-600 dark:text-gray-400">Type</label>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $credential->type }}</p>
        </div>
        <div class="mb-6 pb-4">
            <label class="text-gray-600 dark:text-gray-400">Password</label>
            <div class="relative">
                <input type="password" id="password-field" value="{{ $credential->password }}" class="block  bg-transparent text-sm text-gray-700 dark:text-gray-300 rounded-md px-3 py-2" readonly>
                <button type="button" class="absolute right-2 top-2 text-gray-500 dark:text-gray-300" id="toggle-password">
                  <i class="fas fa-eye"></i>
                </button>
              </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('toggle-password').addEventListener('click', function() {
      const passwordField = document.getElementById('password-field');
      const icon = this.querySelector('i');

      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        passwordField.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    });
  </script>
@endsection
