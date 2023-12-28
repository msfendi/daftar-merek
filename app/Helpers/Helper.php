<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
// use Illuminate\Support\Facades\Hash;

/**
 * Check route name and get active class name.
 *
 * @param  string|array $routeName
 * @param  string $active
 * @return string
 */


function cekKetersediaanMerek($keyword)
{
    $client = new Client();
    $pdkiSignature = "PDKI/735032dcbdf964d2c4426c1c2442e165fa2d454096b1ec06358c9ebbb958f5ebc7f317588d2ef29e45a45c8587ba906d2ad338eca364e58f1b15a9d1f8962c90";
    $url = "https://pdki-indonesia.dgip.go.id/api/search?keyword=$keyword&page=1&type=trademark&showFilter=true";
    try {
        $response = $client->request('GET', $url, [
            'headers' => [
                'Pdki-Signature' => $pdkiSignature,
            ],
        ]);

        $result = $response->getBody()->getContents();

        $data = json_decode($result, true);
        $count = 0;


        // Cek apakah permintaan berhasil
        if ($response->getStatusCode() == 200) {
            // Lakukan pengolahan data sesuai kebutuhan Anda
            $hitsArray = $data['hits']['hits'];
            foreach ($hitsArray as $hit) {
                $sourceData[] = $hit['_source'];
                $count++;

                if ($count == 3) {
                    break;
                }
            }
            return $sourceData;
        } else {
            return "Gagal mengambil data. Kode status: " . $response->getStatusCode();
        }
    } catch (Exception $e) {
        return "Terjadi kesalahan: " . $e->getMessage();
    }
}


function pencarianMerek($keyword)
{
    $client = new Client();
    $currentDate = Carbon::now()->format('Ymd');
    $apikey = "arhoBkmdhcHsWSJPyLhLVqGNhAEontUgedqsNAAWjRkXkKDnrnNwolYRnEwGkaYaC";
    $pdkiSignature = "PDKI/735032dcbdf964d2c4426c1c2442e165fa2d454096b1ec06358c9ebbb958f5ebc7f317588d2ef29e45a45c8587ba906d2ad338eca364e58f1b15a9d1f8962c90";
    $url = "https://pdki-indonesia.dgip.go.id/api/search?keyword=$keyword&page=1&type=trademark&showFilter=true";

    try {
        $response = $client->request('GET', $url, [
            'headers' => [
                'Pdki-Signature' => $pdkiSignature,
            ],
        ]);

        $result = $response->getBody()->getContents();

        $data = json_decode($result, true);
        $found = false;
        // Cek apakah permintaan berhasil
        if ($response->getStatusCode() == 200) {
            $hitsArray = $data['hits']['hits'];
            // foreach ($hitsArray as $hit) {
            //     $sourceData = $hit['_source'];


            //     // Memeriksa apakah "nama_merek" sama dengan $keyword
            //     if (isset($sourceData['nama_merek']) && $sourceData['nama_merek'] == Str::upper($keyword)) {
            //         // Merek ditemukan
            //         $found = true;
            //         break; // Keluar dari loop karena merek sudah ditemukan
            //     }
            // }
            return ($hitsArray);

            // if ($found) {
            //     return $found;
            // } else {
            //     return $found;
            // }
        } else {
            return "Gagal mengambil data. Kode status: " . $response->getStatusCode();
        }
    } catch (Exception $e) {
        return "Terjadi kesalahan: " . $e->getMessage();
    }
}
