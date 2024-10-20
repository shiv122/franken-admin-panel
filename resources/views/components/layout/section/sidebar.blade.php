<aside id="sidebar"
    class="bg-background w-64 space-y-6 py-4 px-2 absolute inset-y-0 left-0 transform -translate-x-full 
    lg:relative lg:translate-x-0 transition duration-200 ease-in-out z-30 border-r border-border">
    <div class="block">
        <div class="flex justify-between items-center">
            <a href="#" class=" text-foreground flex items-center space-x-2 px-4">

                <span class="text-2xl font-extrabold">Shiv</span>

            </a>
            <button class="lg:hidden uk-icon-button uk-icon-button-xsmall" type="button" data-sidebar-close> <uk-icon
                    icon="x"></uk-icon></button>
        </div>
    </div>

    <nav class="">
        <ul class="uk-nav-primary h-[90vh]" uk-nav sidebar-nav uk-scrollable>
            @foreach ($menu['admin']->menu as $menu)
                @if (isset($menu->navheader))
                    <h2 class="mb-1 !mt-3 px-3 text-lg font-semibold tracking-tight">{{ $menu->navheader }}</h2>
                @else
                    @php
                        $activeClass = null;
                        $currentRouteName = Route::currentRouteName();

                    @endphp


                    @if (isset($menu->submenu))
                        @php
                            $hasActiveSubmenu = collect($menu->submenu)->contains('slug', $currentRouteName);
                        @endphp
                        <li @class(['uk-parent', 'uk-active uk-open' => $hasActiveSubmenu])>
                            <a href="#">
                                <span class="flex flex-1 gap-2 items-center">
                                    <uk-icon icon="{{ $menu->icon }}"></uk-icon>
                                    {{ $menu->name }}
                                </span>
                                <span uk-nav-parent-icon></span>
                            </a>
                            <ul class="uk-nav-sub">
                                @foreach ($menu->submenu as $submenu)
                                    <li @class(['uk-link' => $submenu->slug === $currentRouteName])>
                                        <a
                                            href="{{ isset($submenu->url) ? url($submenu->url) : 'javascript:void(0);' }}">
                                            {{ $submenu->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li @class(['uk-active' => $menu->slug === $currentRouteName])>
                            <a class="font-medium "
                                href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}" role="button">
                                <span class="mr-2 size-4">
                                    <uk-icon icon="{{ $menu->icon }}"></uk-icon>
                                </span>
                                {{ $menu->name }}
                            </a>
                        </li>
                    @endif
                @endif
            @endforeach

        </ul>
    </nav>


</aside>
