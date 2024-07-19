<div>
    <form wire:submit.prevent="save">
        <div>
            <label for="content">Message:</label>
            <textarea wire:model="content" id="content"></textarea>
            @error('content') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Envoyer</button>
    </form>
</div>
