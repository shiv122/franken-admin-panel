<form class="{{ $class }}" id="{{ $id }}" onsubmit="handleSubmit__{{ $id }}(event)"
    class="w-full h-full">
    {{ $slot }}


    @if (empty($submitButton))
        <button type="submit" class="uk-button uk-button-secondary w-full mt-2">Submit</button>
    @else
        {{ $submitButton }}
    @endif
</form>



@push('component-script')
    <script>
        const handleSubmit__{{ $id }} = async (e) => {
            e.preventDefault();
            console.log(e.currentTarget.id);
            const response = await rebound({
                form: document.querySelector('#{{ $id }}'),
                url: '{{ $route }}',
                method: '{{ $method }}',
                notification: '{{ $notification }}',
                asyncType: '{{ $asyncType }}',
                reset: {{ $reset }},
                onReject: (error) => {
                    @if ($onReject)
                        {{ $onReject }}.apply(error)
                    @endif
                },
                onResolve: (res) => {
                    @if ($onResolve)
                        {{ $onResolve }}.apply(res)
                    @endif
                }
            })
        };
    </script>
@endpush
