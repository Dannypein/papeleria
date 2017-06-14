<?php namespace papeleria\Http\Controllers;

use Carbon\Carbon;
use DB;
use Excel;
use papeleria\Http\Requests\ImportarArticulosRequest;
use papeleria\products;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class productscontroller extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return view('welcome');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int $id
   * @return Response
   */
  public function update($id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   * @return Response
   */
  public function destroy($id)
  {
    //
  }

  public function formImportar()
  {
    return view('importar', ['title' => 'Importar artículos']);
  }

  public function importar(ImportarArticulosRequest $request)
  {
    $inicio = Carbon::now();

    $imported = $this->importProductsFromUploadedFile($request);
    $data     = [
      'articulos'       => $imported,
      'total_articulos' => products::count(),
      'tiempo_segundos' => Carbon::now()->diffInSeconds($inicio),
    ];

    return view('importados', $data);
  }

  /**
   * @param UploadedFile $uploaded
   *
   * @return string
   */
  protected function copyUploadedFileToTempDirectory($uploaded)
  {
    $file = sys_get_temp_dir() . '/' . $uploaded->getClientOriginalName();
    copy($uploaded->getRealPath(), $file);

    return $file;
  }

  /**
   * @param ImportarArticulosRequest $request
   *
   * @return array
   */
  protected function importProductsFromUploadedFile(ImportarArticulosRequest $request)
  {
    $uploaded = $request->file('archivo');
    $file = $this->copyUploadedFileToTempDirectory($uploaded);

    $imported = [];
    $processChunk = $this->generateClosureForChunkProcessing($imported);
    Excel::filter('chunk')->selectSheetsByIndex(0)->load($file)->chunk(1000, $processChunk);

    return $imported;
  }

  /**
   * @param array $imported
   *
   * @return \Closure
   */
  protected function generateClosureForChunkProcessing(&$imported)
  {
    return function ($results) use (&$imported) {
      $articles = [];

      foreach ($results as $row) {
        $articles[] = products::createFromCSV($row);
      }

      if (DB::table('products')->insert($articles)) {
        $imported = array_merge($imported, $articles);
      };
    };
  }

}
