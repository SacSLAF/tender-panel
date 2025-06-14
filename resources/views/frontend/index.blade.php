@extends('layouts.auth')
@section('title', 'Frontend')
@section('content')
    @if ($errors->any())
        <div class="max-w-md mx-auto mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
        <div class="max-w-md mx-auto mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('status') }}
        </div>
    @endif
    <div class="max-w-md mx-auto rounded shadow">
        <div class="bg-white p-8">
            <h2 class="text-2xl font-bold mb-6 text-center">Welcome to the Frontend</h2>
            <p class="font-bold text-gray-700 mb-4">
                Tenders Details
            </p>
        </div>

    </div>
    <div class="flex flex-wrap flex-row md:flex-row gap-2 max-w-6xl mx-auto mt-8">
        @foreach ($tenders as $tender)
            <div class="w-full sm:w-1/2 md:w-1/3">
                <a href="#"
                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 transition-colors duration-300">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $tender->tender_no }}
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400 mb-1">
                        Category: {{ $tender->category }}
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Deadline: {{ $tender->entitled_to_quote }}
                    </p>
                </a>
            </div>
        @endforeach
    </div>



@endsection
