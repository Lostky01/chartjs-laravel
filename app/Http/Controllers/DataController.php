<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Imports\DataImport;
use App\Exports\DataExport;
use App\dataKelas;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use PDF;

class DataController extends Controller
{
    public function prepareChartData()
    {
        $chartData = Kelas::select('class', DB::raw('count(*) as student_count'))
            ->groupBy('class')
            ->get();

        $classNames = dataKelas::whereIn('id', $chartData->pluck('class'))->pluck('name', 'id');

        $chartData = $chartData->map(function ($item) use ($classNames) {
            $item->class_name = $classNames[$item->class];
            return $item;
        });

        return $chartData;
    }
    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);


        try {
            Excel::import(new DataImport(), $request->file('file'));
            return redirect()->back()->with('success', 'Data imported successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while importing data.');
        }
    }
    public function exportExcel()
    {
        return Excel::download(new DataExport(), 'data.xlsx');
    }
    public function index()
    {
        $data = Kelas::orderBy('created_at', 'desc')->get();
        $classNames = dataKelas::whereIn('id', $data->pluck('class'))->pluck('name', 'id');

        $chartData = $this->prepareChartData();
        return view('dashboard', compact('data', 'chartData', 'classNames'));
    }

    public function create()
    {
        $datakelas = dataKelas::pluck('name');
        return view('create', compact('datakelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'class' => 'required',
        ]);

        $kelas = new Kelas();
        $kelas->name = $request->name;
        $dataKelas = dataKelas::where('name', $request->class)->first();
        if ($dataKelas) {
            $kelas->class = $dataKelas->id;
        }
        /*  dd($request->all()); */
        $kelas->save();

        return redirect()->route('dashboard')->with('success', 'Information created successfully.');
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'class' => 'required',
        ]);

        $kelas->name = $request->input('name');
        $kelas->class = $request->input('class');



        $kelas->save();

        return redirect()->route('dashboard')->with('success', 'Information updated successfully.');
    }

    public function exportPdf()
    {
        $data = Kelas::all();
        $classNames = dataKelas::whereIn('id', $data->pluck('class'))->pluck('name', 'id');
        $chartData = $this->prepareChartData();
    
        $pdf = PDF::loadView('pdf', compact('data', 'classNames', 'chartData'));
        return $pdf->download('data.pdf');
    }
    




    public function destroy($id)
    {
        $data = Kelas::find($id);
        $data->delete();

        return redirect()->route('dashboard')->with('success', 'Information deleted successfully.');
    }


    public function getKelas(Request $request)
    {
        $id = $request->id;
        $datakelas = Kelas::where('name', $id)->pluck('name', 'id');

        $options = '';
        foreach ($datakelas as $key => $item) {
            $options .= '<option value="' . $key . '">' . $item . '</option>';
        }

        return response()->json(['msg' => 'berhasil', 'id' => $id, 'data' => $options]);
    }

    public function getKelasEdit(Request $request)
    {
        $id = $request->id;
        $datakelas = Kelas::where('name', $id)->get();

        $option = "";
        foreach ($datakelas as $key => $item) {
            $option .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }

        return response()->json(['msg' => 'berhasil', 'id' => $id, 'data' => $option]);
    }
}
