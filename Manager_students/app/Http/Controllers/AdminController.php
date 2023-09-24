<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RequestLop;
use App\Models\Lop;
use App\Http\Requests\RequestNo;
use App\Models\No;
use App\Http\Requests\RequestMonhoc;
use App\Models\Monhoc;
use App\Http\Requests\RequestDiemdanh;
use App\Models\Diemdanh;
use App\Http\Requests\RequestHocsinh;
use App\Models\Hocsinh;

use Session;
use DB;
use App\Quotation;
use Carbon\Carbon;
use PDF;

class AdminController extends Controller
{
    //--------------------------------LOP---------------------------------
    public function lop()
    {
        $lop = Lop::select()->get();
  
        $data = [
            'lops' => $lop
        ];
        // dd($data);
        return view('pages.lop.index', $data);
    }
    public function create_lop()
    {
        return view('pages.lop.create');
    }
    public function store_lop( RequestLop $requestLop)
    {
        $lop = new Lop();
        $lop->lop_name = $requestLop->name_lop;
        $lop->save();
    //    dd($lop);

        Session::put('message', 'Success');
        return redirect()->back();
    }
    public function edit_lop($id)
    {
        $lop = Lop::find($id);
        return view('pages.lop.update', compact('lop'));
    }
    public function update_lop(RequestLop $requestLop, $id)
    {
        $lop = Lop::find($id);
        $lop->lop_name = $requestLop->name_lop;
        $lop->save();
        Session::put('message', 'Success');
        return redirect()->back();
    }
    public function delete_lop($id)
    {
        $lop = Lop::find($id);
        $lop->delete();
        Session::put('message_delete', 'Delete Success');
        return redirect()->back();
    }

      //--------------------------------MÔN HỌC---------------------------------
      public function monhoc()
      {
          $monhoc = Monhoc::select()->get();
    
          $data = [
              'monhocs' => $monhoc
          ];
          // dd($data);
          return view('pages.monhoc.index', $data);
      }
      public function create_monhoc()
      {
          return view('pages.monhoc.create');
      }
      public function store_monhoc( RequestMonhoc $requestMonhoc)
      {
          $monhoc = new Monhoc();
          $monhoc->monhoc = $requestMonhoc->mon_hoc;
          $monhoc->save();
  
          Session::put('message', 'Success');
          return redirect()->back();
      }
      public function edit_monhoc($id)
      {
          $monhoc = Monhoc::find($id);
          return view('pages.monhoc.update', compact('monhoc'));
      }
      public function update_monhoc(RequestMonhoc $requestMonhoc, $id)
      {
          $monhoc = Monhoc::find($id);
          $monhoc->monhoc = $requestMonhoc->mon_hoc;
          $monhoc->save();
          Session::put('message', 'Success');
          return redirect()->back();
      }
      public function delete_monhoc($id)
      {
          $monhoc = Monhoc::find($id);
          $monhoc->delete();
          Session::put('message_delete', 'Delete Success');
          return redirect()->back();
      }
    //====================================Học sinh==================================
    public function hocsinh(Request $request)
    {
        $monhoc = Monhoc::select()->get();

        $hocsinh = DB::table('hocsinh')
                    ->join('lop', 'lop.id', '=', 'hocsinh.lop_id')
                    ->join('monhoc', 'monhoc.id', '=', 'hocsinh.id_monhoc');
        
        if($request->r_lops) $hocsinh->where('lop_id', '=', $request->r_lops );
    
        switch ($request->r_monhocs) {
            case "1":
                $hocsinh->where('monhoc', 'like', '%Toán%');
                break;
            case "2":
                $hocsinh->where('monhoc', 'like', '%Lý%');
                break;
            case "3":
                $hocsinh->where('monhoc', 'like', '%Hóa%');
                break;
            case "4":
                $hocsinh->where('monhoc', 'like', '%KHTN%');
                break;
            case "5":
                $hocsinh->where('monhoc', 'like', '%Toán, Lý%');
                break;
            case "6":
                $hocsinh->where('monhoc', 'like', '%Toán, Hóa%');
                break;
            case "7":
                $hocsinh->where('monhoc', 'like', '%Toán, Lý, Hóa%');
                break;
            case "8":
                $hocsinh->where('monhoc', 'like', '%Toán, KHTN%');
                break;
            case "9":
                $hocsinh->where('monhoc', 'like', '%Lý, Hóa%');
                break;
          }
        
        $hocsinh = $hocsinh->select()->get();  
        $data = [
            'hocsinhs' => $hocsinh,
            'monhocs' => $monhoc,
        ];
        return view('pages.hocsinh.index', $data);
    }
    public function create_hocsinh()
    {
        $lops = Lop::orderBy('lop_name', 'asc')->select()->get();
        $monhocs = Monhoc::orderBy('monhoc', 'asc')->select()->get();
        return view('pages.hocsinh.create', compact('lops', 'monhocs'));
    }
    public function store_hocsinh( Request $requestHocsinh)
    {
        $hocsinh = new Hocsinh();
        $hocsinh->hocsinh_name = $requestHocsinh->hocsinh_name;
        if ($requestHocsinh->hasFile('hocsinh_image')) {
            $file = $requestHocsinh->file('hocsinh_image');
            $name = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $name);
            $hocsinh->hocsinh_image = $name;
        }
        else $hocsinh->hocsinh_image = 'null';
        $hocsinh->lop_id = $requestHocsinh->lop_hs;
        
