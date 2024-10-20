<x-layout.default-layout>


    <div class="flex gap-5 flex-col">
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            <div class="uk-card">
                <div class="uk-card-header flex flex-row items-center justify-between">
                    <h3 class="text-sm font-medium tracking-tight">Total Revenue</h3> <span
                        class="size-4 text-muted-foreground"> <uk-icon icon="dollar-sign"></uk-icon> </span>
                </div>
                <div class="uk-card-body">
                    <div class="text-2xl font-bold">$45,231.89</div>
                    <p class="text-xs text-muted-foreground">+20.1% from last month</p>
                </div>
            </div>
            <div class="uk-card">
                <div class="uk-card-header flex flex-row items-center justify-between">
                    <h3 class="text-sm font-medium tracking-tight">Subscriptions</h3> <span
                        class="size-4 text-muted-foreground"> <uk-icon icon="users"></uk-icon> </span>
                </div>
                <div class="uk-card-body">
                    <div class="text-2xl font-bold">+2350</div>
                    <p class="text-xs text-muted-foreground">+180.1% from last month</p>
                </div>
            </div>
            <div class="uk-card">
                <div class="uk-card-header flex flex-row items-center justify-between">
                    <h3 class="text-sm font-medium tracking-tight">Sales</h3> <span
                        class="size-4 text-muted-foreground">
                        <uk-icon icon="credit-card"></uk-icon> </span>
                </div>
                <div class="uk-card-body">
                    <div class="text-2xl font-bold">+12,234</div>
                    <p class="text-xs text-muted-foreground">+19% from last month</p>
                </div>
            </div>
            <div class="uk-card">
                <div class="uk-card-header flex flex-row items-center justify-between">
                    <h3 class="text-sm font-medium tracking-tight">Active Now</h3> <span
                        class="size-4 text-muted-foreground"> <uk-icon icon="chart-line"></uk-icon> </span>
                </div>
                <div class="uk-card-body">
                    <div class="text-2xl font-bold">+573</div>
                    <p class="text-xs text-muted-foreground">+201 since last hour</p>
                </div>
            </div>
        </div>
        <div class="grid gap-4 lg:grid-cols-8">
            <div class="uk-card flex min-h-64 uk-card-body items-center justify-center lg:col-span-4">
                <x-ui.line-chart chart-id="line_chart" :chart-data="$dataOne" />
            </div>
            <div class="uk-card flex min-h-64 uk-card-body items-center justify-center lg:col-span-4">
                <x-ui.area-chart chart-id="area_chart" :chart-data="$dataTwo" :make-global="true" />

            </div>
        </div>


        <div class="uk-card  uk-card-body lg:col-span-4">
            <x-ui.form id="test_form" :route="route('test')">
                <fieldset class="uk-fieldset">
                    <legend class="uk-legend">Legend</legend>

                    <div class="uk-margin">
                        <input class="uk-input" name="test" type="text" placeholder="Input" aria-label="Input" />
                    </div>
                </fieldset>
            </x-ui.form>
        </div>
    </div>



    <x-slot:script>
        <script></script>
    </x-slot:script>
</x-layout.default-layout>
