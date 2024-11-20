<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Wise Expenses') }}
        </h3>
    </x-slot>

    <main class="container">
        <?php foreach ($expenses as $category => $units): ?>
                <details>
                    <summary><strong>{{ $category }} </strong></summary>
                    <p>
                        <table>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Amount</th>
                                <th>Note</th>
                                <th>Date</th>
                            </tr>
                           
                            @foreach ($units as $i=>$expense)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $expense->amount}}</td>
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
                    </p>
                </details>
                <hr>
            <?php endforeach ?>
    </main>
    
</x-app-layout>