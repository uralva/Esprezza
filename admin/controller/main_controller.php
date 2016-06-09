<?php
  class Main_Controller{
    public function __construct(){
      die('No se instancian objetos');
    }
    private static function is_Cookies(){
      return (isset($_COOKIE['__ugate']) && isset($_COOKIE['__uanchor']) && isset($_COOKIE['__ukey']))  ?  '2' : '1';
    }
    private static function is_Session(){
      $_SESSION['ACTION'] = isset($_SESSION['ID']) ? '3' : self::is_Cookies();
    }
    public static function Initialize(){
      self::is_Session();
      switch($_SESSION['ACTION']){ 
        case ('1' == $_SESSION['ACTION'] || $_SESSION['ACTION'] == '2'):
          require_once($_SESSION['BASE_DIR_BACKEND'].'/controller/login_controller.php');
          Login_Controller::Initialize();
        break;
        case ('3'):
          require_once($_SESSION['BASE_DIR_BACKEND'].'/controller/panel_controller.php');
          Panel_Controller::Initialize();
        break;
      }
    }
    public function __destruct(){
      die('No se instancian objetos');
    }
  }

  Main_Controller::Initialize();
?>

