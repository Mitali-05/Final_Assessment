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
        <h4 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Expenses of Last 12 Months') }}
        </h4>
    </x-slot>

    <main class="container" style="margin-top:35px">
            @foreach ($expenses as $monthD)
                <div style="display: flex; justify-content: space-between;">
                    <strong><h3 style="margin: 0;">{{ $monthD->month }}</h3></strong>
                    <strong style="margin: 0;">Total Expense: ₹{{ $monthD->total }}</strong>
                </div>
                <p>
                    <table>
                        <tr>
                            <th style="font-weight: bold;">#</th>
                            <th style="font-weight: bold;">Amount</th>
                            <th style="font-weight: bold;">Category</th>
                            <th style="font-weight: bold;">Note</th>
                            <th style="font-weight: bold;">Date</th>
                        </tr>
                        
                        @foreach ($monthD->expenses as $expense)
                        <tr>
                            <td>{{ $expense->id }}</td>
                            <td>₹{{$expense->amount}}</td>
                            <td>{{ $expense->category}}</td>
                            <td>
                                @if($expense->note)
                                    {{$expense->note}}
                                @else
                                    --
                                @endif
                            </td>   
                            <td>{{ date('d M Y', strtotime($expense->date)) }}</td>
                            
                        </tr>
                        @endforeach
                        
                    </table>
                </p>
                <hr>
            @endforeach
    </main>

</x-app-layout>
