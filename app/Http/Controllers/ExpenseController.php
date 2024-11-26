<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function index()
    {
       //
    }
    
    
    public function list()
    {
        $expenses = DB::table('expenses')->get();

        return view('expenses.list', [
            'expenses' => $expenses
        ]);
    }

    public function categories()
    {
        $expenses = DB::table('expenses')->get()->groupBy('category');

        return view('expenses.categories', [
            'expenses' => $expenses
        ]);

    }

    public function last12months()
    {
        $startDate = date('Y-m-01', strtotime('-11 months'));
        $endDate = date('Y-m-t');

        $expenses = Expense::whereBetween('date', [$startDate, $endDate])
            ->orderBy('date', 'desc')
            ->get()
            ->groupBy(function ($expense) {
                return date('Y-m', strtotime($expense->date));
            });

        $monthlyExpenses = [];
        foreach ($expenses as $month => $monthExpenses) {
            $monthlyExpenses[] = (object) [
                'month' => date('F Y', strtotime($month . '-01')),
                'total' => $monthExpenses->sum('amount'),
                'expenses' => $monthExpenses,
            ];
        }

        return view('expenses.last12months', [
            'expenses' => $monthlyExpenses
        ]);

    }

}