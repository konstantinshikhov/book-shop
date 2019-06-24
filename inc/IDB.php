<?php


interface IDB
{
    public function execute($sql);
    public function query($sql);
    public function escape($sql);
    public function affected();
    public function insertId();
}