import CryptoJS from 'crypto-js';

function decryptData(data, secretKey){
    if(data){
        return CryptoJS.AES.decrypt(data, secretKey).toString(CryptoJS.enc.Utf8);
    }
}

export default decryptData;