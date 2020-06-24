<?php


namespace App\Services\Configuration;


class UploadLogoService
{
    public static function uploadLogo($logo) {
        $nome = str_pad(rand(0, 99999), 5 , "0", STR_PAD_LEFT) . $logo->getClientOriginalName();
        $logo->move(public_path() . '/logos/', $nome);
        return '/logos/' . $nome;
    }

}
