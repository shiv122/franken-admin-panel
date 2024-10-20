<script>
    document.addEventListener('DOMContentLoaded', () => {
        const htmlElement = document.documentElement;
        const mode = localStorage.getItem("mode");
        const theme = localStorage.getItem("theme") || "uk-theme-zinc";

        if (mode === "dark" || (!mode && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
            htmlElement.classList.add("dark");
        } else {
            htmlElement.classList.remove("dark");
        }

        htmlElement.classList.add(theme);

        window.addEventListener('load', () => {
            setTimeout(() => {
                const loader = document.getElementById('page-loader');
                if (loader) {
                    loader.style.display = 'none';
                }
            }, 100);
        });
    });
</script>


@vite(['resources/js/core.js', 'node_modules/franken-ui/dist/js/icon.iife.js'])
@viteDeferredScripts(['resources/js/util.js', 'resources/js/init.js', 'resources/js/plugins/notification.js', 'resources/js/plugins/rebound.js'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/perfect-scrollbar.min.js" defer></script>
@stack('component-script')

{{ $slot }}
