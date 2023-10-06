<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 py-4">
            User Avatar
        </h2>

        <img class="w-20 h-20 rounded-full" src="{{ "/storage/$user->avatar" }}" alt="User Avatar">

        <p class="mt-1 text-sm text-gray-600">
            Add or Update User Avatar
        </p>
    </header>

    @if (session('message'))
    <div class="text-red-500">
        {{ session('message') }}
    </div>
    @endif

    <form method="post" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
        <!-- method spoofing -->
        @method('patch')
        @csrf

        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        <div>
            <x-input-label for="avatar" :value="__('Avatar')" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)" required autofocus autocomplete="avatar" />
            <!-- check if there is any error for avatar -->
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>
        </div>

        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>


</section>