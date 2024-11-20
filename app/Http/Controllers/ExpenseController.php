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
        // $expenses = DB::table('expenses')->ddRawSql();

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

}