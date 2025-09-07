<?php

use function Livewire\Volt\{state};
use App\Models\Memo;

state(['memos' => fn() => Memo::latest()->get()]);

?>

<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold mb-4">メモ一覧</h2>

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
