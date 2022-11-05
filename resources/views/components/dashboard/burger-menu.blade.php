<div>
    <button class="peer block md:hidden">
        <x-UI.burger-icon />
    </button>

    <div 
        class="bg-neutral-100 flex mt-3 px-5 py-3 flex-col items-end gap-2 fixed left-full translate-x-0 peer-focus:-translate-x-full transition-transform ease-out duration-300 border-y border-l border-neutral-200 rounded-l-xl"
    >
        <span class="text-base font-bold capitalize">{{ auth()->user()->name }}</span>
        <div class="bg-neutral-200 w-full h-[1px]"></div>
        <form action="{{ route('auth.logout') }}" method="post">
            @csrf()
            <button type="submit">Log Out</button>
        </form>
    </div>
</div>