<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <form method="post" action='{{route("actions/set-app-name")}}' class="md:grid md:grid-cols-2 md:gap-6 mt-10 sm:mt-0">
        @csrf
        <div class="md:col-span-1 flex justify-between">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">
                    Change App Name
                </h3>
                <p name="description" class="mt-1 text-sm text-gray-600">Change how your apps name appears on tabs</p>
            </div>
        </div>
        <div name="form">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="col-span-6 sm:col-span-4 ">
                    <x-label for="app_name">App Name</x-label>
                    <x-input type="text" value="{{env('APP_NAME')}}" name="app_name" />
                </div>
            </div>
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <button type='submit' class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Save
                </button>
            </div>
        </div>
    </form>
    <x-section-border />
    <form method="post" action='{{route("actions/set-active-theme")}}' id='theme-form' class="md:grid md:grid-cols-2 md:gap-6 mt-10 sm:mt-0">
        @csrf
        <div class="md:col-span-1 flex justify-between">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">
                    Set Active Theme
                </h3>
                <p name="description" class="mt-1 text-sm text-gray-600">Change how your pages look</p>
            </div>
        </div>
        <div name="form">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="col-span-6 sm:col-span-4 ">
                    <x-label for="active_theme">Active Theme</x-label>
                    <select name="active_theme" id="" form="theme-form">
                        @foreach($templates as $key=>$value)
                        <option value="{{$value}}" {{$value == env('ACTIVE_THEME') ? 'selected': ''}}>{{$value}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <button type='submit' class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Save
                </button>
            </div>
        </div>
    </form>
    <x-section-border />
    <form method="post" enctype="multipart/form-data" action='{{route("actions/set-site-logo")}}' class="md:grid md:grid-cols-2 md:gap-6 mt-10 sm:mt-0">
        @csrf
        <div class="md:col-span-1 flex justify-between">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">
                    Change App Logo
                </h3>
                <p name="description" class="mt-1 text-sm text-gray-600">Add this logo to your site headers</p>
            </div>
        </div>
        <div name="form">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="col-span-6 sm:col-span-4 ">
                    <x-label for='file_upload'>Current: {{env('SITE_LOGO_NAME')}}</x-label>
                    <x-input type="file" name="file_upload" />
                </div>
            </div>
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <button type='submit' class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Save
                </button>
            </div>
        </div>
    </form>
    <x-section-border />
    <form method="post" action='{{route("actions/create-new-user")}}' class="md:grid md:grid-cols-2 md:gap-6 mt-10 sm:mt-0">
        @csrf
        <div class="md:col-span-1 flex justify-between">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">
                    Create New User
                </h3>
                <p name="description" class="mt-1 text-sm text-gray-600">Add Authors to your site</p>
            </div>
        </div>
        <div name="form">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="col-span-6 sm:col-span-4 ">
                    <x-label for="user_email"> User Email</x-label>
                    <x-input type="text" value="New Email" name="user_email" />
                    <x-label for="user_pass"> User Password</x-label>
                    <x-input type="password" value="New Password" name="user_pass" />
                    <x-label for="user_name"> User Name</x-label>
                    <x-input type="text" value="New Name" name="user_name" />
                </div>
            </div>
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <button type='submit' class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>