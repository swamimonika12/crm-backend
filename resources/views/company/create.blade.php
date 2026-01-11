<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>

    <x-slot name="header">
        <div class="max-w-4xl mx-auto">
            <h2 class="font-extrabold text-2xl text-gray-900 leading-tight">
                {{ __('New Company') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-2xl shadow-indigo-100/50 rounded-2xl overflow-hidden border border-gray-100">
                
                <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="p-8 md:p-12">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                            
                            <div class="md:col-span-2">
                                <label class="block text-xs font-black uppercase tracking-widest text-indigo-600 mb-2">Company Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" 
                                       class="w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 transition-all placeholder:text-gray-300"
                                       placeholder="Enter official company name...">
                                @error('name') <p class="mt-2 text-xs text-red-500 font-bold flex items-center"><span class="mr-1">⚠️</span> {{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" 
                                       class="w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-400 transition-all placeholder:text-gray-300"
                                       placeholder="corporate@domain.com">
                            </div>

                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Website URL</label>
                                <input type="url" name="website" value="{{ old('website') }}" 
                                       class="w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-400 transition-all placeholder:text-gray-300"
                                       placeholder="https://">
                            </div>

                            <div class="md:col-span-2 bg-indigo-50/50 p-6 rounded-2xl border-2 border-dashed border-indigo-100">
                                <label class="block text-xs font-black uppercase tracking-widest text-indigo-500 mb-3">Corporate Logo</label>
                                <div class="flex items-center space-x-6">
                                    <div class="shrink-0">
                                        <div class="h-16 w-16 bg-white rounded-xl border-2 border-indigo-100 flex items-center justify-center text-indigo-200">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    </div>
                                    <label class="block w-full">
                                        <input type="file" name="logo" 
                                               class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 cursor-pointer">
                                    </label>
                                </div>
                                <p class="mt-3 text-[10px] text-gray-400 font-medium">IMAGE REQUIREMENTS: MINIMUM 100x100PX (PNG, JPG, SVG)</p>
                                @error('logo') <p class="mt-2 text-xs text-red-500 font-bold flex items-center italic">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="px-8 py-6 bg-gray-50/80 border-t border-gray-100 flex items-center justify-between">
                        <a href="{{ route('companies.index') }}" class="text-sm font-bold text-gray-400 hover:text-gray-600 transition-all">
                            ← Back to List
                        </a>
                        <button type="submit" 
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-extrabold py-3 px-10 rounded-xl shadow-xl shadow-indigo-200 transform hover:-translate-y-0.5 active:translate-y-0 transition-all">
                            Create Company
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>