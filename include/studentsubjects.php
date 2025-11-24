<?php
require_once(LIB_PATH.DS.'database.php');

class StudentSubjects {
    protected static $tblname = "studentsubjects";

    function dbfields () {
        global $mydb;
        return $mydb->getfieldsononetable(self::$tblname);
    }

    function listofStudentSubjects(){
        global $mydb;
        $mydb->setQuery("SELECT * FROM ".self::$tblname);
        return $mydb->loadResultList();
    }

    function find_StudentSubjects($id="",$name=""){
        global $mydb;
        $id_esc = $mydb->escape_value($id);
        $name_esc = $mydb->escape_value($name);
        $mydb->setQuery("SELECT * FROM ".self::$tblname." 
            WHERE STUDSUBJ_ID = '{$id_esc}' OR LNAME = '{$name_esc}'");
        $cur = $mydb->executeQuery();
        $row_count = $mydb->num_rows($cur);
        return $row_count;
    }

    function find_all_StudentSubjects($name=""){
        global $mydb;
        $name_esc = $mydb->escape_value($name);
        $mydb->setQuery("SELECT * FROM ".self::$tblname." 
            WHERE LNAME = '{$name_esc}'");
        $cur = $mydb->executeQuery();
        $row_count = $mydb->num_rows($cur);
        return $row_count;
    }

    function single_StudentSubjects($id=""){
        global $mydb;
        $id_esc = $mydb->escape_value($id);
        $mydb->setQuery("SELECT * FROM ".self::$tblname." 
            WHERE STUDSUBJ_ID= '{$id_esc}' LIMIT 1");
        $cur = $mydb->loadSingleResult();
        return $cur;
    }

    /**
     * Robust fetch of enrolled subjects for a student.
     * Tries multiple ID string variants to handle mismatched ID formats.
     *
     * @param string|int $idno
     * @param string|null $sy
     * @param string|null $semester
     * @return array|object[] - result list (as returned by your $mydb->loadResultList())
     */
    public function get_enrolled_by_student($idno=0, $sy = null, $semester = null) {
        global $mydb;
        $id_raw = trim((string)$idno);
        if ($id_raw === '') {
            return [];
        }

        // Build candidate ID variants (string-safe)
        $candidates = [$id_raw];

        // add trimmed leading zeros version and unpadded numeric
        if (ctype_digit($id_raw)) {
            $candidates[] = ltrim($id_raw, '0'); // without leading zeros
            // zero-pad to common lengths (7,8) if needed - helps if some records store fixed-width
            $candidates[] = str_pad(ltrim($id_raw, '0'), 7, '0', STR_PAD_LEFT);
            $candidates[] = str_pad(ltrim($id_raw, '0'), 8, '0', STR_PAD_LEFT);
        }

        // Add uppercase/lowercase variants (if alphanumeric)
        $candidates[] = strtoupper($id_raw);
        $candidates[] = strtolower($id_raw);

        // unique and sanitize
        $candidates = array_values(array_unique(array_filter($candidates, function($v){ return $v !== ''; })));

        // escape and quote
        $escaped = array_map(function($v) use ($mydb) { return "'" . $mydb->escape_value($v) . "'"; }, $candidates);
        if (empty($escaped)) return [];

        $inList = implode(',', $escaped);

        // base query - join to subject for metadata
        $sql = "SELECT st.*, s.SUBJ_CODE, s.SUBJ_DESCRIPTION, s.UNIT, st.AVERAGE, st.OUTCOME, s.SEMESTER AS SUBJ_SEMESTER
                FROM ". self::$tblname ." st
                LEFT JOIN `subject` s ON s.SUBJ_ID = st.SUBJ_ID
                WHERE st.IDNO IN ({$inList})";

        if (!empty($semester)) {
            $sem = $mydb->escape_value($semester);
            $sql .= " AND st.SEMESTER = '{$sem}'";
        }
        if (!empty($sy)) {
            $sy_esc = $mydb->escape_value($sy);
            $sql .= " AND (st.SY = '{$sy_esc}' OR st.SY IS NULL)";
        }

        $sql .= " ORDER BY s.SUBJ_CODE ASC";

        // execute using project's DB wrapper if present
        if (method_exists($mydb, 'setQuery')) {
            $mydb->setQuery($sql);
            if (method_exists($mydb, 'loadResultList')) {
                return $mydb->loadResultList();
            }
            // fallback to executeQuery + fetch
            if (method_exists($mydb, 'executeQuery')) {
                $res = $mydb->executeQuery();
                $rows = [];
                if ($res) {
                    while ($r = mysqli_fetch_assoc($res)) $rows[] = $r;
                }
                return $rows;
            }
        }

        // last fallback raw mysqli if connection available
        if (isset($mydb->conn) && $mydb->conn instanceof mysqli) {
            $res = $mydb->conn->query($sql);
            $rows = [];
            if ($res) {
                while ($row = $res->fetch_assoc()) {
                    $rows[] = $row;
                }
                $res->free();
            }
            return $rows;
        }

        return [];
    }

    /*---Instantiation of Object dynamically---*/
    static function instantiate($record) {
        $object = new self;
        foreach($record as $attribute=>$value){
          if($object->has_attribute($attribute)) {
            $object->$attribute = $value;
          }
        }
        return $object;
    }

    /*--Cleaning the raw data before submitting to Database--*/
    private function has_attribute($attribute) {
      return array_key_exists($attribute, $this->attributes());
    }

    protected function attributes() {
      global $mydb;
      $attributes = array();
      foreach($this->dbfields() as $field) {
        if(property_exists($this, $field)) {
            $attributes[$field] = $this->$field;
        }
      }
      return $attributes;
    }

    protected function sanitized_attributes() {
      global $mydb;
      $clean_attributes = array();
      foreach($this->attributes() as $key => $value){
        $clean_attributes[$key] = $mydb->escape_value($value);
      }
      return $clean_attributes;
    }

    /*--Create,Update and Delete methods--*/
    public function save() {
      // if STUDSUBJ_ID is present, update, else create
      return isset($this->STUDSUBJ_ID) && !empty($this->STUDSUBJ_ID) ? $this->update($this->STUDSUBJ_ID) : $this->create();
    }

    public function create() {
        global $mydb;
        $attributes = $this->sanitized_attributes();
        $sql = "INSERT INTO ".self::$tblname." (" . join(", ", array_keys($attributes)) . ") VALUES ('" . join("','", array_values($attributes)) . "')";
        $mydb->setQuery($sql);
        if($mydb->executeQuery()) {
            // insert id might be available as $mydb->insert_id()
            if (property_exists($mydb, 'insert_id') && !empty($mydb->insert_id)) {
                $this->STUDSUBJ_ID = $mydb->insert_id;
            } elseif (method_exists($mydb, 'insert_id')) {
                $this->STUDSUBJ_ID = $mydb->insert_id();
            } elseif (isset($mydb->conn) && $mydb->conn instanceof mysqli) {
                $this->STUDSUBJ_ID = $mydb->conn->insert_id;
            }
            return true;
        } else {
            return false;
        }
    }

    public function update($id=0) {
      global $mydb;
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = array();
        foreach($attributes as $key => $value) {
          $attribute_pairs[] = "{$key}='{$value}'";
        }
        $id_esc = $mydb->escape_value($id);
        $sql = "UPDATE ".self::$tblname." SET " . join(", ", $attribute_pairs) . " WHERE STUDSUBJ_ID=". $id_esc;
        $mydb->setQuery($sql);
        if(!$mydb->executeQuery()) return false;
        return true;
    }

    public function updateSubject($sid=0,$idno=0) {
      global $mydb;
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = array();
        foreach($attributes as $key => $value) {
          $attribute_pairs[] = "{$key}='{$value}'";
        }
        $sid_esc = $mydb->escape_value($sid);
        $idno_esc = $mydb->escape_value($idno);
        $sql = "UPDATE ".self::$tblname." SET " . join(", ", $attribute_pairs) . " WHERE SUBJ_ID=". $sid_esc." AND IDNO='".$idno_esc."'";
        $mydb->setQuery($sql);
        if(!$mydb->executeQuery()) return false;
        return true;
    }

    public function delete($id=0) {
        global $mydb;
          $id_esc = $mydb->escape_value($id);
          $sql = "DELETE FROM ".self::$tblname." WHERE STUDSUBJ_ID=". $id_esc . " LIMIT 1";
          $mydb->setQuery($sql);
            if(!$mydb->executeQuery()) return false;
            return true;
    }
}
?>
