<x-app-layout>
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-4">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $user->name }}さんの日々の体調ログ一覧</h1>
            </div>

            <div class="overflow-x-auto">
                <table class="table-auto w-full text-left">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600">
                            <th class="px-6 py-3">日付</th>
                            <th class="px-6 py-3">気分</th>
                            <th class="px-6 py-3">元気度</th>
                            <th class="px-6 py-3">睡眠の質</th>
                            <th class="px-6 py-3">コメント</th>
                            <th class="px-6 py-3">編集/削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logsByDay as $log)
                            <tr class="border-b">
                                <td class="px-6 py-3">{{ $log->input_date }}</td>
                                <td class="px-6 py-3">
                                    {{ $log->convertedMood }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $log->convertedEnergy }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $log->convertedSleep }}
                                </td>
                                <td class="px-6 py-3">
                                    @if($log->comments)
                                        {{ $log->comments }}
                                    @else
                                        <span class="text-gray-500">無し</span>
                                    @endif
                                </td>
                                <td class="px-6 py-3">
                                    <a href="{{ route('wellness.edit', $log->id) }}" class="text-indigo-500 hover:text-indigo-600">編集/削除</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-app-layout>