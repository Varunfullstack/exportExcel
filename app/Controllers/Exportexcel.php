<?php 
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
//use PhpOffice\PhpSpreadsheet\PHPExcel_IOFactory\

class Exportexcel extends Controller
{
    
    public function index(){
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('id', 'ASC')->findAll();
        return view('export_view',$data); 

        
    } 
     
    public function export_data(){

        $userModel = new UserModel();
        $usersData = $userModel->orderBy('id', 'ASC')->findAll(); 
        // file name 
        $filename = 'users_'.date('Ymd').'.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/csv; ");
        
       // get data 
        
        // file creation 
        $file = fopen('php://output','w');
        $header = array("Id","Name","Enail" ); 
        fputcsv($file, $header);
        foreach ($usersData as $key=>$line){ 
            fputcsv($file,$line); 
        }
        fclose($file); 
        exit; 
    }


     
}