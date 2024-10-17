<?php
class Model {
    private $pdo;

    public function __construct() {
        $host = '127.0.0.1';
        $db = 'seguridad_db';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            die('Error de conexión: ' . $e->getMessage());
        }
    }

    public function authenticateUser($email, $password) {
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Verificar si la contraseña es correcta
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Devolver los datos del usuario
        }

        return false; // Usuario no autenticado
    }

    public function getUsers() {
        // Modificar la consulta para incluir el nombre del rol usando JOIN
        $stmt = $this->pdo->query('
            SELECT usuarios.id, usuarios.nombre, usuarios.email, roles.rol_nombre 
            FROM usuarios 
            JOIN roles ON usuarios.rol_id = roles.id
        ');
        return $stmt->fetchAll();
    }

    public function createUser($nombre, $email, $password, $rol_id) {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nombre, email, password, rol_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nombre, $email, password_hash($password, PASSWORD_BCRYPT), $rol_id]);
    }

    public function updateUser($id, $nuevoNombre, $email, $rol_id) {
        $stmt = $this->pdo->prepare('UPDATE usuarios SET nombre = ?, email = ?, rol_id = ? WHERE id = ?');
        return $stmt->execute([$nuevoNombre, $email, $rol_id, $id]);
    }
    

    public function deleteUser($id) {
        $stmt = $this->pdo->prepare('DELETE FROM usuarios WHERE id = ?');
        return $stmt->execute([$id]);
    }

    public function getRoles() {
        $stmt = $this->pdo->query('SELECT * FROM roles');
        return $stmt->fetchAll();
    }
    
    public function getUserById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }    
}
?>
