<?php
class querybuilder extends CI_Model{
    public function selectview($table) {
        return $this->db->get($table)->result();
    }
    public function selectviewwhere($table, $where) {
        return $this->db->get_where($table, $where)->result();
    }
    public function numrowswhere($table, $where) {
        return $this->db->get_where($table, $where)->num_rows();
    }
    public function insertonedata($table, $data) {
        return $this->db->insert($table, $data);
    }
    public function updateonedatawhere($table, $data, $where) {
        return $this->db->update($table, $data, $where);
    }
    public function query($query) {
        return $this->db->query($query)->result();
    }
    public function update_batch_ignore($table = '', $set = NULL, $index = NULL) {
        $this->_merge_cache();if ($index === NULL) return ($this->db_debug) ? $this->display_error('db_must_use_index') : FALSE;if ($set !== NULL)$this->set_update_batch_ignore($set, $index);if (count($this->qb_set) === 0)return ($this->db_debug) ? $this->display_error('db_must_use_set') : FALSE;if ($table === '') {if (!isset($this->qb_from[0]))return ($this->db_debug) ? $this->display_error('db_must_set_table') : FALSE;$table = $this->qb_from[0];}$affected_rows = 0;for ($i = 0, $total = count($this->qb_set); $i < $total; $i += 100) {$this->query($this->_update_batch_ignore($this->protect_identifiers($table, TRUE, NULL, FALSE), array_slice($this->qb_set, $i, 100), $this->protect_identifiers($index)));$affected_rows += $this->affected_rows();$this->qb_where = array();}$this->_reset_write();return $affected_rows;
    }
    protected function _update_batch_ignore($table, $values, $index) {
        $ids = array();foreach ($values as $key => $val) {$ids[] = $val[$index];foreach (array_keys($val) as $field)if ($field !== $index)$final[$field][] = 'WHEN ' . $index . ' = ' . $val[$index] . ' THEN ' . $val[$field];}$cases = '';foreach ($final as $k => $v)$cases .= $k . " = CASE \n". implode("\n", $v) . "\n". 'ELSE ' . $k . ' END, ';$this->where($index . ' IN(' . implode(',', $ids) . ')', NULL, FALSE);return 'UPDATE IGNORE' . $table . ' SET ' . substr($cases, 0, -2) . $this->_compile_wh('qb_where');
    }

    public function set_update_batch_ignore($key, $index = '', $escape = NULL) {
        $key = $this->_object_to_array_batch($key);if (!is_array($key)) {}is_bool($escape) OR $escape = $this->_protect_identifiers;foreach ($key as $k => $v) {$index_set = FALSE;$clean = array();foreach ($v as $k2 => $v2) {if ($k2 === $index)$index_set = TRUE;$clean[$this->protect_identifiers($k2, FALSE, $escape)] = ($escape === FALSE) ? $v2 : $this->escape($v2);}if ($index_set === FALSE)return $this->display_error('db_batch_missing_index');$this->qb_set[] = $clean;}return $this;
    }
}
?>