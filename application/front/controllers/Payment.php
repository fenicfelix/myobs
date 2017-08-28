<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
	function __construct()
    {
        // Construct the parent class
        parent::__construct();
		$this->load->model('my_database');
		
		date_default_timezone_set("Africa/Nairobi");
    }
	
	public function update_payment() {
		$data = json_decode(file_get_contents('php://input'), true);
		if($data) {
			$trx_data = [
				'msisdn' => $data["msisdn"],
				'amount' => $data["amount"],
				'merchant_trx_id' => $data["merchant_trx_id"],
				'trx_id' => $data["trx_id"],
				'mpesa_trx_id' => $data["mpesa_trx_id"],
				'payment_date' => $data["payment_date"],
				'status' => $data["status"],
				'message' => $data["message"]
			];
			$payment = $this->my_database->getSpecific("payments", ["merchant_trx_id" => $data["merchant_trx_id"]]);
			if($payment) {
				$update = $this->my_database->updateData("payments", "payment_id", $payment->payment_id, $trx_data);
				if($data["status"] == "Success") $this->my_database->updateData('downloads', 'payment_id', $payment->payment_id, ['status' => 'COMPLETE']);
				if($update) {
					echo json_encode(['status' => "Y", 'message' => 'Success', 'data' => []]);
				} else {
					echo json_encode(['status' => "N", 'message' => 'Not Updated', 'data' => []]);
				}
			} else {
				echo json_encode(['status' => "N", 'message' => 'Order does not exist', 'data' => []]);
			}
		} else {
			echo json_encode(['status' => "N", 'message' => 'no_data', 'data' => []]);
		}
	}
}
