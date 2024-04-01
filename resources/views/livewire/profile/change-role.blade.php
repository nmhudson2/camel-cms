<x-form-section submit="updateRole">
    <x-slot name="title">
        {{ __('Change Role') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Change Role to Author or Editor') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_role" value="{{ __('Change Role') }}" />
            <select name="current_role" id=""><option value="author">Author</option><option value="Editor">Editor</option></select>
            <x-input-error for="current_role" class="mt-2" />
			<x-button type="submit" class="me-3" wire:loading.attr="disabled">
            {{ __('Confirm') }}
			</x-button>
        </div>
    </x-slot>

    
</x-form-section>
