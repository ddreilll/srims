<x-system-layout title="404 Not Found">
    <x-slot:content>
        <div class="pt-lg-10">
            <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">404 Not Found</h1>
            <div class="fw-bold fs-3 text-muted mb-15">Sorry, this page isn't available.
                <br />The link you followed may be broken, or the page may have been removed.
            </div>
        </div>

        <div class="text-center mb-10">
            <a href="/home" class="btn btn-primary">
                <i class="fa-solid fa-arrow-left me-1"></i>
                {{ __('global.return_to', ['attribute' => __('global.home')]) }}
            </a>
        </div>

    </x-slot:content>
</x-system-layout>
