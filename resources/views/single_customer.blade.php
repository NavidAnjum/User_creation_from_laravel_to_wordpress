<style>
    .btn {
        @apply font-bold py-2 px-4 rounded;
    }
    .btn-blue {
        @apply bg-blue-500 text-white;
    }
    .btn-blue:hover {
        @apply bg-blue-700;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="border-collapse border border-slate-400">
                        <thead>
                        <tr>
                            <th class="border border-slate-300">Name</th>
                            <th class="border border-slate-300">Phone</th>
                            <th class="border border-slate-300">Email</th>
                            <th class="border border-slate-300">Budget</th>
                            <th class="border border-slate-300">Message</th>


                        </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <td class="border border-slate-300">{{ $user->name }}</td>
                                <td class="border border-slate-300"> {{$user->phone}}</td>
                                <td class="border border-slate-300">  {{$user->email}}</td>
                                <td class="border border-slate-300">  {{$user->budget}}</td>
                                <td class="border border-slate-300">  {{$user->message}}</td>

                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
