<div id="{{ $chartId }}" class="h-full w-full items-center justify-center"></div>
@once
    @push('component-script')
        <script defer src="https://unpkg.com/lightweight-charts/dist/lightweight-charts.standalone.production.js"></script>
    @endpush
@endonce

@push('component-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            makeLineChart({
                chartId: '{{ $chartId }}',
                chartOptions: @json($chartOptions),
                chartData: @json($chartData),
                makeGlobal: {{ $makeGlobal ? 'true' : 'false' }},
                styles: styles,
                hslStringToHex: hslStringToHex // Assume this function is defined elsewhere
            });

        });
    </script>
@endpush
