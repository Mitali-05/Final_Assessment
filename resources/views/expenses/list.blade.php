<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of All Expenses') }}
        </h3>
    </x-slot>

    <table>
        <tr>
            <th>Sr. No.</th>
            <th>Amount</th>
            <th>Category</th>
            <th>Note</th>
            <th>Date</th>
        </tr>
       
        @foreach ($expenses as $i=>$expense)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $expense->amount}}</td>
            <td>{{ $expense->category}}</td>
            <td>{{ $expense->note}}</td>
            <td>
                @if($expense->date)
                    {{ date('jS M Y', strtotime($expense->date)) }} 
                @else
                    --
                @endif
            </td>   
        </tr>
        @endforeach
        
    </table>
</x-app-layout>
