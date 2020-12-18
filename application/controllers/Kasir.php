<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Kasir';
		$data['product'] = $this->Model_Product->tampil_data($this->input->post('category'))->result();

		$this->load->view('kasir/index', $data);
	}

	public function print()
	{
		$data['title'] = "Ferdy Frozen Food";
		$data['transaksi'] = $this->Model_Transaksi->nota_transaksi()->row_array();
		$data['detail_transaksi'] = $this->Model_Transaksi->nota_detail_transaksi()->result();

		$this->load->view('kasir/print', $data);
	}

	public function insert()
	{
		$data = array(
			'tanggal' => date("Y-m-d"),
			'total' => $this->cart->total(),
			'kasir_id' => $this->session->userdata('id')
		);

		$this->Model_Transaksi->insert($data, 'tb_transaksi');

		foreach ($this->cart->contents() as $items) {
			$data2 = array(
				'transaksi_id' => $this->Model_Transaksi->getLastId(),
				'produk_id' => $items['id'],
				'qty' => $items['qty'],
				'subtotal' => $items['subtotal'],
			);

			$this->Model_Transaksi->insert($data2, 'tb_detail_transaksi');
		}

		$this->cart->destroy();
		redirect('kasir/print');
	}

	public function add()
	{
		$data = array(
			'id' => $_POST['id'],
			'name' => $_POST['nama'],
			'price' => $_POST['price'],
			'qty' => $_POST['qty']
		);

		$this->cart->insert($data);
		echo $this->view();
	}

	public function remove()
	{
		$row_id = $_POST['row_id'];
		$data = array(
			'rowid' => $row_id,
			'qty' => 0
		);
		$this->cart->update($data);
		echo $this->view();
	}

	public function up()
	{
		$row_id = $_POST['row_id'];
		$qty = $_POST['qty'];

		$data = array(
			'rowid' => $row_id,
			'qty' => $qty + 1
		);
		$this->cart->update($data);
		echo $this->view();
	}

	public function down()
	{
		$row_id = $_POST['row_id'];
		$qty = $_POST['qty'];

		$data = array(
			'rowid' => $row_id,
			'qty' => $qty - 1
		);
		$this->cart->update($data);
		echo $this->view();
	}

	public function load()
	{
		echo $this->view();
	}

	public function view()
	{
		$output = '';
		$output .= '
			<div class="table-responsive">
				<table class="table">
					<thead class="thead-light">
						<tr class="text-center">
							<th colspan="2" width="500vw">Produk</th>
							<th width="">Total</th>
						</tr>
					</thead>
		';
		$count = 0;
		foreach ($this->cart->contents() as $items) {
			$count++;
			$output .= '
				<tbody>
					<tr>
						<td><a class="btn btn-xs remove" id="' . $items["rowid"] . '"><i class="fa fa-times"></i></a></td>
						<td>
							<h6>' . $items['name'] . '</h6>
							<p class="text-success">Rp' . number_format($items['price'], 0, ',', '.') . '</p>
							<a class="btn btn-xs down" id="' . $items["rowid"] . '" data-qty="' . $items['qty'] . '"><i class="fa fa-minus"></i></a>
							<input type="text" disabled class="text-center col-sm-3" value="' . $items['qty'] . '">
							<a class="btn btn-xs up" id="' . $items["rowid"] . '" data-qty="' . $items['qty'] . '"><i class="fa fa-plus"></i></a>
						</td>
						<td  class="text-center">Rp' . number_format($items['subtotal'], 0, ',', '.') . '</td>
					</tr>
			';
		}
		$output .= '
			<tr>
				<td colspan="2" align="right">
					<h6>Total</h6>
				</td>
				<td class="text-center">
					<h6>Rp' . number_format($this->cart->total(), 0, ',', '.') . '</h6>
					<input type="hidden" id="total" value="' . $this->cart->total() . '">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<p class="pt-2">Bayar</p>
					<p class="pt-1">Kembali</p>
				</td>
				<td class="">
					<input type="text" id="bayar" class="col-sm-12 form-control" onkeydown="insert()" onkeyup="count()">
					<input type="text" id="kembali" class="col-sm-12 form-control mt-2" disabled>
				</td>
			</tr>
			</tbody>
			</table>
			</div>
		';

		if ($count == 0) {
			$output = '<h4 class="text-center text-muted">Kosong</h4>';
		}
		return $output;
	}
}
