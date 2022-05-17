<?php

class Auth extends Route {

    public function __construct() {

        parent::__construct();
    }

    public function login() {

        parent::connect();
        session_start();
        if (isset($_SESSION['session_id'])) {
                header('Location:' . HOME);
            exit;
        }

        if (isset($_POST['login'])) {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                $msg = 'Inserisci username e password %s';
            } else {
                $query = "
                    SELECT username, password
                    FROM users
                    WHERE username = :username
                ";

                $check = $this->pdo->prepare($query);
                $check->bindParam(':username', $username, PDO::PARAM_STR);
                $check->execute();

                $user = $check->fetch(PDO::FETCH_ASSOC);

                if (!$user || password_verify($password, $user['password']) === false) {
                    $msg = 'Credenziali utente errate %s';
                } else {
                    session_regenerate_id();
                    $_SESSION['session_id'] = session_id();
                    $_SESSION['session_user'] = $user['username'];

                    header('Location:' . HOME);
                    exit;
                }
            }
        }
    }

    public function register() {

        parent::connect();

        if (isset($_POST['register'])) {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $isUsernameValid = filter_var(
                $username,
                FILTER_VALIDATE_REGEXP, [
                    "options" => [
                        "regexp" => "/^[a-z\d_]{3,20}$/i"
                    ]
                ]
            );
            $pwdLenght = mb_strlen($password);

            if (empty($username) || empty($password)) {
                $msg = 'Compila tutti i campi %s';
            } elseif (false === $isUsernameValid) {
                $msg = 'Lo username non è valido. Sono ammessi solamente caratteri
                        alfanumerici e l\'underscore. Lunghezza minina 3 caratteri.
                        Lunghezza massima 20 caratteri';
            } elseif ($pwdLenght < 8 || $pwdLenght > 20) {
                $msg = 'Lunghezza minima password 8 caratteri.
                        Lunghezza massima 20 caratteri';
            } else {
                $password_hash = password_hash($password, PASSWORD_BCRYPT);

                $query = "
                SELECT id
                FROM users
                WHERE username = :username
                ";
                $check = $this->pdo->prepare($query);
                $check->bindParam(':username', $username, PDO::PARAM_STR);
                $check->execute();

                $user = $check->fetchAll(PDO::FETCH_ASSOC);

                if (count($user) > 0) {
                    $msg = 'Username già in uso %s';
                } else {


                    $query = "
                        INSERT INTO users
                        VALUES (0, :username, :password)
                    ";

                    $check = $this->pdo->prepare($query);
                    $check->bindParam(':username', $username, PDO::PARAM_STR);
                    $check->bindParam(':password', $password_hash, PDO::PARAM_STR);
                    $check->execute();

                    if ($check->rowCount() > 0) {
                        $msg = 'Registrazione eseguita con successo';
                    } else {
                        $msg = 'Problemi con l\'inserimento dei dati %s';
                    }
                }
            }
        }
    }

    public function logout() {
        session_start();

        if (isset($_SESSION['session_id'])) {
            unset($_SESSION['session_id']);
        }
        header('Location:' . AUTH);
        exit;
    }
}