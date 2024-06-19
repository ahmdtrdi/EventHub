<?php
session_start();

if (!isset($_SESSION['email'])) {
  header('Location: signin.php');
  exit();
}

if (!isset($_SESSION['role'])) {
  // Handle the case where the role is not set
  exit();
}

if ($_SESSION['role'] == 'admin') {
  header('Location: homepageadmin.php');
  exit();
} elseif ($_SESSION['role'] == 'user') {
  header('Location: homepageuser.php');
  exit();
} else {
  // Handle the case where the role is not 'admin' or 'user'
  exit();
}