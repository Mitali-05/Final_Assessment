<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Expense Tracker</title>
    <link
        rel="stylesheet"
        href="/pico.min.css"
    />
</head>
<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of All Expenses') }}
        </h3>
    </x-slot>

    <main class="container" style="margin-top:35px">
        <table>
            <tr>
                <th>#</th>
                <th>Amount</th>
                <th>Category</th>
                <th>Note</th>
                <th>Date</th>
            </tr>
        
            @foreach ($expenses as $i=>$expense)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>₹{{ $expense->amount}}</td>
                <td>{{ $expense->category}}</td>
                <td>
                    @if($expense->note)
                        {{ $expense->note}}
                    @else
                        --
                    @endif
                </td>   
                <td>{{ date('jS M Y', strtotime($expense->date)) }}</td>
            </tr>
            @endforeach
            
        </table>
    </main>
</x-app-layout>
