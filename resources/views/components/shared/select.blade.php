<div class="group pb-1 relative">
    <button class="peer flex justify-center items-center gap-2">
        {{ __('English') }}
        <x-UI.select-arrow />
    </button>

    <ul class="mt-1 py-1 px-2 absolute right-0 text-right invisible group-hover:visible peer-focus:visible border rounded-md">
        <li>
            <form action="{{ route('language', ['locale' => 'en']) }}">
                <button type="submit" class="flex w-full justify-end items-center gap-1">
                    <x-UI.flag-uk />
                    English
                </button>
            </form>
        </li>
        <li>
            <form action="{{ route('language', ['locale' => 'ka']) }}">
                <button type="submit" class="flex w-full mt-1 justify-end items-center gap-1">
                    <x-UI.flag-geo />
                    ქართული
                </button>
            </form>
        </li>
    </ul>
</div>