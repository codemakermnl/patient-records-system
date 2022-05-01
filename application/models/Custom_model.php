<?php 
date_default_timezone_set('Asia/Taipei');

	class Custom_model extends CI_Model{

		public function get_all_users() { 
			$this->db->select("*");
			$this->db->from("users");
			$this->db->where("users.position_id = ", 2);
			$q = $this->db->get();
			return $q->result();
		}

		
		public function get_patients() { 
			$this->db->select("personal_info.*,year(curdate())-year(personal_info.birth_date) - (right(curdate(),5) < right(personal_info.birth_date,5)) AS age, SHA1(personal_info.personal_info_id) AS hash_id");
			$this->db->from("personal_info");
			$this->db->where("personal_info.date_archived IS NULL");
			$q = $this->db->get();
			return $q->result();
		}

		public function get_patient($personal_info_id) {
			$this->db->select("personal_info.*, year(curdate())-year(personal_info.birth_date) - (right(curdate(),5) < right(personal_info.birth_date,5)) AS age, consultation.*, family_history.*, physical_exam.*, prescription.*");
			$this->db->from("personal_info");
			$this->db->join("family_history", "personal_info.personal_info_id = family_history.personal_info_id");
			$this->db->join("consultation", "personal_info.personal_info_id = consultation.personal_info_id");
			$this->db->join("physical_exam", "personal_info.personal_info_id = physical_exam.personal_info_id");
			$this->db->join("prescription", "personal_info.personal_info_id = prescription.personal_info_id");
			$this->db->where("personal_info.date_archived IS NULL");
			$this->db->where("SHA1(personal_info.personal_info_id) = ", $personal_info_id);
			$q = $this->db->get();

		    if ($q->num_rows() > 0) {
		      $row = $q->row();
		      return $row;
		    }

		    return null;
		}

		public function get_user_account($user_id) {
			$this->db->select("personal_info.*");
			$this->db->from("personal_info");
			// $this->db->join("patient_dose", "personal_info.personal_info_id = patient_dose.personal_info_id", "left");
			$this->db->where("personal_info.user_id = ", $user_id);
			$q = $this->db->get();
			return $q->result();
		}
	

	}