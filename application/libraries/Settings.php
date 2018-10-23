<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class settings {

	private $CI;


	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('aauth');

	}

	public function get_setting_subgroup($group){

		$this->CI->db->distinct();
		$this->CI->db->select('subgroup');
		$this->CI->db->from('settings');
		$this->CI->db->where('group',$group);
		//$this->CI->db->where('subgroup IS NOT NULL');

		$query = $this->CI->db->get();

		//print_r($query->result());

		return ($query->num_rows() > 0)?$query->result():FALSE;

	}

	public function get_settings($group,$subgroup = null){

		$this->CI->db->select('*');
		$this->CI->db->from('settings');
		$this->CI->db->where('group',$group);
		$this->CI->db->where('subgroup',$subgroup);

		$query = $this->CI->db->get();


		return ($query->num_rows() > 0)?$query->result():FALSE;

	}

	public function get($setting){

		$this->CI->db->select('*');
		$this->CI->db->from('settings');
		$this->CI->db->where('key',$setting);

		$query = $this->CI->db->get();

		$value = $query->row();

		return $value->value;

	}

	public function list_items($table) {
		$this->CI->db->select('*');
		$this->CI->db->from($table);
		$query = $this->CI->db->get();
		return $query->result();
	}

	public function get_input($input, $name, $key, $value,$select_table=null,$select_column=null,$select_id=null){
		switch ($input) {
			case "text":
				$html = '<div class="form-group">
                                <label>'.$name.'</label>
                                <input type="text" class="form-control" name="'.$key.'" value="'.$value.'">
                            </div>';
				break;
			case "upload":
				$html = '<div class="form-group">
                                    <label>'.$name.'</label>
                                <input type="text" class="form-control" name="'.$key.'" value="'.$value.'">
                                </div>';
				break;
			case "bigtext":
				$html = '<div class="form-file">
                                    <label>'.$name.'</label>
                                    <textarea class="form-control" rows="10" name="'.$key.'">'.$value.'</textarea>
                                </div>';
				break;

			case "switch":
				if($value == 'on')
					$checked = 'checked';
				else
					$checked = '';
				$html = '<div class="form-group">
						  <label>'.$name.'</label>
						  <div class="col-sm-10">
						  <input type="hidden" name="'.$key.'" value="off">
							<label class="ui-switch data-ui-switch-md info m-t-xs">
							  <input '.$checked.' type="checkbox" name="'.$key.'">

							  <i></i>
							</label>

						  </div>
						</div>	';
				break;
			case "select":


				$html = '<div class="form-group">
        <label for="single">'.$name.'</label>
        <select id="single" class="form-control select2" data-ui-jp="select2" data-ui-options="{theme: \' bootstrap \'}" name="'.$key.'">';


				$items = $this->list_items($select_table);


				foreach($items as $item){
					$html = $html . '<option ';
					if($value == $item->$select_id)
						$html = $html .'selected="selected"';
					$html = $html .'value="'.$item->$select_id.'">'.$item->$select_column.'</option>';
				}

				$html = $html . '
        </select>
      </div>';
				break;
		}

		return $html;
	}

	function save_settings($key,$value){
		$data = array(
				'value' => $value
		);

		$this->CI->db->where('key', $key);
		$query = $this->CI->db->update('settings', $data);


		return $query;

	}



}


/* End of file Settings.php */
/* Location: ./sparks/settings/1.0.0/libraries/Settings.php */