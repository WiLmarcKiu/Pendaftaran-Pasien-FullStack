<?php
if (!isset($_SESSION)) {
    session_start();
}
$koneksi = new mysqli("localhost", "root", "", "simpeg");
