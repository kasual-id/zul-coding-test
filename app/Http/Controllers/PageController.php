<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\GooglesheetService;

class PageController extends Controller
{
   public function __construct(GooglesheetService $gsheet) {
      $this->gsheet = $gsheet;
      $this->spreadsheetId = config('googlesheet.spreadsheet_id'); 
      $this->sheet_name = config('googlesheet.spreadsheet_sheet_name'); 
      $this->sheet_id = config('googlesheet.spreadsheet_sheet_id'); 
      $this->column_start = config('googlesheet.spreadsheet_col_start'); 
      $this->column_end = config('googlesheet.spreadsheet_col_end'); 
      $this->row_start = config('googlesheet.spreadsheet_row_start'); 
   }

   private function getData() {
      return $this->gsheet->get($this->spreadsheetId, 
                                 $this->sheet_name, 
                                 $this->column_start,  
                                 $this->column_end,  
                                 $this->row_start
                              );
   }

   public function index() {
      $data = $this->getData();
      return view('dashboard', compact('data'));
   }

   public function search(Request $request) {
      $data = $this->getData();
      $keyword = strtolower($request->keyword); 
      if($keyword != '') {
         $result = array_filter($data, function($index) use ($keyword){
            return   strtolower($index['0']) == $keyword || 
                     strtolower($index['1']) == $keyword ||
                     strtolower($index['2']) == $keyword ||
                     strtolower($index['3']) == $keyword ||
                     strtolower($index['4']) == $keyword ||
                     strtolower($index['5']) == $keyword;
            }, ARRAY_FILTER_USE_BOTH); 
         $data = $result;
      }
      return view('dashboard', compact('data'));  
   }

   public function edit(Request $request) { 
      $range_start = $request->range_start;
      $range_end = $request->range_end;
      $range     = $this->sheet_name.'!'.$range_start.':'.$range_end;
      $values[] = [ $request->no, 
                    $request->firstname,
                    $request->lastname,
                    $request->email,
                    $request->gender,
                    $request->ip ];

      $this->gsheet->update($this->spreadsheetId, $range, $values);
      return redirect('/')->with('status', 'Data telah di update');
   }


   public function delete(Request $request) {
      $row_index = $request->row_index;
      $this->gsheet->delete($this->spreadsheetId, $this->sheet_id, $row_index);
      return redirect('/')->with('status', 'Data telah di hapus');
   }

   public function insert(Request $request) {
      $data = $this->getData();
      $lastRow = end($data);
      $range_start = $lastRow['rangeStart'];
      $range_start++;
      $range_end = $lastRow['rangeEnd'];
      $range_end++;
      $range     = $this->sheet_name.'!'.$range_start.':'.$range_end;
      $values[] = [ $request->no, 
                    $request->firstname,
                    $request->lastname,
                    $request->email,
                    $request->gender,
                    $request->ip ];
      $this->gsheet->update($this->spreadsheetId, $range, $values);
      return redirect('/')->with('status', 'Data telah di tambah');
   }
}