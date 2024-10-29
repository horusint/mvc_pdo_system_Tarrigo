<?php
require 'model/model.php';
require 'csrf_token.php';

class Controller {
    private $model;
    private $csrf;

    public function __construct() {
        $this->model = new Model();
        $this->csrf = new csrf_check();
    }

    public function handleRequest() {
      $action = $_GET['action'] ?? 'login';
    
      switch ($action) {
        case 'register':
          $this->register();
          break;
        case 'forgotPassword':
          $this->forgotPassword();
          break;
        default:
          $this->showLogin();
          break;
      }
    }

    public function showLogin() {
        include 'view/login.php';
    }

    public function register() {
        $error = "";
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repeat_password = $_POST['repeat_password'];

            if ($password !== $repeat_password) {
                $error = "Las contraseñas no coinciden.";
            } elseif (!preg_match("/^(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}$/", $password)) {
                $error = "La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula, un número y un símbolo.";
            } elseif ($this->model->isEmailOrDniTaken($dni, $email)) {
                $error = "El DNI o correo ya está registrado.";
            } else {
                if ($this->model->createUser($dni, $nombre, $apellido, $fecha_nacimiento, $email, $password)) {
                    header('Location: view/register_success.php');
                    exit();
                } else {
                    $error = "Error al registrar el usuario.";
                }
            }
        }

        include 'view/form_create.php';
    }

    public function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
    
            // Validación CSRF
            if ($this->csrf->validate_csrf_token($_POST['csrf_token'])) {
                // Verificar si el correo está registrado
                if ($this->model->checkEmailExists($email)) {
                    // Redirigir a la página de éxito
                    header("Location: view/reset_success.php");
                    exit();
                } else {
                    $error = "Correo incorrecto o no registrado";
                }
            } else {
                $error = "Token CSRF inválido";
            }
        }
        include 'view/forgot_password.php';
    }

  public function buscar_logs($email) {
    $model = new Model();
    $logs = $model->buscar_logs($email);
    return $logs;
  }
}