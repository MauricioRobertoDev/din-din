{{-- navigation --}}
<nav
    x-show="openMenu"
    x-on:click.outside="openMenu = false"
    x-transition:enter-start="opacity-0 -left-full"
    x-transition:enter-end="opacity-100 left-0"
    x-transition:leave-start="opacity-100 left-0"
    x-transition:leave-end="opacity-0 -left-full"
    class="fixed bg-white shadow-xl flex lg:!flex flex-col justify-between lg:relative top-0 z-50 flex-grow-0 h-screen pt-16 transition-all duration-200 transform lg:!left-0 lg:pt-0 w-80"
>
    <div class="flex-grow overflow-y-auto ">
        <div class="hidden p-4 lg:block">
            <x-icon.logo class="w-6 h-6 text-primary-500" />
        </div>

        <x-menu.item
            icon="home"
            text="Dashboard"
            :href="route('dashboard')"
            :active="request()->routeIs('dashboard')"
        />

        <x-menu.item
            icon="arrows-up-down"
            text="Transações"
            href="#"
            :active="false"
        />

        <x-menu.item
            icon="trending-up"
            text="Entradas"
            href="#"
            :active="false"
        />

        <x-menu.item
            icon="trending-down"
            text="Saídas"
            href="#"
            :active="false"
        />

        <x-menu.item
            icon="bank"
            text="Contas"
            href="#"
            :active="false"
        />

        <x-menu.item
            icon="flag"
            text="Categorias"
            href="#"
            :active="false"
        />
    </div>

    <div class="flex items-center flex-grow-0 w-full h-20 border-t">
        <a
            href="{{ route('profile.edit') }}"
            class="flex flex-col justify-center flex-grow h-20 px-4 truncate hover:bg-gray-100"
        >
            <p class="truncate">{{ auth()->user()->name }}</p>
            <p class="text-xs text-gray-500 uppercase">Conta</p>
        </a>

        <form
            method="POST"
            action="{{ route('logout') }}"
            class="h-full"
        >
            @csrf
            <button
                type="submit"
                class="flex items-center justify-center flex-grow-0 h-full px-4 text-gray-500 hover:bg-red-100 hover:text-red-500"
            >
                <x-icon.power />
            </button>
        </form>

    </div>
</nav>

{{-- top bar --}}
<div
    class="fixed top-0 left-0 z-50 flex items-center justify-between w-full h-16 px-4 bg-white shadow grow-0 lg:hidden">

    <button type="button">
        <x-icon.logo class="w-6 h-6 text-primary-500" />
    </button>

    <button
        type="button"
        x-show="!openMenu"
        x-on:click.prevent="$dispatch('toggle-menu')"
    >
        <x-icon.bars class="w-6 h-6 text-gray-700" />
    </button>

    <button
        type="button"
        x-show="openMenu"
        x-on:click.prevent="$dispatch('toggle-menu')"
    >
        <x-icon.x class="w-6 h-6 text-gray-700" />
    </button>
</div>
