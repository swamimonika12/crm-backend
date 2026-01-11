<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                {{ __('Company Management') }}
            </h2>
            <a href="{{ route('companies.create') }}" 
               class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition-all flex items-center">
               <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
               Add New Company
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 shadow-sm rounded-r-lg">
                    <p class="font-bold text-sm">{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-100 text-gray-700 uppercase font-semibold text-xs border-b">
                            <tr>
                                <th class="px-6 py-4">Logo</th>
                                <th class="px-6 py-4">Company Details</th>
                                <th class="px-6 py-4">Website</th>
                                <th class="px-6 py-4 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($companies as $company)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="h-14 w-14 rounded-lg border bg-white flex items-center justify-center overflow-hidden">
                                        @if($company->logo)
                                            <img src="{{ asset('storage/' . $company->logo) }}" class="object-contain h-full w-full">
                                        @else
                                            <span class="text-gray-300 text-xs uppercase font-bold">No Logo</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-base font-bold text-gray-900">{{ $company->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $company->email }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ $company->website }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 underline flex items-center">
                                        {{ Str::limit($company->website, 25) }}
                                        <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center space-x-3">
                                        {{-- Edit Button --}}
                                        <a href="{{ route('companies.edit', $company->id) }}" 
                                           class="text-blue-600 hover:bg-blue-50 p-2 rounded-full transition-colors" title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>

                                        {{-- Delete Button --}}
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Permanent delete this company?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:bg-red-50 p-2 rounded-full transition-colors" title="Delete">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>

                                        {{-- view --}}
                                        <a href="{{ route('companies.show', $company->id) }}" 
                                        class="text-emerald-600 hover:bg-emerald-50 p-2 rounded-full transition-colors" 
                                        title="View Details">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-gray-500 italic">
                                    No companies found. Click "Add New Company" to get started.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                {{-- Pagination Footer --}}
                <div class="bg-gray-50 px-6 py-4 border-t">
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>