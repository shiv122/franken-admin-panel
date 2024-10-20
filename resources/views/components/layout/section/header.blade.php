<header class="border-b  border-border px-4">
    <nav class="uk-navbar" uk-navbar="">
        <button data-sidebar-toggle class="text-gray-500 hover:text-gray-600 lg:hidden">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <div class="uk-navbar-right gap-x-4 lg:gap-x-6">
            <div class="uk-navbar-item w-[150px] lg:w-[300px]"> <input class="uk-input" placeholder="Search"
                    type="text">
            </div>
            <div class="uk-inline">
                <button class="uk-icon-button uk-icon-button-small uk-icon-button-outline">
                    <uk-icon icon="palette" uk-cloak></uk-icon>
                </button>
                <div class="uk-card uk-card-body uk-card-default uk-drop uk-width-large"
                    uk-drop="mode: click; offset: 8">
                    <div class="uk-card-title uk-margin-medium-bottom">Customize</div>
                    <uk-theme-switcher></uk-theme-switcher>
                </div>
            </div>
            <div class="uk-navbar-item"> <a
                    class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-accent ring-ring focus:outline-none focus-visible:ring-1"
                    href="#" role="button" aria-haspopup="true"> <span
                        class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-full"> <img
                            class="aspect-square h-full w-full" alt="@shadcn"
                            src="https://api.dicebear.com/8.x/lorelei/svg?seed=sveltecult"> </span> </a>
                <div class="uk-drop uk-dropdown" uk-dropdown="mode: click; pos: bottom-right"
                    style="max-width: 1273px; top: 54px; left: 1071px;">
                    <ul class="uk-dropdown-nav uk-nav">
                        <li class="px-2 py-1.5 text-sm">
                            <div class="flex flex-col space-y-1">
                                <p class="text-sm font-medium leading-none">sveltecult</p>
                                <p class="text-xs leading-none text-muted-foreground">
                                    leader@sveltecult.com
                                </p>
                            </div>
                        </li>
                        <li class="uk-nav-divider"></li>
                        <li> <a class="uk-drop-close justify-between" href="#demo" role="button">
                                Profile
                                <span class="ml-auto text-xs tracking-widest opacity-60">
                                    ⇧⌘P
                                </span> </a> </li>
                        <li> <a class="uk-drop-close justify-between" href="#demo" role="button">
                                Billing
                                <span class="ml-auto text-xs tracking-widest opacity-60">
                                    ⌘B
                                </span> </a> </li>
                        <li> <a class="uk-drop-close justify-between" href="#demo" role="button">
                                Settings
                                <span class="ml-auto text-xs tracking-widest opacity-60">
                                    ⌘S
                                </span> </a> </li>
                        <li> <a class="uk-drop-close justify-between" href="#demo" role="button">
                                New Team
                            </a> </li>
                        <li class="uk-nav-divider"></li>
                        <li> <a class="uk-drop-close justify-between" href="#demo" role="button">
                                Logout
                            </a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
