<div id="{{ $chartId }}" class="h-full w-full items-center justify-center"></div>
@once
    @push('component-script')
        <script defer src="https://unpkg.com/lightweight-charts/dist/lightweight-charts.standalone.production.js"></script>
        @vite('resources/js/chart.js')
    @endpush
@endonce

@push('component-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            makeAreaChart({
                chartId: '{{ $chartId }}',
                chartOptions: @json($chartOptions),
                chartData: @json($chartData),
                makeGlobal: {{ $makeGlobal ? 'true' : 'false' }},
                styles: styles,
                hslStringToHex: hslStringToHex
            });
        });
    </script>
@endpush
