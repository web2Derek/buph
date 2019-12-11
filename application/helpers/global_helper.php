<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('raw')) {
	function raw($query,$result = 'array'){
		$ci =& get_instance();
        $query = $ci->db->get($sql);

        switch ($result) {
            case 'array':
                return $query->result_array();
            break;
            case 'obj':
                return $query->result();
            break;
            case 'row':
            return $query->row();
                break;
            case 'count':
                return $query->num_rows();
            break;
            default:
                return $query->result_array();
            break;
        }
    }
}

if(!function_exists('getrow')) {
	function getrow($table,$options = array(),$result = 'array'){
		$ci =& get_instance();
        (!empty($options['select'])) ? $ci->db->select($options['select']) : $ci->db->select("*");

        (!empty($options['where'])) ? $ci->db->where($options['where']) : null;

        (!empty($options['or_where'])) ? $ci->db->or_where($options['or_where']) : null;

        (!empty($options['where_not_in'])) ? $ci->db->where_not_in($options['where_not_in']['col'],$options['where_not_in']['value']) : null;

        (!empty($options['where_in'])) ? $ci->db->where_in($options['where_in']['col'],$options['where_in']['value']) : null;

        if(!empty($options['join'])){
            foreach($options['join'] as $key => $value){
                if(strpos($value,':') !== false){
                    $_join = explode(":",$value);
                    $ci->db->join($key,$_join[0],$_join[1]);
                } else {
                    $ci->db->join($key,$value);
                }
            }
        }

        (!empty($options['group'])) ? $ci->db->group_by($options['group']) : null;

        (!empty($options['limit'])) ? $ci->db->limit($options['limit'][0],$options['limit'][1]) : null;

        (!empty($options['order'])) ? $ci->db->order_by($options['order']) : null;

        $query = $ci->db->get($table);

        switch ($result) {
            case 'array':
                return $query->result_array();
            break;
            case 'obj':
                return $query->result();
            break;
            case 'row':
            return $query->row();
                break;
            case 'count':
                return $query->num_rows();
            break;
            default:
                return $query->result_array();
            break;
        }
	}
}

if(!function_exists('datatables')){
	function datatables($table, $column_order, $select = "*", $where = "", $join = array(), $limit, $offset, $search, $order,$group = ''){
		$ci =& get_instance();
		$ci->db->from($table);
		$columns = $ci->db->list_fields($table);
		if($select){
			$ci->db->select($select);
		}
		if($where){
			$ci->db->where($where);
		}
		if($join){
			foreach ($join as $key => $value) {
				$ci->db->join($key,$value,'left');
			}
		}
		if($search){
			$ci->db->group_start();
			foreach ($column_order as $item) {
				$ci->db->or_like($item, $search['value']);
			}
			$ci->db->group_end();
		}
		if($group)
			$ci->db->group_by($group);

		if($order)
			$ci->db->order_by($column_order[$order['0']['column']], $order['0']['dir']);

			$temp = clone $ci->db;
			$data['count'] = $temp->count_all_results();

		if($limit != -1)
			$ci->db->limit($limit, $offset);

		$query = $ci->db->get();
		$data['data'] = $query->result();
		$data['last_query'] = $ci->db->last_query();
		$ci->db->from($table);
		$data['count_all'] = $ci->db->count_all_results();
		return $data;
    }
}

if(!function_exists('insert')) {
	function insert($table,$data){
		$ci =& get_instance();
        $ci->db->insert($table,$data);
        return $ci->db->insert_id();
    }
}

if(!function_exists('batch_insert')) {
	function batch_insert($table,$data){
		global $ci;
        $ci->db->batch_insert($table,$set);
        return true;
    }
}

if(!function_exists('update')) {
	function update($table,$set,$where){
		$ci =& get_instance();
        $ci->db->where($where);
        $ci->db->update($table,$set);
        return true;
    }
}

if(!function_exists('delete')) {
	function delete($table,$where){
		$ci =& get_instance();
        $ci->db->where($where);
        $ci->db->delete($table);
        return true;
    }
}

if(!function_exists('json')) {
	function json($data,$isJson = true){
		if($isJson){
            echo json_encode($data);
        } else {
            echo "<pre>";
                print_r($data);
            echo "</pre>";
        }
    }
}

if(!function_exists('post')) {
	function post($key){
        $ci =& get_instance();
		return ($ci->input->post($key)) ? $ci->input->post($key) : null;
    }
}

if (!function_exists('sesdata')) {
    function sesdata($data = '' , $json = true){
        $ci =& get_instance();
        return $ci->session->userData($data ? $data : null);
    }
}

if(!function_exists('calculateAge')){
	function calculateAge($date){
		$today = date("Y-m-d");
		$diff = date_diff(date_create($date), date_create($today));
		return $diff->format('%y');
	}
}
?>
