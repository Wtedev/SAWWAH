#!/bin/bash

# سكريبت لتنظيف ملفات الهجرة وإعادة تعيين قاعدة البيانات

# مسح قاعدة البيانات تماماً
echo "جاري مسح قاعدة البيانات..."
php artisan db:wipe

echo "جاري تشغيل الهجرات بالترتيب الصحيح..."
# تشغيل الهجرات الأساسية
php artisan migrate --path=database/migrations/0001_01_01_000000_create_users_table.php
php artisan migrate --path=database/migrations/0001_01_01_000001_create_cache_table.php
php artisan migrate --path=database/migrations/0001_01_01_000002_create_jobs_table.php

# تشغيل هجرة جدول البلدان أولاً
php artisan migrate --path=database/migrations/2025_08_07_140000_consolidated_countries_table.php

# ثم تشغيل هجرة جدول الفعاليات
php artisan migrate --path=database/migrations/2025_08_01_061855_create_events_table.php

# ثم تشغيل بقية الهجرات
php artisan migrate --path=database/migrations/2025_08_07_000000_add_is_admin_to_users_table.php
php artisan migrate --path=database/migrations/2025_08_07_000001_add_profile_fields_to_users_table.php
php artisan migrate --path=database/migrations/2025_08_07_000002_add_weather_data_to_users.php

echo "تم تنفيذ الهجرات بنجاح!"

# تنفيذ السيدر
echo "جاري تنفيذ السيدر..."
php artisan db:seed

echo "تم إعادة تعيين وملء قاعدة البيانات بنجاح!"
