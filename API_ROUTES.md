# API Routes Documentation - Fotogram

## 📋 Index

- [Authentication](#authentication)
- [Dashboard](#dashboard)
- [Albums](#albums)
- [Photos](#photos)
- [Comments](#comments)
- [Likes](#likes)
- [Profile](#profile)

---

## Authentication

### Halaman Login
```
GET /login
```
Menampilkan form login untuk pengguna yang belum login.

**Response:** HTML Form

---

### Proses Login
```
POST /login
```
Memproses login dengan email dan password.

**Request Body:**
```json
{
  "email": "user@example.com",
  "password": "password123"
}
```

**Validasi:**
- email: required, valid email format
- password: required, minimum 6 characters

**Success Response:** Redirect ke `/dashboard`

**Error Response:** Redirect ke `/login` dengan error message

---

### Halaman Registrasi
```
GET /register
```
Menampilkan form registrasi untuk pengguna baru.

**Response:** HTML Form

---

### Proses Registrasi
```
POST /register
```
Membuat akun pengguna baru.

**Request Body:**
```json
{
  "username": "newuser",
  "email": "newuser@example.com",
  "nama_lengkap": "New User Name",
  "alamat": "Jalan Test No. 123",
  "password": "password123",
  "password_confirmation": "password123"
}
```

**Validasi:**
- username: required, unique, minimum 3 characters
- email: required, unique, valid email
- nama_lengkap: required, minimum 5 characters
- password: required, minimum 6 characters, confirmed
- alamat: optional

**Success Response:** Redirect ke `/login` dengan success message

**Error Response:** Redirect ke `/register` dengan validation errors

---

### Logout
```
POST /logout
```
Menghapus session dan logout pengguna.

**Authentication:** Required

**Success Response:** Redirect ke `/login` dengan success message

---

## Dashboard

### Halaman Dashboard
```
GET /dashboard
```
Menampilkan dashboard dengan statistik dan informasi pengguna.

**Authentication:** Required

**Response:** HTML Dashboard dengan:
- Total albums
- Total photos
- Recent albums list
- Recent photos list

**Status Code:** 200 OK

---

## Albums

### Daftar Album
```
GET /albums
```
Menampilkan semua album milik pengguna yang login.

**Authentication:** Required

**Response:** HTML dengan list album

**Query Parameters:** None

**Status Code:** 200 OK

---

### Halaman Buat Album
```
GET /albums/create
```
Menampilkan form untuk membuat album baru.

**Authentication:** Required

**Response:** HTML Form

---

### Buat Album
```
POST /albums
```
Membuat album baru.

**Authentication:** Required

**Request Body:**
```json
{
  "nama_album": "Album Liburan",
  "deskripsi": "Foto-foto saat liburan ke bali"
}
```

**Validasi:**
- nama_album: required, minimum 3 characters
- deskripsi: optional

**Success Response:** Redirect ke `/albums` dengan success message

**Status Code:** 302 Found (Redirect)

---

### Detail Album
```
GET /albums/{id}
```
Menampilkan detail album beserta semua foto di dalamnya.

**Authentication:** Required

**Path Parameters:**
- `id`: Album ID

**Response:** HTML dengan detail album dan photos

**Status Code:** 200 OK atau 404 Not Found

---

### Halaman Edit Album
```
GET /albums/{id}/edit
```
Menampilkan form untuk edit album.

**Authentication:** Required (harus pemilik album)

**Path Parameters:**
- `id`: Album ID

**Response:** HTML Form dengan data album

**Status Code:** 200 OK atau 404 Not Found

---

### Update Album
```
PUT /albums/{id}
```
Mengupdate informasi album.

**Authentication:** Required (harus pemilik album)

**Path Parameters:**
- `id`: Album ID

**Request Body:**
```json
{
  "nama_album": "Album Liburan Terbaru",
  "deskripsi": "Foto-foto saat liburan ke bali tahun ini"
}
```

**Success Response:** Redirect ke `/albums` dengan success message

**Status Code:** 302 Found (Redirect)

---

### Delete Album
```
DELETE /albums/{id}
```
Menghapus album dan semua foto di dalamnya.

**Authentication:** Required (harus pemilik album)

**Path Parameters:**
- `id`: Album ID

**Success Response:** Redirect ke `/albums` dengan success message

**Status Code:** 302 Found (Redirect)

---

## Photos

### Galeri Foto
```
GET /fotos
```
Menampilkan galeri semua foto dari semua pengguna.

**Authentication:** Required

**Query Parameters:**
- `page`: Halaman (default: 1)

**Response:** HTML dengan paginated photos

**Status Code:** 200 OK

---

### Halaman Unggah Foto
```
GET /fotos/create
```
Menampilkan form untuk upload foto baru.

**Authentication:** Required

**Response:** HTML Form dengan album dropdown

**Status Code:** 200 OK

---

### Upload Foto
```
POST /fotos
```
Mengupload foto baru ke album.

**Authentication:** Required

**Request Body (Form Data):**
```
- judul_foto: string (required, min 3 chars)
- deskripsi_foto: string (optional)
- album_id: integer (required, must exist)
- foto: file (required, image/jpeg/png/jpg/gif/svg, max 10MB)
```

**Success Response:** Redirect ke `/fotos` dengan success message

**Status Code:** 302 Found (Redirect)

---

### Detail Foto
```
GET /fotos/{id}
```
Menampilkan detail foto dengan komentar dan like information.

**Authentication:** Required

**Path Parameters:**
- `id`: Photo ID

**Response:** HTML dengan foto detail, comments, dan like status

**Status Code:** 200 OK atau 404 Not Found

---

### Halaman Edit Foto
```
GET /fotos/{id}/edit
```
Menampilkan form untuk edit foto.

**Authentication:** Required (harus pemilik foto)

**Path Parameters:**
- `id`: Photo ID

**Response:** HTML Form dengan photo data dan album dropdown

---

### Update Foto
```
PUT /fotos/{id}
```
Mengupdate informasi foto.

**Authentication:** Required (harus pemilik foto)

**Path Parameters:**
- `id`: Photo ID

**Request Body (Form Data):**
```
- judul_foto: string (required, min 3 chars)
- deskripsi_foto: string (optional)
- album_id: integer (required)
- foto: file (optional, image/jpeg/png/jpg/gif/svg, max 10MB)
```

**Success Response:** Redirect ke `/fotos` dengan success message

---

### Delete Foto
```
DELETE /fotos/{id}
```
Menghapus foto dan file-nya.

**Authentication:** Required (harus pemilik foto)

**Path Parameters:**
- `id`: Photo ID

**Success Response:** Redirect ke `/fotos` dengan success message

---

## Comments

### Tambah Komentar
```
POST /fotos/{id}/komentar
```
Menambahkan komentar pada foto.

**Authentication:** Required

**Path Parameters:**
- `id`: Photo ID

**Request Body:**
```json
{
  "komentar": "Foto yang sangat bagus!"
}
```

**Validasi:**
- komentar: required, minimum 1 character, maximum 500 characters

**Success Response:** Redirect ke `/fotos/{id}` dengan success message

---

### Hapus Komentar
```
DELETE /komentar/{id}
```
Menghapus komentar milik sendiri.

**Authentication:** Required (harus pemilik komentar)

**Path Parameters:**
- `id`: Comment ID

**Success Response:** Redirect ke halaman sebelumnya dengan success message

---

## Likes

### Toggle Like
```
POST /fotos/{id}/like
```
Memberikan like atau unlike pada foto (toggle).

**Authentication:** Required

**Path Parameters:**
- `id`: Photo ID

**Success Response:** Redirect ke `/fotos/{id}` dengan message (Liked/Unliked)

**Notes:** Satu user hanya bisa like satu foto sekali (unique constraint)

---

### Get Like Count
```
GET /fotos/{id}/like-count
```
Mendapatkan jumlah like pada foto (JSON response).

**Path Parameters:**
- `id`: Photo ID

**Response:**
```json
{
  "count": 5
}
```

**Content-Type:** application/json

**Status Code:** 200 OK

---

## Profile

### Profil Pengguna (Sendiri)
```
GET /profile
```
Menampilkan profil pengguna yang sedang login.

**Authentication:** Required

**Response:** HTML dengan profile info, stats, dan photo gallery

**Status Code:** 200 OK

---

### Profil Pengguna (Orang Lain)
```
GET /user/{id}
```
Menampilkan profil pengguna tertentu.

**Authentication:** Required

**Path Parameters:**
- `id`: User ID

**Response:** HTML dengan profile info, stats, dan photo gallery

**Status Code:** 200 OK atau 404 Not Found

---

### Halaman Edit Profil
```
GET /profile/edit
```
Menampilkan form untuk edit profil.

**Authentication:** Required

**Response:** HTML Form dengan user data

**Status Code:** 200 OK

---

### Update Profil
```
PUT /profile
```
Mengupdate profil pengguna.

**Authentication:** Required

**Request Body (Form Data):**
```
- nama_lengkap: string (required, min 5 chars)
- bio: string (optional, max 500 chars)
- alamat: string (optional)
- foto_profile: file (optional, image/jpeg/png/jpg/gif, max 5MB)
```

**Success Response:** Redirect ke `/profile` dengan success message

**Status Code:** 302 Found (Redirect)

---

## Response Status Codes

| Code | Meaning | Usage |
|------|---------|-------|
| 200 | OK | Successful GET request |
| 302 | Found | Redirect after POST/PUT/DELETE |
| 404 | Not Found | Resource not found |
| 422 | Unprocessable Entity | Validation error |
| 500 | Internal Server Error | Server error |

---

## Authentication

Semua endpoint yang membutuhkan authentication dilindungi dengan middleware `check.auth`. 

User yang tidak login akan di-redirect ke `/login` dengan error message.

---

## Error Handling

Semua error response akan menampilkan error message yang user-friendly dan redirect ke halaman yang sesuai.

**Validation errors** akan ditampilkan di form yang sama dengan data lama masih tersimpan.

---

## Rate Limiting

Tidak ada rate limiting implemented di versi ini. 

(Bisa ditambahkan di masa depan untuk production)

---

## CSRF Protection

Semua POST/PUT/DELETE requests dilindungi dengan CSRF token ({{ csrf_field() }}).

Token tersedia otomatis di setiap Blade form.

---

Generated: January 15, 2026
Version: 1.0
