<x-app-layout>
    <x-slot name="header">
        <h4 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Expenses of Last 12 Months') }}
        </h4>
    </x-slot>

    <main class="container">
            @foreach ($expenses as $monthD)
                <div style="display: flex; justify-content: space-between;">
                    <strong><h3 style="margin: 0;">{{ $monthD->month }}</h3></strong>
                    <strong style="margin: 0;">Total Expense: ₹{{ number_format($monthD->total, 2) }}</strong>
                </div>
                <p>
                    <table>
                        <tr>
                            <th>#</th>
                            <th>Amount</th>
                            <th>Category</th>
                            <th>Note</th>
                            <th>Date</th>
                        </tr>
                        
                        @foreach ($monthD->expenses as $expense)
                        <tr>
                            <td>{{ $expense->id }}</td>
                            <td>₹{{ number_format($expense->amount, 2) }}</td>
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
