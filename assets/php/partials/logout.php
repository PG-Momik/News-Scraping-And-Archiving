<?php
include_once 'sessionStart.php';
include_once 'sessionVerification.php';

session_unset();
session_destroy();

header("location:../../../index.php");