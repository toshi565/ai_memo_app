<?php

use function Livewire\Volt\{state};
use App\Models\Memo;

state(['memos' => fn() => Memo::latest()->get()]);

?>

<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">メモ一覧</h2>
                    <a href="{{ route('memos.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        新規メモ作成
                    </a>
                </div>

                <div class="space-y-4">
                    @foreach ($memos as $memo)
                        <div class="p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-150">
                            <a href="{{ route('memos.show', $memo) }}" class="block">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $memo->title }}</h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    作成日: {{ $memo->created_at->format('Y年m月d日') }}
                                </p>
                            </a>
                        </div>
                    @endforeach

                    @if ($memos->isEmpty())
                        <p class="text-gray-500 text-center py-4">メモがありません</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
