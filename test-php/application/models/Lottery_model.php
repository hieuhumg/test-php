<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 8/21/2019
 * Time: 10:27 PM
 */
    class Lottery_model extends CI_Model
    {
        public function __construct()
        {
            $this->db = $this->load->database('default', TRUE);
        }

        public function getList($table, $select = '', $where = array(), $limit = 10, $start = 0, $order = array())
        {
            $this->db->select($select);
            $this->db->from($table);
            if (count($where) > 0) {
                foreach ($where as $item) {
                    $this->db->where($item['field'], $item['value']);
                }
            }
            $this->db->limit($limit, $start);
            if (count($order) > 0) {
                $this->db->order_by($order['field'], $order['order']);
            }

            return $this->db->get()->result();
        }

        public function countRecord($table, $where = array())
        {
            $this->db->from($table);
            if (count($where) > 0) {
                foreach ($where as $item) {
                    $this->db->where($table . '.' .$item['field'], $item['value']);
                }
            }
            return $this->db->count_all_results();
        }

        public function searchDate($table,$select, $since, $todate)
        {
            $this->db->select($select);
            $this->db->from($table);
            $this->db->where('loggingTime >=', $since);
            $this->db->where('loggingTime <=', $todate);
            $query = $this->db->get()->result();
            return $query;
        }
    }