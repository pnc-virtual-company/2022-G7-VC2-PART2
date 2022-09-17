import CryptoJS from 'crypto-js';

function encryptData(data, secretKey){
    if(data){
        return CryptoJS.AES.encrypt(data, secretKey).toString();
    }
}

export default encryptData;