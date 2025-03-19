<!-- To display value and set as active -->
<!-- Removed echo beside $page to fix the bug, keep displaying route from the body. -->
<?php $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1); ?>