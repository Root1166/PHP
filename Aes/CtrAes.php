<?php
Class AesCtr extends Aes
{

    /**
     *
     * @param plaintext  văn bản cần mã hóa
     * @param password  key để tạo khóa
     * @param nBits     số bít được mã hóa (128, 192, or 256)
     * @return encrypted text plaintext
     */
    public static function encrypt($plaintext, $password, $nBits)
    {
        $blockSize = 16; // kích thước khối cố định ở 16 byte / 128 bit (Nb = 4) cho AES
        if (!($nBits == 128 || $nBits == 192 || $nBits == 256)) // số bít 128/192/256 bit keys
            return ''; 
        $nBytes = $nBits / 8; // no bytes in key
        $pwBytes = array();
        for ($i = 0; $i < $nBytes; $i++) $pwBytes[$i] = ord(substr($password, $i, 1)) & 0xff;
        $key = Aes::cipher($pwBytes, Aes::keyExpansion($pwBytes));
        // sử dụng hàm cipher mã hóa pw để lấy key đã mã hóa
        // keyexpansion) - mở rộng khóa mã hóa key
        $key = array_merge($key, array_slice($key, 0, $nBytes - 16)); // mở rộng khóa thành 16/24/32 byte
        
        //khời tạo 8 byte đầu tiên của khối $nonce
        $counterBlock = array();
        $nonce = floor(microtime(true) * 1000); 
        $nonceMs = $nonce % 1000;
        $nonceSec = floor($nonce / 1000);
        $nonceRnd = floor(rand(0, 0xffff));

        for ($i = 0; $i < 2; $i++) $counterBlock[$i] = self::urs($nonceMs, $i * 8) & 0xff;
        for ($i = 0; $i < 2; $i++) $counterBlock[$i + 2] = self::urs($nonceRnd, $i * 8) & 0xff;
        for ($i = 0; $i < 4; $i++) $counterBlock[$i + 4] = self::urs($nonceSec, $i * 8) & 0xff;

        //chuyển đổi thành string text
        $ctrTxt = '';
        for ($i = 0; $i < 8; $i++) 
            $ctrTxt .= chr($counterBlock[$i]);

        //mở rộng khóa thành các khóa key
        $keySchedule = Aes::keyExpansion($key);

        $blockCount = ceil(strlen($plaintext) / $blockSize);
        $ciphertxt = array(); // mã hóa plaintext như là môt mảng của một chuỗi ký tự

        for ($b = 0; $b < $blockCount; $b++) {
            // set counter (block #) trong 8 byte cuối cùng của khối truy cập (để lại nonce trong 8 byte đầu tiên)
            for ($c = 0; $c < 4; $c++) $counterBlock[15 - $c] = self::urs($b, $c * 8) & 0xff;
            for ($c = 0; $c < 4; $c++) $counterBlock[15 - $c - 4] = self::urs($b / 0x100000000, $c * 8);

            $cipherCntr = Aes::cipher($counterBlock, $keySchedule); //khối mã truy cập

            $blockLength = $b < $blockCount - 1 ? $blockSize : (strlen($plaintext) - 1) % $blockSize + 1;
            $cipherByte = array();

            for ($i = 0; $i < $blockLength; $i++) { // -- xor plaintext with ciphered counter byte-by-byte --
                $cipherByte[$i] = $cipherCntr[$i] ^ ord(substr($plaintext, $b * $blockSize + $i, 1));
                $cipherByte[$i] = chr($cipherByte[$i]);
            }
            $ciphertxt[$b] = implode('', $cipherByte); //bỏ qua ký tự không liên quan trong ciphertext
        }

        // lặp lại chuỗi implode
        $ciphertext = $ctrTxt . implode('', $ciphertxt);//implode ngăn cách các chuỗi "" và ciphertxt chuỗi truyền vào
        $ciphertext = base64_encode($ciphertext);// mã hóa text 
        return $ciphertext;
    }


    /**
     *  Giải mã văn bản bằng Aes 
     * @param ciphertext nguồn đã được mã hóa
     * @param password   key để tạo khóa
     * @param nBits      số bít  được giải mã (128, 192, or 256)
     * @return decrypted giải mã plaintext
     */
    public static function decrypt($ciphertext, $password, $nBits)
    {
        $blockSize = 16; //  kích thước khối cố định ở 16 byte / 128 bit (Nb = 4) cho AES
        if (!($nBits == 128 || $nBits == 192 || $nBits == 256)) 
            return ''; 
        $ciphertext = base64_decode($ciphertext);

        // sử dụng aes đễ mã hóa key
        $nBytes = $nBits / 8; // no bytes in key
        $pwBytes = array();
        for ($i = 0; $i < $nBytes; $i++) $pwBytes[$i] = ord(substr($password, $i, 1)) & 0xff;
        $key = Aes::cipher($pwBytes, Aes::keyExpansion($pwBytes));
        $key = array_merge($key, array_slice($key, 0, $nBytes - 16)); //mở rộng khóa thành 16/24/32 bytes long

        //khôi phục từ phần tử thứ nhất của bảng mã
        $counterBlock = array();
        $ctrTxt = substr($ciphertext, 0, 8);
        for ($i = 0; $i < 8; $i++) $counterBlock[$i] = ord(substr($ctrTxt, $i, 1));

        $keySchedule = Aes::keyExpansion($key);

        // mã hóa riêng biệt thành các khối (bỏ qua 8 byte ban đầu)
        $nBlocks = ceil((strlen($ciphertext) - 8) / $blockSize);
        $ct = array();
        for ($b = 0; $b < $nBlocks; $b++) $ct[$b] = substr($ciphertext, 8 + $b * $blockSize, 16);
        $ciphertext = $ct; // ciphertext là  độ dài mảng string block-lenght

        //plaintext sẽ được tạo khối từng khối thành mảng các chuỗi có độ dài khối
        $plaintxt = array();

        for ($b = 0; $b < $nBlocks; $b++) {
             //đếm khóa (block) trong 8 byte cuối cùng của khối truy cập (để lại nonce trong 8 byte đầu tiên)
            for ($c = 0; $c < 4; $c++) $counterBlock[15 - $c] = self::urs($b, $c * 8) & 0xff;
            for ($c = 0; $c < 4; $c++) $counterBlock[15 - $c - 4] = self::urs(($b + 1) / 0x100000000 - 1, $c * 8) & 0xff;

            $cipherCntr = Aes::cipher($counterBlock, $keySchedule); // mã hóa đếm khóa Block

            $plaintxtByte = array();
            for ($i = 0; $i < strlen($ciphertext[$b]); $i++) {
                // -- xor plaintext với cipher--
                $plaintxtByte[$i] = $cipherCntr[$i] ^ ord(substr($ciphertext[$b], $i, 1));
                $plaintxtByte[$i] = chr($plaintxtByte[$i]);

            }
            $plaintxt[$b] = implode('', $plaintxtByte);
        }

        // join array của khóa thành môt chuỗi plaintext duy nhất
        $plaintext = implode('', $plaintxt);

        return $plaintext;
    }

    //Dịch bít
    private static function urs($a, $b)
    {
        $a &= 0xffffffff;
        $b &= 0x1f; // (kiểm tra giới hạn)
        if ($a & 0x80000000 && $b > 0) { 
            $a = ($a >> 1) & 0x7fffffff; //   dich sang phải một bit
            $a = $a >> ($b - 1); // tiếp tục dịch sang phải các  bít còn lại
        } else { // otherwise
            $a = ($a >> $b); //  sử dụng 
        }
        return $a;
    }

}
?>