        $hocsinh->id_monhoc = $requestHocsinh->mon_hoc;
        $hocsinh->hocsinh_ghichu = $requestHocsinh->hocsinh_ghichu;
        $hocsinh->sobuoihoc_somonhoc = $requestHocsinh->sobuoihoc_somonhoc;

        if(empty($requestHocsinh->hocsinh_name) ) dd('chưa điền thông tin học sinh');

        $hocsinh->save();
        

        Session::put('message', 'Success');
        return redirect()->back();
    }

    public function edit_hocsinh($id)
    {
        $hocsinh = Hocsinh::find($id);
        $monhocs = Monhoc::orderBy('monhoc', 'asc')->select()->get();
        // dd($hocsinh);
        $lops = Lop::all();
        return view('pages.hocsinh.update', compact('hocsinh' , 'lops', 'monhocs'));
    }
    public function update_hocsinh(Request $requestHocsinh, $id)
    {

        $hocsinh = Hocsinh::find($id);
        $hocsinh->hocsinh_name = $requestHocsinh->hocsinh_name;
        $hocsinh->lop_id = $requestHocsinh->lop_hs;
        $hocsinh->hocsinh_ghichu = $requestHocsinh->hocsinh_ghichu;
        $hocsinh->sobuoihoc_somonhoc = $requestHocsinh->sobuoihoc_somonhoc;
        if ($requestHocsinh->hasFile('hocsinh_image')) {
            $file = $requestHocsinh->file('hocsinh_image');
            $name = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $name);
            $hocsinh->hocsinh_image = $name;
        }
        // dd($requestHocsinh->mon_hoc);.

        $hocsinh->id_monhoc = $requestHocsinh->mon_hoc;
        $hocsinh->save();
        Session::put('message', 'Success');
        return redirect()->back();
    }
    public function delete_hocsinh($id)
    {
        $hocsinh = Hocsinh::find($id);
        $hocsinh->delete();
        Session::put('message_delete', 'Delete Success');
        return redirect()->back();
    }

        //====================================Điểm danh==================================
        public function diemdanh(Request $request)
        {
            $diemdanh = DB::table('diemdanh')
                    ->join('hocsinh', 'hocsinh.hocsinh_id', '=', 'diemdanh.hocsinh_id');
            if($request->r_hocsinh_name) $diemdanh->where('hocsinh_name', 'like', '%'.$request->r_hocsinh_name.'%');            
            $diemdanh = $diemdanh->select()->orderBy('id', 'DESC')->skip(0)->take(100)->get();  
            // dd($diemdanh);
            $data = [
                'diemdanhs' => $diemdanh,
            ];
            return view('pages.diemdanh.index', $data);
        }

        public function create_diemdanh(Request $request)
        {
            $monhoc = Monhoc::select()->get();

            $hocsinh = DB::table('hocsinh')
                        ->join('lop', 'lop.id', '=', 'hocsinh.lop_id')
                        ->join('monhoc', 'monhoc.id', '=', 'hocsinh.id_monhoc');
        
            if($request->r_lops) $hocsinh->where('lop_id', '=', $request->r_lops );
    
                switch ($request->r_monhocs) {
                case "1":
                    $hocsinh->where('monhoc', 'like', '%Toán%');
                    break;
                case "2":
                    $hocsinh->where('monhoc', 'like', '%Lý%');
                    break;
                case "3":
                    $hocsinh->where('monhoc', 'like', '%Hóa%');
                    break;
                case "4":
                    $hocsinh->where('monhoc', 'like', '%KHTN%');
                    break;
                case "5":
                    $hocsinh->where('monhoc', 'like', '%Toán, Lý%');
                    break;
                case "6":
                    $hocsinh->where('monhoc', 'like', '%Toán, Hóa%');
                    break;
                case "7":
                    $hocsinh->where('monhoc', 'like', '%Toán, Lý, Hóa%');
                    break;
                case "8":
                    $hocsinh->where('monhoc', 'like', '%Toán, KHTN%');
                    break;
                case "9":
                    $hocsinh->where('monhoc', 'like', '%Lý, Hóa%');
                    break;
                 }
        
                $hocsinh = $hocsinh->select()->get();  
                $data = [
                    'hocsinhs' => $hocsinh,
                    'monhocs' => $monhoc,
                ];
            return view('pages.diemdanh.create', $data);
        }
        public function store_diemdanh(Request $requestDiemdanh)
        {
            Carbon::setLocale('vi');
            $diemdanh = new Diemdanh();
            $tongso_hs_diemdanh = $requestDiemdanh->Get_tongsohocsinh;
            $time_start_buoihoc = $requestDiemdanh->start_buoihoc;
            $time_end_buoihoc = $requestDiemdanh->end_buoihoc;
            if(empty($requestDiemdanh->start_buoihoc) || empty($requestDiemdanh->start_buoihoc)) dd('chưa điền giờ học');
            $time_In_Out = 'Từ: '.$time_start_buoihoc.' Đến: '.$time_end_buoihoc;
            $dataArray = array();

            for ($x = 1; $x <= $tongso_hs_diemdanh; $x++) {
                $str1= 'id_hocsinh';
                $str2= $x;
                $id_hocsinh = $str1.$str2;
        
                //thoi gian vao hoc _ thoi gian ra ve
                // $diemdanh->time_batdauhoc = $time_In_Out;
                // ngày tháng năm / thứ 
                $today = Carbon::now('Asia/Ho_Chi_Minh');
                // $diemdanh->day_and_thu_dihoc = $today->toDayDateTimeString();
                // lí do nghỉ học
                $lido1 = 'fname';
                $lido2 = $x;
                $lido = $lido1.$lido2;
                // $diemdanh->reasons = $requestDiemdanh->$lido;
                // $diemdanh->day_and_thu_dihoc = 
                // $diemdanh->hocsinh_id = $requestDiemdanh->$id_hocsinh;

                $time1 = $today->format('d-m-Y');

                // dd($time1);
                $time2 = $today->format('D');
                switch ($time2) {
                    case 'Mon':
                        $time2 = 'Thứ 2';
                         break;
                    case 'Tue':
                        $time2 = 'Thứ 3';
                        break;
                    case 'Wed':
                        $time2 = 'Thứ 4';
                        break;
                    case 'Thu':
                        $time2 = 'Thứ 5';
                        break;
                    case 'Fri':
                        $time2 = 'Thứ 6';
                         break;
                    case 'Sat':
                        $time2 = 'Thứ 7';
                        break;
                    case 'Sun':
                        $time2 = 'Chủ nhật';
                    break;
                      
                    default:
                      
                  }
                $timeTotal = $time2. ", ngày " .$time1;
                // dd($timeTotal);
                $dataArray[$x]['time_batdauhoc'] = $time_In_Out;
                $dataArray[$x]['day_and_thu_dihoc'] = $timeTotal;
                if(empty($requestDiemdanh->$lido)) $dataArray[$x]['hocphi'] = 'chưa thanh toán buổi học này';
                else $dataArray[$x]['hocphi'] = 'vắng nên ko tính học phí';
                $dataArray[$x]['reasons'] = $requestDiemdanh->$lido;
                $dataArray[$x]['hocsinh_id'] = $requestDiemdanh->$id_hocsinh;
            }
            Diemdanh::insert($dataArray); 
            Session::put('message', 'Success');
            return redirect()->back();
        }
        // public function edit_diemdanh($id)
        // {
        //     // $diemdanh = Diemdanh::find($id);
        //     // // dd($hocsinh);
        //     // $lops = Lop::all();
        //     // return view('pages.diemdanh.update', compact('hocsinh' , 'lops'));
        // }
        // public function update_diemdanh(RequestHocsinh $requestHocsinh, $id)
        // {
        //     $hocsinh = Hocsinh::find($id);
        //     $hocsinh->hocsinh_name = $requestHocsinh->hocsinh_name;
        //    $hocsinh->lop_id = $requestHocsinh->lop_hs;
        //     $hocsinh->hocsinh_ghichu = $requestHocsinh->hocsinh_ghichu;
        //     if ($requestHocsinh->hasFile('hocsinh_image')) {
        //         $file = $requestHocsinh->file('hocsinh_image');
        //         $name = $file->getClientOriginalName();
        //         $file->move(public_path('uploads'), $name);
        //         $hocsinh->hocsinh_image = $name;
        //     }
        //     $hocsinh->save();
        //     Session::put('message', 'Success');
        //     return redirect()->back();
        // }
        public function delete_diemdanh($id)
        {
            $diemdanh = Diemdanh::find($id);
            $diemdanh->delete();
            Session::put('message_delete', 'Delete Success');
            return redirect()->back();
        }
            //====================================THU PHÍ==================================
        public function thuphi(Request $request)
        {
            $hocsinh = DB::table('hocsinh')
                    // ->leftJoin('diemdanh', 'hocsinh.hocsinh_id', '=', 'diemdanh.hocsinh_id')
                    ->leftJoin('lop', 'lop.id', '=', 'hocsinh.lop_id')
                    ->orderBy('lop.id', 'aSC')
                    ->select()->get();
         
                        

            // $diemdanh = DB::table('diemdanh')->distinct()->select('hocsinh_id')->get();
            $diemdanh = DB::table('diemdanh')->select()->get();



            // dd($diemdanh);
            $data = [
                'hocsinhs' => $hocsinh,
                'diemdanhs' => $diemdanh,
            ];
            return view('pages.quanlyhocphi.index', $data);
        }




            //--------------------------------NỢ---------------------------------
        public function no()
        {
            $hocsinhs = DB::table('hocsinh')->select()->get();
            $data = [
                'hocsinhs' => $hocsinhs
            ];
            // dd($data);
            return view('pages.no.index', $data);
        }
        public function no_detail($id) {
            // dd($id);
            $ids = $id;
            $no = DB::table('no')
            ->join('hocsinh', 'hocsinh.hocsinh_id', '=', 'no.hocsinh_id')
            ->where('hocsinh.hocsinh_id', '=', $id)
            ->select()->get();
    
            $data = [
                'nos' => $no,
                'ids' => $ids
            ];
            return view('pages.no.detail', $data);
        }
        public function create_no($id)
        {
            // dd($id);
            $data = [
                'ids' => $id
            ];
            return view('pages.no.create', $data);
        }
        public function store_no ( Request $requestNo)
        {
            // dd($requestNo->thoigian_tu);
            $no = new No();
            $no->hocsinh_id = $requestNo->id_hs;
            $no->sotienthieu = $requestNo->sotienthieu;
            $no->timeKhoang = $requestNo->thoigian_tu;
            $no->save();
            Session::put('message', 'Success');
            return redirect()->to('http://127.0.0.1:8000/no');
        }
        function detail_update($id){
            // dd($id);
            No::where('id', $id)
            ->where('value', 'chưa nộp')
            ->update(['value' => "đã nộp"]);
            return redirect()->back();
        }
        public function edit_no ($id)
        {
            $no = No::find($id);
            return view('pages.no.update', compact('no'));
        }
        public function update_no(Request $requestNo, $id)
        {
            $no = No::find($id);
            $no->name_hs = $requestNo->name_hs;
            $no->sotienthieu = $requestNo->sotienthieu;
            $no->save();
            Session::put('message', 'Success');
            return redirect()->back();
        }
        public function delete_no($id)
        {
            $no = No::find($id);
            $no->delete();
            Session::put('message_delete', 'Delete Success');
            return redirect()->back();
        }

        // -----------------------------------------DETAIL - THANH TOÁN -----------------------
        
        public function index_detail_thuno($id)
        {
            // dd('1111'); cLICK CHI TIẾT
            // view detail một học sinh trong tháng
            $diemdanh = DB::table('diemdanh')
                    ->join('hocsinh', 'hocsinh.hocsinh_id', '=', 'diemdanh.hocsinh_id')
                    ->where('diemdanh.hocsinh_id', '=', $id)
                    ->where('diemdanh.hocphi','<>','đã thanh toán học phí buổi này')
                    ->where('diemdanh.hocphi','<>','ED vắng nên ko tính học phí ED');
               
            $diemdanh = $diemdanh->select()->get();  
     
            $data = [
                'diemdanhs' => $diemdanh,
            ];
            return view('pages.detail_thuno.index', $data);
        }
        // printer detail
        public function detail_printer($check_code){
            // dd('2 in');
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($this->print_detail_convert($check_code));
            return $pdf->stream();
        }

        public function print_detail_convert($check_code)
        {
            $diemdanhs = DB::table('diemdanh')
            ->join('hocsinh', 'hocsinh.hocsinh_id', '=', 'diemdanh.hocsinh_id')
            ->join('lop', 'lop.id', '=', 'hocsinh.lop_id')//8/7/2023
            ->where('diemdanh.hocsinh_id', '=', $check_code)
            ->where('diemdanh.hocphi','<>','đã thanh toán học phí buổi này')
            ->where('diemdanh.hocphi','<>','ED vắng nên ko tính học phí ED');
       
            $diemdanhs = $diemdanhs->select()->get();  
            // dd($diemdanhs);
            $stt = 0;
            $sobuoihoc = 0;
            foreach($diemdanhs as $diemdanh =>$cvs ){
                if(isset($cvs->reasons)){

                } else $sobuoihoc += 1;
            };
            $gia = $sobuoihoc * 25;

            $output = '';
            $output.='

            <style type="text/css">
            body{
                font-family: DejaVu Sans;
                text-align: center;
                
            }

            #gia {
                width: 50%;
                height: 150px;
        
                float: left;
            }

              #time {
                width: 50%;
                height: 150px;
     
                float: right;
            }
                table, th, td{
                    border:1px solid #868585;
                }
                table{
                    border-collapse:collapse;
                    width:100%;
                    font-size:10px;
                }
                th, td{
                    text-align:left;
                    padding:5px;
                }
                table tr:nth-child(odd){
                    background-color:#eee;
                }
                table tr:nth-child(even){
                    background-color:white;
                }
                table tr:nth-child(1){
                    background-color:skyblue;
                }

                #post {
                    width: 50%;
                    height: 150px;
            
                    float: right;
                }

                  #sidebar {
                    width: 50%;
                    height: 150px;
         
                    float: left;
                }
     

            </style>
            <h3 > LỚP HỌC ANH HOÀNG </h3>
            <h4 >PHIẾU HỌC PHÍ</h4>
            <table class="table table-striped table-dark table-bordered"> 
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">STT</th>
                    <th scope="col">TÊN HỌC SINH</th>
                    <th scope="col">THỜI GIAN HỌC LÚC</th>
                    <th scope="col">THỨ VÀ NGÀY HỌC</th>
                    <th scope="col">LÝ DO NGHỈ</th>
                    <th scope="col">HOC PHÍ</th>
                    </tr>
                </thead>
                <tbody>';

                        foreach($diemdanhs as $diemdanh =>$cvs ){
                            $stt += 1;
                            $output.='<tr>'.
                            '<td scope="row">'.$stt.'</td>'. 
                            '<td>'.$cvs->hocsinh_name .' -  '. $cvs->lop_name .'</td>'.
                            '<td>'.$cvs->time_batdauhoc.'</td>'.
                            '<td>'.$cvs->day_and_thu_dihoc.'</td>'.
                            '<td>'.$cvs->reasons.'</td>'.
                            '<td>'.$cvs->hocphi.'</td></tr>';
                        };

        $output.='</tbody>
            </table>';

            $output.='
            <div>
                <div id="gia">
                    <p style="text-align:left;"> Học phí : ' . $gia . 'K .</p>  
                </div>
                <div id="time">
                    <h4 style="text-align:right";>Đà nẵng, ngày .... tháng .... năm 2023.</h4>     
                </div>
            </div><br>

            <div>
                <div id="content" class="container">
                    <div id="post"><h4><b>Thông tin liên hệ</b></h4>
                    <p> 
                        <i>Quý phụ huynh có yêu cầu, thắc mắc, liên hệ tại đây. <b>Phone/ Zalo</b>:  0787-195-591</i> <br>
                        <i>Cảm ơn quý phụ huynh đã tin tưởng.</i> <br>
                        <i>Em/Con cố gắng để học trò trong lớp tiến bộ từng ngày.</i> <br>
                        </p>
                </div>
                <div id="sidebar"><h4>Thông tin tài khoản</h4>
                    <p>
                        <i>Ngân hàng <b>TP Bank</b></i> <br>
                        <i>Số tài khoản:  0000 2361 307</i> <br>
                        <i>Tên chủ tài khoản:  Huỳnh Huy Hoàng</i> <br>
                        <i><b>Nội dung:</b> ( Tên học sinh + Lớp )</i>
                    </p> 
                </div>
            </div>
         
            ';

            return $output;
        }
 
        // public function detail_thanhtoan_thuno($id)
        // {
        //     dd('3');
        //     $hocsinh = DB::table('hocsinh')
        //     ->join('lop', 'lop.id', '=', 'hocsinh.lop_id')
        //     ->join('monhoc', 'monhoc.id', '=', 'hocsinh.id_monhoc')
        //     ->where('hocsinh.hocsinh_id', '=', $id)
        //     ->select()->get();
        //     $diemdanh = DB::table('diemdanh')
        //     ->join('hocsinh', 'hocsinh.hocsinh_id', '=', 'diemdanh.hocsinh_id')
        //     ->where('diemdanh.hocsinh_id', '=', $id)
        //     ->select()->get();
        //     // dd($diemdanh);
        //     $data = [
        //         'hocsinhs' => $hocsinh,
        //         'diemdanhs' => $diemdanh
        //     ];
      
        //     return view('pages.detail_thuno.index', $data);
        // }

        public function thanhtoan($id)
        {

            Diemdanh::where('hocsinh_id', $id)
            ->where('hocphi', 'chưa thanh toán buổi học này')
            ->update(['hocphi' => "đã thanh toán học phí buổi này"]);

            Diemdanh::where('hocsinh_id', $id)
            ->where('hocphi', 'vắng nên ko tính học phí')
            ->update(['hocphi' => "ED vắng nên ko tính học phí ED"]);

            return redirect()->route('admin.get.list.thuphi');
        }
   // -----------------------------------------XEM NHỮNG AI CÒN NỢ NHANH -----------------------
        public function conno()//xem nợ nhanh
        {
            $tien = 0;
            $hocsinh_tien = DB::table('hocsinh')
            ->join('lop', 'lop.id', '=', 'hocsinh.lop_id')
            ->join('no', 'no.hocsinh_id', '=', 'hocsinh.hocsinh_id')
            ->where('value', 'chưa nộp')
            ->select()->get();
            foreach($hocsinh_tien as $hocsinh)
            {
                // $default = preg_match_all('!\d+!', $hocsinh->sotienthieu, $matches);

                $default = (int)filter_var($hocsinh->sotienthieu, FILTER_SANITIZE_NUMBER_INT);
                $tien += $default;
            }
            $hocsinhs = DB::table('hocsinh')
            ->join('lop', 'lop.id', '=', 'hocsinh.lop_id')
            ->join('no', 'no.hocsinh_id', '=', 'hocsinh.hocsinh_id')
            ->where('value', 'chưa nộp')
            ->orderBy('no.id', 'desc')
            ->select()->get();
            // dd($hocsinhs);
            $data = [
                'hocsinhs' => $hocsinhs,
                'tiens' => $tien
            ];
            // dd($data);
            return view('pages.xemno.index', $data);
        }
        public function danop()//xem đã nộp + tông $
        {
            $tien = 0;

            $hocsinh_tien = DB::table('hocsinh')
            ->join('lop', 'lop.id', '=', 'hocsinh.lop_id')
            ->join('no', 'no.hocsinh_id', '=', 'hocsinh.hocsinh_id')
            ->where('value', 'đã nộp')
            ->select()->get();

            foreach($hocsinh_tien as $hocsinh)
            {
                // $default = preg_match_all('!\d+!', $hocsinh->sotienthieu, $matches);

                $default = (int)filter_var($hocsinh->sotienthieu, FILTER_SANITIZE_NUMBER_INT);
                $tien += $default;
            }

            $hocsinhs = DB::table('hocsinh')
            ->join('lop', 'lop.id', '=', 'hocsinh.lop_id')
            ->join('no', 'no.hocsinh_id', '=', 'hocsinh.hocsinh_id')
            ->where('value', 'đã nộp')
            ->select()->get();
            // dd($hocsinhs);
            $data = [
                'hocsinhs' => $hocsinhs,
                'tiens' => $tien
            ];
            // dd($data);
            return view('pages.danop.index', $data);
        }

        // Lý do vắng
        public function vang(Request $request) {
        $hocsinhs = DB::table('hocsinh')
        ->join('diemdanh', 'hocsinh.hocsinh_id', '=', 'diemdanh.hocsinh_id')
        ->where('hocsinh.hocsinh_name', 'like', '%'.$request->r_hocsinh_name.'%' )
        ->whereNotNull('diemdanh.reasons')
        ->select()->get();
        // dd($hocsinhs);
        $data = [
            'hocsinhs' => $hocsinhs,
        ];
            return view('pages.vang_detail.index', $data);
        }

        // check tong hoc sinh nop hoc phi
        public function check_hocphi()
        {

            $hocsinhs = DB::table('hocsinh')
            ->join('lop', 'lop.id', '=', 'hocsinh.lop_id')
            ->join('no', 'no.hocsinh_id', '=', 'hocsinh.hocsinh_id')
            // ->orderBy('hocsinh.hocsinh_name', 'desc')
            // ->orderBy('no.value', 'asc')
            ->orderBy('lop.id', 'asc')
            ->select()->get();
            // dd($hocsinhs);
            $data = [
                'hocsinhs' => $hocsinhs,
            ];
            // dd($data);
  
            return view('pages.check_hocphi.index', $data);
        }

            // check số lượng học sinh của môn
            public function soluong()
            {
                // học sinh lớp 7
                        //tổng số học sinh lớp 7
                $hocsinhs_lop7 = DB::table('hocsinh')
                ->join('lop', 'lop.id', '=', 'hocsinh.lop_id')
                ->where('lop.id', 7)
                ->select()->get();
                                 //toán 7
                $hocsinhs_lop7_toan = DB::table('hocsinh')
                ->join('lop', 'lop.id', '=', 'hocsinh.lop_id')
                ->join('monhoc', 'monhoc.id', '=', 'hocsinh.id_monhoc')
                ->where('lop.id', 7)
                ->where('monhoc.monhoc', 'like', '%Toán%')
                ->select()->get();
                                //khtn 7
                $hocsinhs_lop7_khtn = DB::table('hocsinh')
                ->join('lop', 'lop.id', '=', 'hocsinh.lop_id')
                ->join('monhoc', 'monhoc.id', '=', 'hocsinh.id_monhoc')
                ->where('lop.id', 7)
                ->where('monhoc.monhoc', 'like', '%KHTN%')
                ->select()->get();


                          // học sinh lớp 6
                        //tổng số học sinh lớp 6
                        $hocsinhs_lop6 = DB::table('hocsinh')
                        ->join('lop', 'lop.id', '=', 'hocsinh.lop_id')
                        ->where('lop.id', 6)
                        ->select()->get();
                                         //toán 6
                        $hocsinhs_lop6_toan = DB::table('hocsinh')
                        ->join('lop', 'lop.id', '=', 'hocsinh.lop_id')
                        ->join('monhoc', 'monhoc.id', '=', 'hocsinh.id_monhoc')
                        ->where('lop.id', 6)
                        ->where('monhoc.monhoc', 'like', '%Toán%')
                        ->select()->get();
                                        //khtn 6
                        $hocsinhs_lop6_khtn = DB::table('hocsinh')
                        ->join('lop', 'lop.id', '=', 'hocsinh.lop_id')
                        ->join('monhoc', 'monhoc.id', '=', 'hocsinh.id_monhoc')
                        ->where('lop.id', 6)
                        ->where('monhoc.monhoc', 'like', '%KHTN%')
                        ->select()->get();




                // dd($hocsinhs_lop7_toan);
                $data = [
                    'hocsinhs_lop7' => $hocsinhs_lop7,
                    'hocsinhs_lop7_toan' => $hocsinhs_lop7_toan,
                    'hocsinhs_lop7_khtn' => $hocsinhs_lop7_khtn,

                    'hocsinhs_lop6' => $hocsinhs_lop6,
                    'hocsinhs_lop6_toan' => $hocsinhs_lop6_toan,
                    'hocsinhs_lop6_khtn' => $hocsinhs_lop6_khtn,
                ];
                // dd($data);
      
                return view('pages.soluong_hs_of_mon.index', $data);
            }
}