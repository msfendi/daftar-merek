<?php

namespace App\Http\Controllers;

use App\Models\LogAccount;
use App\Models\Role;
use App\Models\User;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {


        $user = User::find(auth()->user()->id);
        if (!$user->hasRole('admin')) {
            $role = Role::where('name', 'pemohon')->first();
            $user->syncRoles($role);
        }

        $columnChartModel =
            (new ColumnChartModel())
            ->setTitle('Expenses by Type')
            ->addColumn('Food', 100, '#f6ad55')
            ->addColumn('Shopping', 200, '#fc8181')
            ->addColumn('Travel', 300, '#90cdf4')
            ->withoutDataLabels();
        return view('admin.dashboard', compact('columnChartModel'));
    }
}
