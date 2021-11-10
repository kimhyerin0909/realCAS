<?php 
  include '../php/inc_head.php';
  if($jb_login == false) {
      echo '<script> alert("로그인 시 이용가능합니다."); location.href="../index.html";</script>';
  }
?>