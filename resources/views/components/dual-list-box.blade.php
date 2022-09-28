<div wire:ignore class="w-full">
    <select class="duallistbox" {{ $attributes->except('options') }}>
        @if(!isset($attributes['multiple']))
        <option></option>
        @endif
        @foreach($options as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
</div>


@push('scripts')
<script>
    document.addEventListener("livewire:load", () => {
        let el = $('#{{ $attributes['id'] }}')

        function initSelect () {
            el.bootstrapDualListbox()
        }

        initSelect()

        Livewire.hook('message.processed', (message, component) => {
            initSelect()
        });

        el.on('change', function (e) {
            let data = el.val()
            if (data === "") {
                data = null
            }
            @this.set('{{ $attributes['wire:model'] }}', data)
        });
    });
</script>
@endpush
