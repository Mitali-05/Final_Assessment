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
            {{ __('Category Wise Expenses') }}
        </h3>
    </x-slot>
    <main class="container" style="margin-top:35px">
        @foreach($expenses as $category => $units)
                <details>
                    <summary>
                        <div style="display: flex; justify-content: space-between; ">
                            <strong><h3 style="margin: 0;">{{ $category }}</h3></strong>
                            <strong style="margin: 0;">Total Expense: ₹{{ $units->sum('amount') }}</strong>
                        </div>
                    </summary>
                    <p>
                        <table>
                            <tr>
                                <th>#</th>
                                <th>Amount</th>
                                <th>Note</th>
                                <th>Date</th>
                            </tr>
                           
                            @foreach ($units as $i=>$expense)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>₹{{ $expense->amount}}</td>
                                <td>
                                    @if($expense->note)
                                        {{ $expense->note}}
                                    @else
                                        --
                                    @endif
                                </td> 
                                <td>{{ date('jS M Y', strtotime($expense->date)) }} </td>  
                            </tr>
                            @endforeach
                            
                        </table>
                    </p>
                </details>
                <hr>
            @endforeach
    </main>
    
</x-app-layout>