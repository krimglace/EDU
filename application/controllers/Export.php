<?php

	class Export extends CI_Controller{

		function __construct() {
			parent:: __construct();
			$this->load->library('pdf');
			$this->load->database();
			$this->load->helper('url');
		}
		public function Invoice($id) {
			$where = array('user_id' => $id);
			$user = $id;
			$no = 1;
			$no_invoice = mt_rand(1000000, 9999999);
			$date = date('l, d / M / Y');

			$this->db->select('*');
			$this->db->from('tb_user as u');
			$this->db->where('u.user_id',$user);
			$this->db->join('tb_tagihan as t','u.user_id = t.user_id');
			$sql = $this->db->get()->result();	
				foreach($sql as $ut) {

					if($ut->angsuran_1 == ''){ $ut->angsuran_1 = 0; }
					else { $ut->angsuran_1 = $ut->angsuran_1; }

					if($ut->angsuran_2 == ''){ $ut->angsuran_2 = 0; }
					else { $ut->angsuran_2 = $ut->angsuran_2; }

					if($ut->angsuran_3 == ''){ $ut->angsuran_3 = 0; }
					else { $ut->angsuran_3 = $ut->angsuran_3; }
					$price = $ut->total_biaya - $ut->potongan;

					$arp = $ut->dp + $ut->angsuran_1 + $ut->angsuran_2 + $ut->angsuran_3;
					$aro = $price - $arp;
					
					if($aro > 0){ $status = "BELUM LUNAS"; }
					else { $status = "LUNAS"; }
				}
		
			$pdf = new FPDF('L','mm',array(150,205));

			$pdf->AddPage();
			$pdf->SetFont('Arial', 'B', 16);
			$pdf->Cell(190,7,'Invoice User',0,1,'C');
			$pdf->Cell(10,10,'',0,1);
			$pdf->SetFont('Arial', 'B', 14);
			$pdf->Cell(40,7,'No Invoice',0,0);
			$pdf->Cell(10,7,':',0,0,'C');
			$pdf->SetFont('Arial', 'I', 14);
			$pdf->Cell(100,7, $no_invoice,0,1);
			$pdf->SetFont('Arial', 'B', 14);
			$pdf->Cell(40,7,'Tanggal',0,0);
			$pdf->Cell(10,7,':',0,0,'C');
			$pdf->SetFont('Arial', 'I', 14);
			$pdf->Cell(100,7, $date,0,1);
			$pdf->SetFont('Arial', 'B', 14);
			$pdf->Cell(40,7,'User ID',0,0);
			$pdf->Cell(10,7,':',0,0,'C');
			$pdf->SetFont('Arial', 'I', 14);
			$pdf->Cell(100,7, $user,0,1);
			$pdf->Cell(10,10,'',0,1);


			$pdf->SetFont('Arial', 'B', 12);
			$pdf->Cell(10,7,'No',1,0,'C');
			$pdf->Cell(45,7,'Price',1,0,'C');
			$pdf->Cell(45,7,'Arp',1,0,'C');
			$pdf->Cell(45,7,'Aro',1,0,'C');
			$pdf->Cell(40,7,'Status',1,1,'C');

			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(10,6,$no++,1,0,'C');
			$pdf->Cell(45,6,'Rp '.$price,1,0,'C');
			$pdf->Cell(45,6,'Rp '.$arp,1,0,'C');
			$pdf->Cell(45,6,'Rp '.$aro,1,0,'C');
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell(40,6,$status, 1,1,'C');

			$pdf->Cell(10,10,'',0,1);
			$pdf->SetFont('Arial', 'B', 12);
			$pdf->Cell(180,7,$date,0,1,'R');
			$pdf->Cell(10,20,'',0,1);
			$pdf->SetFont('Arial', 'B', 12);
			$pdf->Cell(165,7,'Edulab',0,1,'R');
			$pdf->Output();
		}

		public function Statistik_Cabang(){


			require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel.php');

			$pe = new PHPExcel();

			$pe->getProperties()->setCreator("Edulab");
			$pe->getProperties()->setLastModifiedBy("Edulab");
			$pe->getProperties()->setTitle("Statistik Cabang");
			$pe->getProperties()->setDescription("Statistik Cabang");
			$pe->getProperties()->setKeywords("Data Cabang");

			$pe->setActiveSheetIndex(0)->setCellValue('A1',"Data Statistik Cabang");
			$pe->getActiveSheet()->mergeCells('A1:K1');
			$pe->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
			$pe->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);

			$pe->setActiveSheetIndex(0)->setCellValue('A2',"NO");
			$pe->getActiveSheet()->mergeCells('A2:A3');
			$pe->setActiveSheetIndex(0)->setCellValue('B2',"NAMA CABANG");
			$pe->getActiveSheet()->mergeCells('B2:B3');
			$pe->setActiveSheetIndex(0)->setCellValue('C2',"JUMLAH USER");
			$pe->getActiveSheet()->mergeCells('C2:C3');
			$pe->setActiveSheetIndex(0)->setCellValue('D2',"USER LUNAS");
			$pe->getActiveSheet()->mergeCells('D2:D3');
			$pe->setActiveSheetIndex(0)->setCellValue('E2',"USER BELUM LUNAS");
			$pe->getActiveSheet()->mergeCells('E2:E3');
			$pe->setActiveSheetIndex(0)->setCellValue('F2',"PRICE TOTAL");
			$pe->getActiveSheet()->mergeCells('F2:F3');
			$pe->setActiveSheetIndex(0)->setCellValue('G2',"ARP TOTAL");
			$pe->getActiveSheet()->mergeCells('G2:G3');
			$pe->setActiveSheetIndex(0)->setCellValue('H2',"ARO TOTAL");
			$pe->getActiveSheet()->mergeCells('H2:H3');
			$pe->setActiveSheetIndex(0)->setCellValue('I2',"PERSENTASE BAYAR USER");
			$pe->getActiveSheet()->mergeCells('I2:K2');
			$pe->setActiveSheetIndex(0)->setCellValue('I3',"> 50%");
			$pe->setActiveSheetIndex(0)->setCellValue('J3',"= 50%");
			$pe->setActiveSheetIndex(0)->setCellValue('K3',"< 50%");


			$cabang =  $this->statistik_cabang_model->export('tb_cabang')->result();

			$no = 1;
			$numrows = 3;
			foreach( $cabang as $stat ){
				$pe->setActiveSheetIndex(0)->setCellValue('Z'.$numrows++,'');
				$pe->setActiveSheetIndex(0)->setCellValue('A'.$numrows, $no++);



				$pe->setActiveSheetIndex(0)->setCellValue('B'.$numrows,$stat->nama_cabang);
				$this->db->like('nama_cabang', $stat->nama_cabang);
				$this->db->from('tb_user');
				$pe->setActiveSheetIndex(0)->setCellValue('C'.$numrows,$this->db->count_all_results());

				$query = $this->db->query("SELECT COUNT(tb_user.user_id) as status FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE (tb_tagihan.total_biaya - (tb_tagihan.potongan+tb_tagihan.dp+tb_tagihan.angsuran_1+tb_tagihan.angsuran_2+tb_tagihan.angsuran_3) = 0) AND tb_user.nama_cabang = '".$stat->nama_cabang."'");


				$query1 = $this->db->query("SELECT COUNT(tb_user.user_id) as status FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE (tb_tagihan.total_biaya - (tb_tagihan.potongan+tb_tagihan.dp+tb_tagihan.angsuran_1+tb_tagihan.angsuran_2+tb_tagihan.angsuran_3) != 0) AND tb_user.nama_cabang = '".$stat->nama_cabang."'");

				$sql = $this->db->query("SELECT SUM(tb_tagihan.total_biaya) AS total FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE tb_cabang.nama_cabang = '".$stat->nama_cabang."'");

				$sql1 = $this->db->query("SELECT SUM(tb_tagihan.potongan) AS potongan FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE tb_cabang.nama_cabang = '".$stat->nama_cabang."'");

				$sql2 = $this->db->query("SELECT SUM(tb_tagihan.dp) AS dp FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE tb_cabang.nama_cabang = '".$stat->nama_cabang."'");

				$sql3 = $this->db->query("SELECT SUM(tb_tagihan.angsuran_1) AS a1 FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE tb_cabang.nama_cabang = '".$stat->nama_cabang."'");

				$sql4 = $this->db->query("SELECT SUM(tb_tagihan.angsuran_2) AS a2 FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE tb_cabang.nama_cabang = '".$stat->nama_cabang."'");

				$sql5 = $this->db->query("SELECT SUM(tb_tagihan.angsuran_3) AS a3 FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE tb_cabang.nama_cabang = '".$stat->nama_cabang."'");

				$sql6 = $this->db->query("SELECT COUNT(tb_user.user_id) as tagihan FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE (tb_tagihan.dp+tb_tagihan.angsuran_1+tb_tagihan.angsuran_2+tb_tagihan.angsuran_3 < (tb_tagihan.total_biaya - tb_tagihan.potongan)/2) AND tb_user.nama_cabang = '".$stat->nama_cabang."'");

				$sql7 = $this->db->query("SELECT COUNT(tb_user.user_id) as tagihan FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE (tb_tagihan.dp+tb_tagihan.angsuran_1+tb_tagihan.angsuran_2+tb_tagihan.angsuran_3 = (tb_tagihan.total_biaya - tb_tagihan.potongan)/2) AND tb_user.nama_cabang = '".$stat->nama_cabang."'");

				$sql8 = $this->db->query("SELECT COUNT(tb_user.user_id) as tagihan FROM tb_tagihan JOIN tb_user ON tb_user.user_id = tb_tagihan.user_id JOIN tb_cabang ON tb_user.nama_cabang = tb_cabang.nama_cabang WHERE (tb_tagihan.dp+tb_tagihan.angsuran_1+tb_tagihan.angsuran_2+tb_tagihan.angsuran_3 > (tb_tagihan.total_biaya - tb_tagihan.potongan)/2) AND tb_user.nama_cabang = '".$stat->nama_cabang."'");

				$lunas = $query->row()->status;
				$belumlunas = $query1->row()->status;
				$biaya_awal = $sql->row()->total;
				$pot = $sql1->row()->potongan;
				$bayaran_awal = $sql2->row()->dp;
				$angsuran_1 = $sql3->row()->a1;
				$angsuran_2 = $sql4->row()->a2;
				$angsuran_3 = $sql5->row()->a3;
				$tagihanlebih = $sql6->row()->tagihan;
				$tagihansama = $sql7->row()->tagihan;
				$tagihankurang = $sql8->row()->tagihan;
				$price = $biaya_awal - $pot;
				$arp = $bayaran_awal + $angsuran_1 + $angsuran_2 + $angsuran_3;
				$aro = $price - $arp;

				$pe->setActiveSheetIndex(0)->setCellValue('D'.$numrows,$lunas);
				$pe->setActiveSheetIndex(0)->setCellValue('E'.$numrows,$belumlunas);
				$pe->setActiveSheetIndex(0)->setCellValue('F'.$numrows,'Rp '.$price);
				$pe->setActiveSheetIndex(0)->setCellValue('G'.$numrows,'Rp '.$arp);
				$pe->setActiveSheetIndex(0)->setCellValue('H'.$numrows,'Rp '.$aro);
				$pe->setActiveSheetIndex(0)->setCellValue('I'.$numrows,$tagihanlebih);
				$pe->setActiveSheetIndex(0)->setCellValue('J'.$numrows,$tagihansama);
				$pe->setActiveSheetIndex(0)->setCellValue('K'.$numrows,$tagihankurang);

			}
			$pe->getActiveSheet()->getColumnDimension('A')->setWidth(5);
			$pe->getActiveSheet()->getColumnDimension('B')->setWidth(20);
			$pe->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$pe->getActiveSheet()->getColumnDimension('D')->setWidth(20);
			$pe->getActiveSheet()->getColumnDimension('E')->setWidth(20);
			$pe->getActiveSheet()->getColumnDimension('F')->setWidth(20);
			$pe->getActiveSheet()->getColumnDimension('G')->setWidth(20);
			$pe->getActiveSheet()->getColumnDimension('H')->setWidth(20);
			$pe->getActiveSheet()->getColumnDimension('I')->setWidth(10);
			$pe->getActiveSheet()->getColumnDimension('J')->setWidth(10);
			$pe->getActiveSheet()->getColumnDimension('K')->setWidth(10);

			$pe->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
			$pe->getActiveSheet(0)->setTitle("Data Statistik Cabang");
			$pe->setActiveSheetIndex(0);

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Statistik Cabang.xls"');
			header('Cache-Control: max-age=0');

			$writer=PHPExcel_IOFactory::createwriter($pe, 'Excel2007');
			ob_end_clean();
			$writer->save('php://output');
			exit;

		}

	}

?>