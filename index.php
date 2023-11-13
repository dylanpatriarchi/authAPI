<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;

class AuthAPI {
    private $secretKey = 'XXXXXXXX';

    public function registerUser($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        return true;
    }

    public function loginUser($username, $password) {
        $token = $this->createJWT($username);
        return $token;
    }

    public function verifyToken($token) {
        try {
            $decoded = JWT::decode($token, $this->secretKey, array('HS256'));
            return $decoded->data;
        } catch (Exception $e) {
            return null;
        }
    }

    private function createJWT($username) {
        $tokenId    = base64_encode(random_bytes(32));
        $issuedAt   = time();
        $notBefore  = $issuedAt + 1;
        $expire     = $notBefore + 3600;
        $serverName = 'xxxxxxx';

        $data = [
            'iat'  => $issuedAt,
            'jti'  => $tokenId,
            'iss'  => $serverName,
            'nbf'  => $notBefore,
            'exp'  => $expire,
            'data' => [
                'username' => $username,
            ],
        ];

        $jwt = JWT::encode($data, $this->secretKey, 'HS256');

        return $jwt;
    }
}
?>
