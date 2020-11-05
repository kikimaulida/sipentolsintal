<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class Ccetak extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model(['m_usaha', 'm_pengguna', 'm_kategori', 'm_kecamatan']);
		}

		public function index() 
		{
			
			$level = $this->session->userdata('level');
			if ($level == 'admin')
			{
				$id_pengguna = '';
			}
			else {
				$id_pengguna = $this->session->userdata('id_pengguna');
			}
			$data['row'] = $this->m_usaha->tampil_usaha($id_pengguna);
			/*var_dump($data);*/
			$this->template->load('template', 'usaha/data_usaha', $data);
		} 

		function cetak_allusaha()
		{
	       	$this->load->library('pdf');
	        $pdf = new FPDF('L','mm','legal');
	        $pdf->SetMargins(20,20,20);
	        // membuat halaman baru
	        $pdf->AddPage();
	        $pdf->Image('application/third_party/fpdf/images/tala.png',20,20,18,20); //kanan, atas, lebar, tinggi
	       
	        // setting jenis font yang akan digunakan
	        $pdf->SetFont('Arial','B',12);
	        // mencetak string 
	        $pdf->Cell(310,5,'DINAS KOPERASI, USAHA KECIL DAN PERDAGANGAN',0,1,'C');
	        $pdf->Cell(310,8,'KABUPATEN TANAH LAUT',0,1,'C');
	        $pdf->SetFont('Arial','B',10);
	        $pdf->Cell(310,7,'DATA USAHA KECIL',0,1,'C');
	        $pdf->SetFont('Arial','B',7);
	        /*$pdf->Cell(170,3,'Unit     : Passenger Service',0,1,'L');
	        $pdf->Cell(170,5,'Sub Unit : Terminal & Landside Service',0,1,'L');*/
	      
	        //Garis Bawah Double
	        $pdf->Cell(315,1,'','B',1,'L');
	        $pdf->Cell(315,1,'','B',1,'L');
	        // Memberikan space kebawah agar tidak terlalu rapat

	        $pdf->Cell(10,8,'',0,1);
	        $pdf->SetFont('Arial','B',7);
	        $pdf->Cell(10,6,'No',1,0,'C');
	        $pdf->Cell(25,6,'NIK',1,0,'C');
	        $pdf->Cell(34,6,'Nama Pemilik',1,0,'C');
	        $pdf->Cell(34,6,'Nama Usaha',1,0,'C');
	        $pdf->Cell(20,6,'Kategori',1,0,'C');
	        $pdf->Cell(18,6,'Asset',1,0,'C');
	        $pdf->Cell(18,6,'Omzet',1,0,'C');
	        $pdf->Cell(15,6,'Kelas',1,0,'C');
	        $pdf->Cell(60,6,'Alamat',1,0,'C');
	        $pdf->Cell(31,6,'Kelurahan',1,0,'C');
	        $pdf->Cell(28,6,'Kecamatan',1,0,'C');
	        $pdf->Cell(22,6,'Telepon',1,1,'C');
	        /*$pdf->Cell(17,6,'Bergabung',1,1,'C');*/
	        
	        /*$pdf->Cell(25,6,'Delivery Baggage',1,1);*/

	        $pdf->SetFont('Arial','',8);
	        $this->load->model('m_usaha');
	        $usaha = $this->m_usaha->tampil_usaha()->result();
	        $no=1;
	        foreach ($usaha as $row){
	        	$pdf->Cell(10,6,$no++,1,0);
	        	$pdf->Cell(25,6,$row->nik,1,0);
	            $pdf->Cell(34,6,$row->nama_lengkap,1,0);
	            $pdf->Cell(34,6,$row->nama_usaha,1,0);
	            $pdf->Cell(20,6,$row->nama_kategori,1,0);
	            $pdf->Cell(18,6,$row->asset,1,0); 
	            $pdf->Cell(18,6,$row->omzet,1,0);
	            $pdf->Cell(15,6,$row->kelas,1,0);
	            $pdf->Cell(60,6,$row->alamat,1,0);
	            $pdf->Cell(31,6,$row->nama_kelurahan,1,0);
	            $pdf->Cell(28,6,$row->nama_kecamatan,1,0); 
	            $pdf->Cell(22,6,$row->telepon,1,1);
	           /* $pdf->Cell(17,6,date('d-m-Y', strtotime($row->bergabung)),1,1);*/
	            
	            /*$pdf->Cell(25,6,$row->deliv_bag,1,1); */ 
	        }

	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(260,5,'',0,1,'C');
	        $pdf->SetFont('Arial','',9);
	        $pdf->Cell(233,2,'Mengetahui,',0,1,'R');
	        $pdf->Cell(255,7,'Kepala Bidang Koperasi dan Usaha Kecil',0,1,'R');
	        $pdf->Cell(255,20,'',0,1,'R');
	        $pdf->SetFont('Arial','U',9);
	        $pdf->Cell(244,2,'Totom Wahyudi, S.ST, MT',0,1,'R');
	        $pdf->SetFont('Arial','',9);
	        $pdf->Cell(246,5,'NIP. 19760622 199803 1 003',0,1,'R');

	        $nama = "Data Usaha Kecil.pdf";
	        $pdf->Output($nama, "I");
	    }
		
		function cetak_usaha($awal,$akhir)
		{
	       	$this->load->library('pdf');
	        $pdf = new FPDF('L','mm','legal');
	        $pdf->SetMargins(20,20,20);
	        // membuat halaman baru
	        $pdf->AddPage();
	        $pdf->Image('application/third_party/fpdf/images/tala.png',20,20,18,20); //kanan, atas, lebar, tinggi
	       
	        // setting jenis font yang akan digunakan
	        $pdf->SetFont('Arial','B',12);
	        // mencetak string 
	        $pdf->Cell(310,5,'DINAS KOPERASI, USAHA KECIL DAN PERDAGANGAN',0,1,'C');
	        $pdf->Cell(310,8,'KABUPATEN TANAH LAUT',0,1,'C');
	        $pdf->SetFont('Arial','B',10);
	        $pdf->Cell(310,7,'DATA USAHA KECIL',0,1,'C');
	        $pdf->SetFont('Arial','B',7);
	        /*$pdf->Cell(170,3,'Unit     : Passenger Service',0,1,'L');
	        $pdf->Cell(170,5,'Sub Unit : Terminal & Landside Service',0,1,'L');*/
	      
	        //Garis Bawah Double
	        $pdf->Cell(315,1,'','B',1,'L');
	        $pdf->Cell(315,1,'','B',1,'L');
	        // Memberikan space kebawah agar tidak terlalu rapat

	        $pdf->Cell(10,8,'',0,1);
	        $pdf->SetFont('Arial','B',7);
	        $pdf->Cell(10,6,'No',1,0,'C');
	        $pdf->Cell(25,6,'NIK',1,0,'C');
	        $pdf->Cell(34,6,'Nama Pemilik',1,0,'C');
	        $pdf->Cell(34,6,'Nama Usaha',1,0,'C');
	        $pdf->Cell(20,6,'Kategori',1,0,'C');
	        $pdf->Cell(18,6,'Asset',1,0,'C');
	        $pdf->Cell(18,6,'Omzet',1,0,'C');
	        $pdf->Cell(15,6,'Kelas',1,0,'C');
	        $pdf->Cell(60,6,'Alamat',1,0,'C');
	        $pdf->Cell(31,6,'Kelurahan',1,0,'C');
	        $pdf->Cell(28,6,'Kecamatan',1,0,'C');
	        $pdf->Cell(22,6,'Telepon',1,1,'C');
	        /*$pdf->Cell(17,6,'Bergabung',1,1,'C');*/
	        
	        /*$pdf->Cell(25,6,'Delivery Baggage',1,1);*/

	        $pdf->SetFont('Arial','',8);
	        $this->load->model('m_usaha');
	        $usaha = $this->m_usaha->cetak_usaha($awal, $akhir)->result();
	        $no=1;
	        foreach ($usaha as $row){
	        	$pdf->Cell(10,6,$no++,1,0);
	        	$pdf->Cell(25,6,$row->nik,1,0);
	            $pdf->Cell(34,6,$row->nama_lengkap,1,0);
	            $pdf->Cell(34,6,$row->nama_usaha,1,0);
	            $pdf->Cell(20,6,$row->nama_kategori,1,0);
	            $pdf->Cell(18,6,$row->asset,1,0); 
	            $pdf->Cell(18,6,$row->omzet,1,0);
	            $pdf->Cell(15,6,$row->kelas,1,0);
	            $pdf->Cell(60,6,$row->alamat,1,0);
	            $pdf->Cell(31,6,$row->nama_kelurahan,1,0);
	            $pdf->Cell(28,6,$row->nama_kecamatan,1,0); 
	            $pdf->Cell(22,6,$row->telepon,1,1);
	            /*$pdf->Cell(17,6,date('d-m-Y', strtotime($row->bergabung)),1,1);*/
	        }
	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(260,5,'',0,1,'C');
	        $pdf->SetFont('Arial','',9);
	        $pdf->Cell(233,2,'Mengetahui,',0,1,'R');
	        $pdf->Cell(255,7,'Kepala Bidang Koperasi dan Usaha Kecil',0,1,'R');
	        $pdf->Cell(255,20,'',0,1,'R');
	        $pdf->SetFont('Arial','U',9);
	        $pdf->Cell(244,2,'Totom Wahyudi, S.ST, MT',0,1,'R');
	        $pdf->SetFont('Arial','',9);
	        $pdf->Cell(246,7,'NIP. 19760622 199803 1 003',0,1,'R');

	        $nama = "Data Usaha Kecil.pdf";
	        $pdf->Output($nama, "I");
	    }

	    public function export_allusaha()
	    {
	    	$this->load->model('m_usaha');
	        $usaha = $this->m_usaha->tampil_usaha()->result();

	        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
	        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

	        $object = new PHPExcel();

	        $object->getProperties()->setCreator("Framewoek Indonesia");
	        $object->getProperties()->setLastModifiedBy("Framewoek Indonesia");
	        $object->getProperties()->setTitle("Data Usaha");
	        $object->setActiveSheetIndex(0);

	        $object->getActiveSheet()->setCellValue('A1', 'No');
	        $object->getActiveSheet()->setCellValue('B1', 'NIK');
	        $object->getActiveSheet()->setCellValue('C1', 'Nama');
	        $object->getActiveSheet()->setCellValue('D1', 'Usaha');
	        $object->getActiveSheet()->setCellValue('E1', 'Kategori');
	        $object->getActiveSheet()->setCellValue('F1', 'Alamat');
	        $object->getActiveSheet()->setCellValue('G1', 'Kecamatan');
	        $object->getActiveSheet()->setCellValue('H1', 'Telepon');
	        $object->getActiveSheet()->setCellValue('I1', 'Bergabung');

	        $baris = 2;
	        $no = 1;

	        foreach ($usaha as $row){
	        	$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
	        	$object->getActiveSheet()->setCellValue('B'.$baris, $row->nik);
	        	$object->getActiveSheet()->setCellValue('C'.$baris, $row->nama_lengkap);
	        	$object->getActiveSheet()->setCellValue('D'.$baris, $row->nama_usaha);
	        	$object->getActiveSheet()->setCellValue('E'.$baris, $row->nama_kategori);
	        	$object->getActiveSheet()->setCellValue('F'.$baris, $row->alamat);
	        	$object->getActiveSheet()->setCellValue('G'.$baris, $row->nama_kecamatan);
	        	$object->getActiveSheet()->setCellValue('H'.$baris, $row->telepon);
	        	$object->getActiveSheet()->setCellValue('I'.$baris, $row->bergabung);

	        	$baris++;

	        }

	        $object->getActiveSheet()->getColumnDimension('A')->setWidth(5); //no
	        $object->getActiveSheet()->getColumnDimension('B')->setWidth(20); // nik
		    $object->getActiveSheet()->getColumnDimension('C')->setWidth(25); // nama lengkap
		    $object->getActiveSheet()->getColumnDimension('D')->setWidth(25); //nama usaha
		    $object->getActiveSheet()->getColumnDimension('E')->setWidth(15); // kategori
		    $object->getActiveSheet()->getColumnDimension('F')->setWidth(30); //alamat
		    $object->getActiveSheet()->getColumnDimension('G')->setWidth(20); //kecamatan
		    $object->getActiveSheet()->getColumnDimension('H')->setWidth(15); //telepon
		    $object->getActiveSheet()->getColumnDimension('I')->setWidth(15); //bergabung


	        $filename = "Data Usaha".'.xlsx';
	        $object->getActiveSheet()->setTitle("Data Usaha");

	        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	        header('Content-Disposition: attachment;filename="'.$filename.'"');
	        header('Cache-Control:max-age=0');

	        $writer= PHPExcel_IOFactory::createwriter($object, 'Excel2007');
	        $writer->save('php://output');

	        exit;
	    }

	     public function export_usaha($awal,$akhir)
	    {
	    	$this->load->model('m_usaha');
	        $usaha = $this->m_usaha->cetak_usaha($awal, $akhir)->result();

	        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
	        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

	        $object = new PHPExcel();

	        $object->getProperties()->setCreator("Framewoek Indonesia");
	        $object->getProperties()->setLastModifiedBy("Framewoek Indonesia");
	        $object->getProperties()->setTitle("Data Usaha");
	        $object->setActiveSheetIndex(0);

	        $object->getActiveSheet()->setCellValue('A1', 'No');
	        $object->getActiveSheet()->setCellValue('B1', 'NIK');
	        $object->getActiveSheet()->setCellValue('C1', 'Nama');
	        $object->getActiveSheet()->setCellValue('D1', 'Usaha');
	        $object->getActiveSheet()->setCellValue('E1', 'Kategori');
	        $object->getActiveSheet()->setCellValue('F1', 'Alamat');
	        $object->getActiveSheet()->setCellValue('G1', 'Kecamatan');
	        $object->getActiveSheet()->setCellValue('H1', 'Telepon');
	        $object->getActiveSheet()->setCellValue('I1', 'Bergabung');

	        $baris = 2;
	        $no = 1;

	        foreach ($usaha as $row){
	        	$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
	        	$object->getActiveSheet()->setCellValue('B'.$baris, $row->nik);
	        	$object->getActiveSheet()->setCellValue('C'.$baris, $row->nama_lengkap);
	        	$object->getActiveSheet()->setCellValue('D'.$baris, $row->nama_usaha);
	        	$object->getActiveSheet()->setCellValue('E'.$baris, $row->nama_kategori);
	        	$object->getActiveSheet()->setCellValue('F'.$baris, $row->alamat);
	        	$object->getActiveSheet()->setCellValue('G'.$baris, $row->nama_kecamatan);
	        	$object->getActiveSheet()->setCellValue('H'.$baris, $row->telepon);
	        	$object->getActiveSheet()->setCellValue('I'.$baris, $row->bergabung);

	        	$baris++;

	        }

	        $object->getActiveSheet()->getColumnDimension('A')->setWidth(5); //no
	        $object->getActiveSheet()->getColumnDimension('B')->setWidth(20); // nik
		    $object->getActiveSheet()->getColumnDimension('C')->setWidth(25); // nama lengkap
		    $object->getActiveSheet()->getColumnDimension('D')->setWidth(25); //nama usaha
		    $object->getActiveSheet()->getColumnDimension('E')->setWidth(15); // kategori
		    $object->getActiveSheet()->getColumnDimension('F')->setWidth(30); //alamat
		    $object->getActiveSheet()->getColumnDimension('G')->setWidth(20); //kecamatan
		    $object->getActiveSheet()->getColumnDimension('H')->setWidth(15); //telepon
		    $object->getActiveSheet()->getColumnDimension('I')->setWidth(15); //bergabung


	        $filename = "Data Usaha".'.xlsx';
	        $object->getActiveSheet()->setTitle("Data Usaha");

	        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	        header('Content-Disposition: attachment;filename="'.$filename.'"');
	        header('Cache-Control:max-age=0');

	        $writer= PHPExcel_IOFactory::createwriter($object, 'Excel2007');
	        $writer->save('php://output');

	        exit;
	    }
	}