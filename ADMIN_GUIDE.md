# Admin Panel Guide - Fotogram

## Overview
Fotogram memiliki sistem role-based access control dengan dua role utama: **User** dan **Admin**.

## Role System

### User (Regular User)
- Dapat membuat album
- Dapat upload foto
- Dapat memberikan like pada foto
- Dapat memberikan komentar pada foto
- Dapat melihat profile sendiri
- Tidak bisa mengakses admin panel

### Admin
- Akses ke Admin Panel
- Dapat mengelola semua user di sistem
- Dapat menghapus foto yang tidak sesuai
- Dapat melihat statistik dan analytics
- Dapat mengubah role user dari user menjadi admin atau sebaliknya

---

## Admin Credentials

### Test Admin Account
```
Email: admin@fotogram.com
Password: admin123
```

### Test User Accounts
```
1. John Doe
   Email: johndoe@fotogram.com
   Password: password123

2. Jane Doe
   Email: janedoe@fotogram.com
   Password: password123

3. Mike Smith
   Email: mikesmith@fotogram.com
   Password: password123

4. Sarah Chen
   Email: sarahchen@fotogram.com
   Password: password123
```

---

## Admin Panel Features

### 1. Admin Dashboard
Path: `/admin`
- Overview statistik sistem
- Total users, fotos, komentars, likes
- Quick access ke fitur-fitur admin
- Card-based interface untuk mudah navigasi

### 2. User Management
Path: `/admin/users`

**Fitur:**
- Lihat daftar semua users di sistem
- Pagination (10 users per halaman)
- Lihat jumlah album dan foto per user
- Lihat role user (Admin atau User)

**Actions:**
- **Edit User**: Ubah nama, email, dan role user
- **Delete User**: Hapus user dari sistem (tidak bisa menghapus diri sendiri)

**Edit User Page:**
- Ubah nama user
- Ubah email user
- Ubah role (user ↔ admin)
- Ubah password (opsional)

### 3. Photo Management
Path: `/admin/fotos`

**Fitur:**
- Lihat semua foto di sistem
- Pagination (15 fotos per halaman)
- Informasi:
  - Judul foto
  - Owner/User yang upload
  - Album tempat foto tersimpan
  - Jumlah komentar
  - Jumlah likes

**Actions:**
- **View**: Lihat foto detail
- **Delete**: Hapus foto dan file-nya dari sistem

### 4. Statistics & Analytics
Path: `/admin/statistics`

**Statistik Keseluruhan:**
- Total users
- Total photos
- Total comments
- Total likes
- Total albums
- Average photos per album

**Analytics:**
- Top 5 Users (berdasarkan jumlah foto)
- Top 5 Most Liked Photos
- Top 5 Most Commented Photos

---

## Database Seeder

Sistem dilengkapi dengan seeder untuk data contoh. Jalankan:

```bash
php artisan db:seed
```

Ini akan membuat:
- 1 Admin user
- 4 Regular users
- 8 Sample albums
- 16 Sample photos
- 24 Sample comments
- 47 Sample likes

---

## Middleware Protection

Admin routes dilindungi oleh middleware `check.admin` yang memastikan:
- User harus sudah login (memiliki session)
- User harus memiliki role = 'admin'
- Non-admin users akan diredirect ke dashboard dengan pesan error

---

## Route Structure

```
Admin Routes Group (protected by check.admin middleware):
├── GET /admin                          → AdminController@index
├── GET /admin/users                    → AdminController@users
├── GET /admin/users/{id}/edit          → AdminController@editUser
├── PUT /admin/users/{id}               → AdminController@updateUser
├── DELETE /admin/users/{id}            → AdminController@deleteUser
├── GET /admin/fotos                    → AdminController@fotos
├── DELETE /admin/fotos/{id}            → AdminController@deleteFoto
└── GET /admin/statistics               → AdminController@statistics
```

---

## Features Already Implemented

### ✅ Photo Upload
- User dapat upload foto
- Foto tersimpan di storage
- Validasi file (jpg, jpeg, png)
- Max file size: 2MB
- Belongs to album dan user

### ✅ Like System
- User dapat like foto
- Prevent double like (one like per user per photo)
- Real-time like count
- Like count visible di admin panel

### ✅ Comment System
- User dapat komentar foto
- Comments appear on photo detail page
- Comment count visible di admin panel
- Comments can be deleted by admin

---

## Security Features

1. **Authentication**: Session-based user authentication
2. **Authorization**: Admin middleware checks user role
3. **CSRF Protection**: All forms protected with CSRF tokens
4. **Password Security**: Passwords hashed with bcrypt
5. **File Management**: Secure file storage dan deletion

---

## Future Enhancements

- [ ] Comment moderation/deletion by moderators
- [ ] Ban user feature
- [ ] Advanced analytics dashboard
- [ ] Email notifications
- [ ] Activity logs
- [ ] Backup system
- [ ] Image compression on upload

---

## Troubleshooting

### Admin Panel Not Accessible
- Pastikan user login terlebih dahulu
- Periksa role user di database (harus 'admin')
- Check session data

### Photo Upload Failing
- Periksa permissions storage folder
- Ensure disk configured di config/filesystems.php
- Validate file type dan size

### Database Seeder Error
- Pastikan semua migration sudah berjalan: `php artisan migrate`
- Clear cache jika perlu: `php artisan cache:clear`
- Run seeder: `php artisan db:seed`

---

## Development Notes

- Admin panel menggunakan Bootstrap 5.3 untuk styling
- FontAwesome icons untuk UI elements
- Responsive design untuk mobile devices
- Pagination untuk large datasets
- Transaction support untuk critical operations

---

**Last Updated**: January 2025
**Version**: 1.0
