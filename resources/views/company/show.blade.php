<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $company->name }} - Details
            </h2>
            <a href="{{ route('companies.index') }}" class="text-sm text-gray-600 hover:underline">
                &larr; Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg border p-8">
                
                <div class="flex items-start gap-8">
                    <div class="flex-shrink-0">
                        @if($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" class="w-32 h-32 rounded border shadow-sm object-contain">
                        @else
                            <div class="w-32 h-32 bg-gray-100 flex items-center justify-center text-gray-400 border rounded">
                                No Logo
                            </div>
                        @endif
                    </div>

                    <div class="flex-1 space-y-4">
                        <div>
                            <h3 class="text-gray-500 text-sm uppercase font-bold tracking-wider">Company Name</h3>
                            <p class="text-xl font-semibold">{{ $company->name }}</p>
                        </div>

                        <div>
                            <h3 class="text-gray-500 text-sm uppercase font-bold tracking-wider">Email</h3>
                            <p class="text-gray-700">{{ $company->email ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <h3 class="text-gray-500 text-sm uppercase font-bold tracking-wider">Website</h3>
                            @if($company->website)
                                <a href="{{ $company->website }}" target="_blank" class="text-blue-600 hover:underline">
                                    {{ $company->website }}
                                </a>
                            @else
                                <p class="text-gray-400">N/A</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t flex gap-3">
                    <a href="{{ route('companies.edit', $company->id) }}" class="bg-indigo-600 text-white px-4 py-2 rounded text-sm font-bold">
                        Edit
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>