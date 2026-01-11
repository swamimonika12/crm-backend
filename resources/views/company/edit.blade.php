<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>

    <x-slot name="header">
        <div class="max-w-4xl mx-auto">
            <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">
                {{ __('Edit Company Profile') }}
            </h2>
            <p class="text-sm text-gray-500 mt-1">Update the information for <span class="text-indigo-600 font-bold">{{ $company->name }}</span>.</p>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-2xl shadow-indigo-100/50 rounded-2xl overflow-hidden border border-gray-100">
                
                {{-- Note the route and the PUT method --}}
                <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="p-8 md:p-12">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                            
                            <div class="md:col-span-2">
                                <label class="block text-xs font-black uppercase tracking-widest text-indigo-600 mb-2">Company Identity</label>
                                <input type="text" name="name" value="{{ old('name', $company->name) }}" 
                                       class="w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all"
                                       placeholder="Company Name">
                                @error('name') <p class="mt-2 text-xs text-red-500 font-bold italic">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Business Email</label>
                                <input type="email" name="email" value="{{ old('email', $company->email) }}" 
                                       class="w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-400 transition-all">
                            </div>

                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Website URL</label>
                                <input type="url" name="website" value="{{ old('website', $company->website) }}" 
                                       class="w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-400 transition-all">
                            </div>

                            <div class="md:col-span-2 bg-indigo-50/50 p-6 rounded-2xl border-2 border-dashed border-indigo-100">
                                <label class="block text-xs font-black uppercase tracking-widest text-indigo-500 mb-3">Update Corporate Logo</label>
                                
                                <div class="flex flex-col md:flex-row items-center gap-6">
                                    <div class="shrink-0 text-center">
                                        <div class="h-20 w-20 bg-white rounded-xl border-2 border-indigo-100 flex items-center justify-center overflow-hidden shadow-sm">
                                            @if($company->logo)
                                                <img src="{{ asset('storage/' . $company->logo) }}" class="object-contain h-full w-full">
                                            @else
                                                <svg class="w-8 h-8 text-indigo-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            @endif
                                        </div>
                                        <p class="mt-2 text-[10px] text-indigo-400 font-bold uppercase tracking-tighter">Current Logo</p>
                                    </div>

                                    <div class="grow">
                                        <label class="block w-full">
                                            <input type="file" name="logo" 
                                                   class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-white file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer transition-all shadow-sm border border-indigo-100">
                                        </label>
                                        <p class="mt-3 text-[10px] text-gray-400 font-medium">LEAVE BLANK TO KEEP CURRENT LOGO • MIN 100x100PX</p>
                                    </div>
                                </div>
                                @error('logo') <p class="mt-2 text-xs text-red-500 font-bold italic">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="px-8 py-6 bg-gray-50/80 border-t border-gray-100 flex items-center justify-between">
                        <a href="{{ route('companies.index') }}" class="text-sm font-bold text-gray-400 hover:text-gray-600 transition-all">
                            ← Cancel Changes
                        </a>
                        <button type="submit" 
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-extrabold py-3 px-10 rounded-xl shadow-xl shadow-indigo-200 transform hover:-translate-y-0.5 active:translate-y-0 transition-all">
                            Save Changes
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>