<?php
                            
                            include "assets/phpqrcode/qrlib.php";    // Ini adalah letak pemyimpanan plugin qrcode
                    
                            $tempdir = "qrcode-img/";        // Nama folder untuk pemyimpanan file qrcode
                            
                            if (!file_exists($tempdir))        //jika folder belum ada, maka buat
                            mkdir($tempdir);
                            
                            // berikut adalah parameter qr code
                            $teks_qrcode    ="Membuat QR Code dengan PHP";
                            $namafile        ="qrcode-1.png";
                            $quality        ="H"; // ini ada 4 pilihan yaitu L (Low), M(Medium), Q(Good), H(High)
                            $ukuran            =5; // 1 adalah yang terkecil, 10 paling besar
                            $padding        =1;
                            
                            QRCode::png($teks_qrcode, $tempdir.$namafile, $quality, $ukuran, $padding);
                        ?>