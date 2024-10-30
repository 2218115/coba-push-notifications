# Setup Laravel Menggunakan kreit/laravel-firebase

```bash
https://github.com/kreait/laravel-firebase
```

dalam project ini lokasi google-service di letakkan pada

```env
FIREBASE_CREDENTIALS=storage/app/private/firebase-auth.json
```

file ini di dapatkan dari generate json Service Account pada project firebase anda

```txt
Firebase projects support Google service accounts, which you can use to call Firebase server APIs from your app server or trusted environment. If you're developing code locally or deploying your application on-premises, you can use credentials obtained via this service account to authorize server requests.

To authenticate a service account and authorize it to access Firebase services, you must generate a private key file in JSON format.

To generate a private key file for your service account:

In the Firebase console, open Settings > Service Accounts.

Click Generate New Private Key, then confirm by clicking Generate Key.

Securely store the JSON file containing the key.

Dokumentasi pada link berikut:
    https://firebase.google.com/docs/admin/setup#initialize_the_sdk_in_non-google_environments
```

# Dokumentasi Firebase Push Notifications menggunakan React Native

```bash
https://rnfirebase.io/messaging/usage
```

# Dokumentasi Authentikasi Google

```bash
https://firebase.google.com/docs/cloud-messaging/migrate-v1
```
