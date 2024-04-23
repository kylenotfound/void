<div>
    <x-buttons.danger type="button" wire:click="$set('showModal', true)">
        <x-icons.trash></x-icons>
    </x-buttons>

    <x-confirmation-modal wire:model.defer="showModal">
        <x-slot name="title">
            Delete Post?
        </x-slot>

        <x-slot name="body">
            Are you sure you would like to delete this post?
        </x-slot>

        <x-slot name="footer">
            <div class="p-2">
                <x-buttons.secondary 
                    type="button" 
                    wire:click="$set('showModal', false)"
                >
                    Cancel
                </x-buttons.secondary>

                <x-buttons.danger 
                    type="button" 
                    wire:click="deletePost()"
                >
                    Delete
                </x-buttons.danger>
            </div>
        </x-slot>
    </x-confirmation-modal>
</div>
