<?php


class QueryResult implements Iterator
{
    private $_result;
    private $_key = 0;

    public function __construct($result) {
        $this->_result = $result;
    }

    public function fetch() {
        return mysqli_fetch_assoc($this->_result);
    }

    public function count() {
        return mysqli_num_rows($this->_result);
    }

    public function current() {
        return $this->fetch();
    }

    public function next() {
        $this->_key++;
    }

    public function key() {
        return $this->_key;
    }

    public function valid() {
        return $this->_key < $this->count();
    }

    public function rewind() {
        if ($this->count()) {
            mysqli_data_seek($this->_result, 0);
        }
        $this->_key = 0;
    }
}