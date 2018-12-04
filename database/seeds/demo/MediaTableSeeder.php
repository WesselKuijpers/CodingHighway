<?php

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('media')->delete();
        
        \DB::table('media')->insert(array (
            0 => 
            array (
                'id' => 1,
                'content' => '/storage/media/QLvvG8306cMFxUQbx5MWVfGpBJRS0SZ55JesxrRa.png',
                'created_at' => '2018-11-29 09:31:15',
                'updated_at' => '2018-11-29 09:31:15',
            ),
            1 => 
            array (
                'id' => 2,
                'content' => '/storage/media/a8U9pSSEiWD0Y6wmqS8PkHWVBaGqQlH29dkzpogi.jpeg',
                'created_at' => '2018-11-29 09:55:20',
                'updated_at' => '2018-11-29 09:55:20',
            ),
            2 => 
            array (
                'id' => 3,
                'content' => '/storage/media/G7r7noAfsbBTsA65CWcib70ZGYF15OfO2EwbCRNV.jpeg',
                'created_at' => '2018-11-29 09:57:09',
                'updated_at' => '2018-11-29 09:57:09',
            ),
            3 => 
            array (
                'id' => 4,
                'content' => '/storage/media/935XYRCohqQfuMZaPlf0Yyjc2T2Ew8LUiLOjWahR.pdf',
                'created_at' => '2018-11-29 11:18:16',
                'updated_at' => '2018-11-29 11:18:16',
            ),
            4 => 
            array (
                'id' => 5,
                'content' => '/storage/media/zptj2e3q976GUQmUHCEc1RDUocm7DvCPGpzNXzxU.zip',
                'created_at' => '2018-11-29 12:56:58',
                'updated_at' => '2018-11-29 12:56:58',
            ),
            5 => 
            array (
                'id' => 6,
                'content' => '/storage/media/vdzn5V84Yq77U9crcX7pclKGWtjV7uN9bRx97YHy.zip',
                'created_at' => '2018-11-29 13:02:34',
                'updated_at' => '2018-11-29 13:02:34',
            ),
            6 => 
            array (
                'id' => 7,
                'content' => '/storage/media/8cVFNoEkMAU9wvYGSI2Hp0gVzcmfFDb8gimhdw1E.pdf',
                'created_at' => '2018-11-29 13:28:22',
                'updated_at' => '2018-11-29 13:28:22',
            ),
            7 => 
            array (
                'id' => 8,
                'content' => '/storage/media/wBNiknogUrfBgc3cVZc7eJkCNUZZgXa1ylasyJhY.pdf',
                'created_at' => '2018-11-29 13:36:33',
                'updated_at' => '2018-11-29 13:36:33',
            ),
            8 => 
            array (
                'id' => 9,
                'content' => '/storage/media/eMhuk6sPym9bN4KXk9BuHkTxY5CWrucmaj3s4RXH.pdf',
                'created_at' => '2018-11-29 13:44:01',
                'updated_at' => '2018-11-29 13:44:01',
            ),
            9 => 
            array (
                'id' => 10,
                'content' => '/storage/media/SsqAov7R4Awb4EJdxESwaZINn015ncjByp63U1iK.pdf',
                'created_at' => '2018-11-29 13:52:26',
                'updated_at' => '2018-11-29 13:52:26',
            ),
            10 => 
            array (
                'id' => 11,
                'content' => '/storage/media/7k93nKEfKiGsrMgsFJvX87KFPKoGufz9D83ahXPR.pdf',
                'created_at' => '2018-11-29 13:54:17',
                'updated_at' => '2018-11-29 13:54:17',
            ),
            11 => 
            array (
                'id' => 12,
                'content' => '/storage/media/0B98QQ3LiuTCN2zLZKgRu8iubYO9ILT64FQlC4mf.png',
                'created_at' => '2018-11-29 14:03:53',
                'updated_at' => '2018-11-29 14:03:53',
            ),
            12 => 
            array (
                'id' => 13,
                'content' => '/storage/media/zMlSkl3KQqadMoO3UWqfjmmWAPDYone2ZqlZGnuc.pdf',
                'created_at' => '2018-11-29 14:21:55',
                'updated_at' => '2018-11-29 14:21:55',
            ),
            13 => 
            array (
                'id' => 14,
                'content' => '/storage/media/gw30IUp0cbTcVFtze1aEdjDxgtUZaw3LdpiDDIpq.pdf',
                'created_at' => '2018-11-29 14:21:55',
                'updated_at' => '2018-11-29 14:21:55',
            ),
            14 => 
            array (
                'id' => 15,
                'content' => '/storage/media/qurnlQBxZycZ19FmlBTDa8O2JMe0Z5v0hWNGXIsA.pdf',
                'created_at' => '2018-11-29 14:26:48',
                'updated_at' => '2018-11-29 14:26:48',
            ),
            15 => 
            array (
                'id' => 16,
                'content' => '/storage/media/2vDYsqiV0Rg0pKGoNKzpHtenBp9GcY5UNfbpTd9Y.pdf',
                'created_at' => '2018-11-29 14:26:48',
                'updated_at' => '2018-11-29 14:26:48',
            ),
            16 => 
            array (
                'id' => 17,
                'content' => '/storage/media/EGMvwAuVVUXVZnFH5dHNLeEZxM7pdUI4Fj6NEylx.pdf',
                'created_at' => '2018-11-29 14:31:41',
                'updated_at' => '2018-11-29 14:31:41',
            ),
            17 => 
            array (
                'id' => 18,
                'content' => '/storage/media/H4YQ6Pbk0Fyl5iT6HLPePfBGjTFy1EPo8g1ky4UL.zip',
                'created_at' => '2018-11-29 14:37:40',
                'updated_at' => '2018-11-29 14:37:40',
            ),
            18 => 
            array (
                'id' => 19,
                'content' => '/storage/media/dnxUafpze34eotsaAPZvYCpQXoYPuVjxGl94Dw4T.zip',
                'created_at' => '2018-12-03 09:04:48',
                'updated_at' => '2018-12-03 09:04:48',
            ),
            19 => 
            array (
                'id' => 20,
                'content' => '/storage/media/nK8Vgqn00vfnPd1BFSuVrEgPUMmZl4EfugsgGE4R.pdf',
                'created_at' => '2018-12-03 09:12:27',
                'updated_at' => '2018-12-03 09:12:27',
            ),
            20 => 
            array (
                'id' => 21,
                'content' => '/storage/media/CXbkqy8gGh7Mx9JwnnWnJtfkFL7ENw7UURsrtgmb.pptx',
                'created_at' => '2018-12-03 09:14:31',
                'updated_at' => '2018-12-03 09:14:31',
            ),
            21 => 
            array (
                'id' => 22,
                'content' => '/storage/media/uQRzJRXGLEPzarBl2t5O6bMrFf72XulHm9jET5lF.pdf',
                'created_at' => '2018-12-03 09:47:47',
                'updated_at' => '2018-12-03 09:47:47',
            ),
            22 => 
            array (
                'id' => 23,
                'content' => '/storage/media/BYVexQMeBPaVzoFOP0utcfrd2Wsyfc1DLDdCKq1i.pdf',
                'created_at' => '2018-12-03 09:47:47',
                'updated_at' => '2018-12-03 09:47:47',
            ),
        ));
        
        
    }
}