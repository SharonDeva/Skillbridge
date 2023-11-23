<?php

namespace classes;

use PDO;

class User {

    private $userid;
    private $firstname;
    private $lastname;
    private $username;
    private $email;
    private $password;
    private $role;

    public function __construct($firstname, $lastname, $username, $email, $password, $role) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function setUserid($userid) {
        $this->userid = $userid;
    }

    public function getUserid() {
        return $this->userid;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }

    public function register($con) {
        try {

            $query = "INSERT INTO user(firstname, lastname, username, email, password, role) VALUES(?, ?, ?, ?, ?, ?)";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->firstname);
            $pstmt->bindValue(2, $this->lastname);
            $pstmt->bindValue(3, $this->username);
            $pstmt->bindValue(4, $this->email);
            $pstmt->bindValue(5, $this->password);
            $pstmt->bindValue(6, $this->role);
            $pstmt->execute();
            return ($pstmt->rowCount() > 0);
        } catch (PDOException $exc) {
            die("Error in user class's addUser function: " . $exc->getMessage());
        }
    }

    public function authenticate($con) {
        try {
            $query = "SELECT * FROM user WHERE email = ? LIMIT 1";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->email);
            $pstmt->execute();
            $rs = $pstmt->fetch(PDO::FETCH_OBJ);

            if (!empty($rs)) {
                $dbpw = $rs->password;

                if (password_verify($this->password, $dbpw)) {
                    $this->userid = $rs->userid;
                    $this->firstname = $rs->firstname;
                    $this->lastname = $rs->lastname;
                    $this->role = $rs->role;

                    $_SESSION["user_id"] = $this->userid;
                    $_SESSION["user_firstname"] = $this->firstname;
                    $_SESSION["user_lastname"] = $this->lastname;
                    $_SESSION["user_role"] = $this->role;

                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            die("Error in user class's authenticate function: " . $exc->getMessage());
        }
    }

    public function update($token, $expiry, $con) {

        $query = "UPDATE user SET cookie_token = ?, expiry_date = ? WHERE userid = ?";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $token);
        $pstmt->bindValue(2, $expiry);
        $pstmt->bindValue(3, $this->userid);
        $pstmt->execute();
        return ($pstmt->rowCount() > 0);
    }

    public function isValidToken($token, $con) {
        try {
            $query = "SELECT * FROM user WHERE cookie_token = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $token);
            $pstmt->execute();
            $rs = $pstmt->fetch(PDO::FETCH_OBJ);
            if (!empty($rs)) {
                $db_expiry_date = $rs->expiry_date;
                if (($db_expiry_date - time()) > 0) {
                    $this->userid = $rs->userid;
                    $this->firstname = $rs->firstname;
                    $this->lastname = $rs->lastname;
                    $this->role = $rs->role;
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            die("Error in user clsss's isValidToken function: " . $exc->getMessage());
        }
    }

}
