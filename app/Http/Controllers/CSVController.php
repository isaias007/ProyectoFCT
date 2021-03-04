<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Exports\AlumnoExport;

use App\Imports\AlumnoImport;

use App\Models\Alumno;

use Maatwebsite\Excel\Facades\Excel;



class CSVController extends Controller

{

    /**

     * @return \Illuminate\Support\Collection

     */

    public function importExportView()

    {

        return view('csv.import');
    }



    /**

     * @return \Illuminate\Support\Collection

     */

    public function export()

    {

        return Excel::download(new AlumnoExport, 'alumnos.xlsx');
    }



    /**

     * @return \Illuminate\Support\Collection

     */

    public function import(Request $request)

    {

        Excel::import(new AlumnoImport, request()->file('file'));

        $request->session()->flash('realizado','Alumnos importados por CSV'); 

        return redirect('/');

        
    }
}
