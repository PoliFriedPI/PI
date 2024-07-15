<?php

class DashboardController
{
    public function index() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=login&action=login");
            exit();
        }
        require_once './views/AdminDashboard.php';
    }

}