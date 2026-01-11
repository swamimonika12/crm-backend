    <x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Employee Details') }}
            </h2>
            <a href="{{ route('employees.index') }}" class="text-gray-600 hover:text-gray-900 text-sm font-medium">
                &larr; Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border">
                
                <div class="p-8 bg-white">
                    <div class="flex flex-col md:flex-row gap-8">
                        
                        {{-- Profile Image Section --}}
                        <div class="flex-shrink-0 text-center">
                            <div class="h-32 w-32 mx-auto">
                                @if($employee->profile_img)
                                    <img src="{{ asset('storage/' . $employee->profile_img) }}" class="h-32 w-32 rounded-full object-cover border-2 border-gray-100 shadow-sm">
                                @else
                                    <div class="h-32 w-32 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 text-sm border-2 border-dashed border-gray-200">
                                        No Image
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Details Section --}}
                        <div class="flex-1 border-t md:border-t-0 md:border-l border-gray-100 pt-6 md:pt-0 md:pl-8">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Full Name</label>
                                    <p class="mt-1 text-gray-900 font-medium">{{ $employee->first_name }} {{ $employee->last_name }}</p>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Company Name</label>
                                    <p class="mt-1 text-gray-900 font-medium">{{ $employee->company->name }}</p>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Email</label>
                                    <p class="mt-1 text-gray-900 font-medium">{{ $employee->email }}</p>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Phone Number</label>
                                    <p class="mt-1 text-gray-900 font-medium">{{ $employee->phone ?? 'Not provided' }}</p>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Company</label>
                                    @if($employee->company && $employee->company->website)
                                        <a href="{{ $employee->company->website }}" target="_blank" class="mt-1 block text-indigo-600 hover:underline">
                                            {{ $employee->company->website }}
                                        </a>
                                    @else
                                        <p class="mt-1 text-gray-500">N/A</p>
                                    @endif
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Created Date</label>
                                    <p class="mt-1 text-gray-900 font-medium">{{ $employee->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Footer Actions --}}
                <div class="px-6 py-4 bg-gray-50 border-t flex justify-end space-x-3">
                    <a href="{{ route('employees.edit', $employee->id) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition ease-in-out duration-150">
                        Edit Profile
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>