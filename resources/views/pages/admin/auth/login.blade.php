<x-layout.guest-layout>
    <x-slot:title>
        Login
    </x-slot:title>

    {{-- <form class="uk-form-stacked space-y-4"> --}}

    <x-ui.form id="test_form" :route="route('test')">

        <div class="">
            <label class="uk-form-label uk-form-label-required" for="form-stacked-text">
                Email
            </label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-stacked-text" type="email" name="email" placeholder="Some text" />
            </div>
        </div>
        <div class="">
            <label class="uk-form-label uk-form-label-required" for="form-stacked-text">
                Password
            </label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-stacked-text" type="password" name="password"
                    placeholder="Some text" />
            </div>
        </div>

    </x-ui.form>
    {{-- </form> --}}


    <x-slot:script>
    </x-slot:script>
</x-layout.guest-layout>
