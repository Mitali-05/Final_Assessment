<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Expense Tracker</title>
    <link
        rel="stylesheet"
        href="/pico.min.css"
    />
    <style>
        .A{
            color: black;
            margin-top: 6px;
        }
        .B{
            border: 1px solid black  !important;
            height: 50px;
            padding: 10px;
            width: 650px;
            border-radius: 0%;
        }
    </style>
</head>
<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add an Expense') }}
        </h3>
    </x-slot>

    <main class="container" style="height:600px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
        <form method="POST" action="{{ route('expenses.store') }}">
            @csrf
            <label  class="A">Amount(₹)</label>
            <input class="B" type="float" name="amount" required >
            <label class = "A" style="margin-top: -10px">Category</label>
            <select id="category" name="category" class="B">
                <option value="" disabled selected>Select a category</option>
                <option value="groceries">Groceries</option>
                <option value="healthcare">HealthCare</option>
                <option value="travel">Travel</option>
                <option value="dining_out">Dining Out</option>
                <option value="clothing">Clothing</option>
                <option value="bills">Bills</option>
                <option value="fitness">Fitness</option>
                <option value="others">Others</option>
              </select>
            <label class="A">Date</label>
            <input class="B" type="date" name="date" required>
            <label class="A" style="margin-top: -11px">Note</label>
            <input class="B" type="text" name="note">
            <input type="submit" value="Add Expense">
        </form>   
            
            
      
    </main>
</x-app-layout>