<div>
    <main class="main-content px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto">
        <h1 class="mb-8 text-3xl font-bold">Organizations</h1>
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center mr-4 w-full max-w-md">
                <form class="flex w-full bg-white rounded shadow"
                    x-data="{searchButton : false}">
                    <button type="button"
                            class="focus:z-10 px-4 hover:bg-gray-100 border-r focus:border-white rounded-l focus:ring md:px-6">
                        <div class="flex items-baseline"><span class="hidden text-gray-700 md:inline">Filter</span>
                            <svg class="w-2 h-2 fill-gray-700 md:ml-2"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 961.243 599.998">
                                <path d="M239.998 239.999L0 0h961.243L721.246 240c-131.999 132-240.28 240-240.624 239.999-.345-.001-108.625-108.001-240.624-240z"></path>
                            </svg>
                        </div>
                    </button>
                    <input class="relative px-6 py-3 w-full rounded-r focus:shadow-outline"
                           autocomplete="off"
                           type="text"
                           name="search"
                           placeholder="Name"
                            wire:model.live="search"
                    >
                    <template x-if="searchButton">
                        <button type="submit"
                                class="focus:z-10 px-4 hover:bg-gray-100 border-r focus:border-white rounded-l focus:ring md:px-6">
                            Search
                        </button>
                    </template>
                </form>
            </div>
            <a class="btn-indigo"
               href="/organizations/create" wire:navigate>
                <span>Create</span>
                <span class="hidden md:inline">&nbsp;Organization</span>
            </a>
        </div>
        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                <tr class="text-left font-bold">
                    <th class="pb-4 pt-6 px-6">Name</th>
                    <th class="pb-4 pt-6 px-6">City</th>
                    <th class="pb-4 pt-6 px-6"
                        colspan="2">Phone
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($this->organizations as $organization)
                    <tr class="hover:bg-gray-100 focus-within:bg-gray-100 relative">
                        <td class="border-t">
                            <a class="absolute inset-0"
                                                href="/organizations/{{ $organization->id }}/edit"
                                                wire:navigate
                                                wire:key="{{ $organization->id }}">
                            </a>
                            <p class="flex items-center px-6 py-4 focus:text-indigo-500 ">
                                {{ $organization->name }}
                            </p>
                        </td>
                        <td class="border-t">
                            <p class="flex items-center px-6 py-4"
                                                tabindex="-1"
                                                wire:key="{{ $organization->id }}"
                                                >
                                {{ $organization->city }}
                            </p>
                        </td>
                        <td class="border-t"><p class="flex items-center px-6 py-4"
                                                tabindex="-1"
                                                wire:key="{{ $organization->id }}"
                                                >{{ $organization->phone }}</p>
                        </td>
                        <td class="w-px border-t"><p class="flex items-center px-4"
                                                     tabindex="-1"
                                                     wire:key="{{ $organization->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20"
                                     class="block w-6 h-6 fill-gray-400">
                                    <polygon points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707"></polygon>
                                </svg>
                            </p>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $this->organizations->links('vendor.livewire.ping',['scrollTo' => false]) }}

        @if(request()->routeIs('organizations.create'))
            <livewire:modals.organizations-create />
        @endif
        @if(request()->routeIs('organizations.edit'))

            <livewire:modals.organizations-edit :$organization/>
        @endif
    </main>
</div>
