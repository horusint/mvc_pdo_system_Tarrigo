<?php
require 'model/model.php';

class Controller {
    private $model;

    public function __construct() {
        $this->model = new Model();
    }

    public function handleRequest() {
        // Por defecto, si no hay acción en la URL, se carga 'login'
        $action = $_GET['action'] ?? 'login'; 

        switch ($action) {
            case 'register':
                $this->register();
                break;
            case 'forgotPassword':
                $this->forgotPassword();
                break;
            case 'dashboard':
                $this->showDashboard();
                break;
            default:
                $this->showLogin();
                break;
        }
    }

    // Método para mostrar el formulario de login
    public function showLogin() {
        include 'view/login.php';
    }

    // Método para procesar el inicio de sesión
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Verificar credenciales
            $user = $this->model->authenticateUser($email, $password);
            if ($user) {
                $_SESSION['user'] = $user; // Guardar usuario en sesión
                header('Location: index.php?action=dashboard'); // Redirigir al dashboard
                exit();
            } else {
                $error = 'Usuario o contraseña incorrectos';
                include 'view/login.php'; // Volver a mostrar el login con el error
            }
        }
    }

    // Método para registrar un nuevo usuario
    public function register() {
        // Mostrar el formulario de registro
        include 'view/form_create.php'; // Si usas un archivo diferente, cámbialo aquí
    }

    // Método para recuperar la contraseña
    public function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];

            // Verificar si el email está registrado
            if ($this->model->checkEmailExists($email)) {
                $success = "Se ha enviado un enlace de recuperación a tu correo.";
                include 'view/forgot_password.php';
            } else {
                $error = "No se encontró una cuenta con ese email.";
                include 'view/forgot_password.php';
            }
        } else {
            include 'view/forgot_password.php';
        }
    }

    // Método para mostrar el dashboard del admin
    public function showDashboard() {
        $users = $this->model->getUsers();
        include 'view/dashboard.php';
    }

    // Método para listar usuarios (para ser utilizado en el dashboard)
    public function listUsers() {
        $users = $this->model->getUsers();
        include 'view/view.php'; // Pasamos los datos de los usuarios a la vista
    }

    // Método para crear un nuevo usuario
    public function createUser() {
        // Obtener roles para el select
        $roles = $this->model->getRoles();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $rol_id = $_POST['rol_id'];
    
            if ($this->model->createUser($nombre, $email, $password, $rol_id)) {
                $_SESSION['message'] = 'Usuario creado con éxito.';
            } else {
                $_SESSION['message'] = 'Error al crear el usuario.';
            }
    
            // Redirigir a view.php
            header('Location: index.php?action=dashboard');
            exit();
        }
    
        include 'view/form_create.php';
    }

    // Método para actualizar un usuario
    public function updateUser() {
        // Obtener datos del usuario y roles para el formulario
        $id = $_GET['id'];
        $user = $this->model->getUserById($id);
        $roles = $this->model->getRoles();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nuevoNombre = $_POST['nuevoNombre'];
            $email = $_POST['email'];
            $rol_id = $_POST['rol_id'];
    
            if ($this->model->updateUser($id, $nuevoNombre, $email, $rol_id)) {
                $_SESSION['message'] = 'Usuario actualizado con éxito.';
            } else {
                $_SESSION['message'] = 'Error al actualizar el usuario.';
            }
    
            // Redirigir a view.php
            header('Location: index.php?action=dashboard');
            exit();
        }
    
        include 'view/form_update.php';
    }

    // Método para eliminar un usuario
    public function deleteUser() {
        $id = $_GET['id'];
    
        // Intentar eliminar el usuario
        if ($this->model->deleteUser($id)) {
            $_SESSION['message'] = 'Usuario eliminado con éxito.';
        } else {
            $_SESSION['message'] = 'Error al eliminar el usuario.';
        }
    
        // Redirigir a view.php
        header('Location: index.php?action=dashboard');
        exit();
    }
}
?>
