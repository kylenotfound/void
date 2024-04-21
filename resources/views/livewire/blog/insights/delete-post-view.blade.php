<div>
    <x-buttons.danger type="button" wire:click="$set('showModal', true)">
        Delete
    </x-buttons.danger>

    <x-confirmation-modal wire:model.defer="showModal">
        <x-slot name="title">
            Are you sure?
        </x-slot>

        <x-slot name="body">
            Would you like to delete this view?
        </x-slot>

        <x-slot name="footer">
            <div class="p-2">
                <x-buttons.secondary 
                    type="button" 
                    wire:click="$set('showModal', false)"
                >
                    Cancel
                </x-buttons.secondary>

                <x-buttons.primary 
                    type="button" 
                    wire:click="deletePostView()"
                >
                    Confirm
                </x-buttons.primary>
            </div>
        </x-slot>
    </x-confirmation-modal>
</div>
