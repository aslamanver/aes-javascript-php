# AES JavaScript & PHP
AES encrypt from JavaScript (Client-end) and decrypt in PHP (Server-side)

#### Encryption
```javascript
var encrypted = CryptoJS.AES.encrypt("I am a hacker", "MYKEY");
// U2FsdGVkX1+H/Mqv5QgZzAHAXdoGVE1kY9uyfYJKbaA=
```

#### Decryption
```php
echo decryptAES($edata, $password) . "\n";
// Output - I am a hacker
```
