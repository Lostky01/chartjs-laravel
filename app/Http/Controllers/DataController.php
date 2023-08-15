<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\dataAngkatan;
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

    public function prepareChartDataAngkatan()
    {
        $chartDataAngkatan = Kelas::select('angkatan', DB::raw('count(*) as angkatan_count'))
            ->groupBy('angkatan')
            ->get();

        $angkatanNames = dataAngkatan::whereIn('id', $chartDataAngkatan->pluck('angkatan'))->pluck('name', 'id');

        $chartDataAngkatan = $chartDataAngkatan->map(function ($item) use ($angkatanNames) {
            $item->angkatan_name = $angkatanNames[$item->angkatan];
            return $item;
        });

        return $chartDataAngkatan;
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
        $angkatanNames = dataAngkatan::whereIn('id', $data->pluck('angkatan'))->pluck('name', 'id');

        $list_kelas = dataKelas::select('datakelas.id', 'datakelas.name')
        ->groupBy('datakelas.id', 'datakelas.name')
        ->orderBy('datakelas.name')
        ->get();

        $list_angkatan = dataAngkatan::select('dataangkatan.id', 'dataangkatan.name')
        ->groupBy('dataangkatan.id', 'dataangkatan.name')
        ->orderBy('dataangkatan.name')
        ->get();

        $chartDataAngkatan = $this->prepareChartDataAngkatan();
        $chartData = $this->prepareChartData();
        return view('dashboard', compact('data', 'chartData', 'chartDataAngkatan', 'classNames', 'list_kelas', 'list_angkatan', 'angkatanNames'));
    }

    public function create()
    {
        $datakelas = dataKelas::pluck('name');
        $dataangkatan = dataAngkatan::pluck('name');
        return view('create', compact('datakelas', 'dataangkatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'class' => 'required',
            'angkatan' => 'required',
        ]);

        $kelas = new Kelas();
        $kelas->name = $request->name;
        $dataKelas = dataKelas::where('name', $request->class)->first();
        if ($dataKelas) {
            $kelas->class = $dataKelas->id;
        }
        $dataAngkatan =  dataAngkatan::where('name', $request->angkatan)->first();
        if($dataAngkatan) {
            $kelas->angkatan = $dataAngkatan->id;
        }
        $kelas->save();

        return redirect()->route('dashboard')->with('success', 'Information created successfully.');
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'class' => 'required',
            'angkatan' => 'required',
        ]);

        $kelas->name = $request->input('name');
        $dataKelas = dataKelas::where('name', $request->input('class'))->first();
        if ($dataKelas) {
            $kelas->class = $dataKelas->id;
        }
        $dataAngkatan =  dataAngkatan::where('name', $request->input('angkatan'))->first();
        if($dataAngkatan) {
            $kelas->angkatan = $dataAngkatan->id;
        }
        $kelas->save();

        return redirect()->route('dashboard')->with('success', 'Information updated successfully.');
    }

    public function exportPdf()
    {
        $data = Kelas::all();
        $classNames = dataKelas::whereIn('id', $data->pluck('class'))->pluck('name', 'id');
        $angkatanNames = dataAngkatan::whereIn('id', $data->pluck('angkatan'))->pluck('name', 'id');
        $chartData = $this->prepareChartData();
    
        $pdf = PDF::loadView('pdf', compact('data', 'classNames','angkatanNames', 'chartData'));
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

    public function getAngkatan(Request $request)
    {
        $id = $request->id;
        $dataangkatan = Kelas::where('name', $id)->pluck('name', 'id');

        $options = '';
        foreach ($dataangkatan as $key => $item) {
            $options .= '<option value="' . $key . '">' . $item . '</option>';
        }

        return response()->json(['msg' => 'berhasil', 'id' => $id, 'data' => $options]);
    }

    public function getAngkatanEdit(Request $request)
    {
        $id = $request->id;
        $dataangkatan = Kelas::where('name', $id)->get();

        $option = "";
        foreach ($dataangkatan as $key => $item) {
            $option .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }

        return response()->json(['msg' => 'berhasil', 'id' => $id, 'data' => $option]);
    }
}