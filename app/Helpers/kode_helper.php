<?php

if (!function_exists('get_fakultas')) {
    /**
     * Get fakultas name by kode_fakultas
     *
     * @param  string  $kode_fakultas
     * @return string|null
     */
    function get_fakultas($kode_fakultas)
    {
        $f = new \App\Models\FakultasModel;
        $fakultas = $f->find($kode_fakultas);
        if ($fakultas) {
            return $fakultas['fakultas_nama'];
        } else {
            return '';
        }
    }
}


