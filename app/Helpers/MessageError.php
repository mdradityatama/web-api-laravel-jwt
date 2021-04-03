<?php

namespace App\Helpers;

class MessageError
{
    const WRONG_PASSWORD_OR_EMAIL = "password atau username/email tidak tepat!";
    const USER_NOT_REGISTERED = "email atau username belum terdaftar!";
    const USER_NOT_FOUND = "user tidak ditemukan";
    const USER_REGISTERED = "berhasil terdaftarkan";

    const TOKEN_EXPIRED = "Token Expired!";
    const TOKEN_NOT_FOUND = "Token tidak ditemukan!";
    const TOKEN_INVALID = "Token tidak benar";
}
