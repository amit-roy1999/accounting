<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="my-4">amount recived</h1>
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>email</th>
                                <th>amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($amountRecived as $item)
                                <tr>
                                    <td>{{ $item->sender->name }}</td>
                                    <td>{{ $item->sender->email }}</td>
                                    <td>{{ $item->amount }}</td>
                                </tr>
                            @empty
                                no data
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="my-4">amount sended</h1>
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>email</th>
                                <th>amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($amountSend as $item)
                                <tr>
                                    <td>{{ $item->recivers->name }}</td>
                                    <td>{{ $item->recivers->email }}</td>
                                    <td>{{ $item->amount }}</td>
                                </tr>
                            @empty
                                no data
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
