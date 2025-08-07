# خطوات تنظيف ملفات الهجرة

## 1. ملفات الهجرة التي يمكن حذفها
قمنا بدمج جميع الأعمدة المتعلقة بجدول البلدان في ملف هجرة واحد (2025_08_07_140000_consolidated_countries_table.php). 
يمكن حذف الملفات التالية إذا تم تطبيق الملف الموحد:

- 2025_08_07_074629_add_weather_info_to_countries_table.php
- 2025_08_07_090930_remove_code_and_daily_budget_from_countries_table.php
- 2025_08_07_115830_remove_unused_fields_from_countries_table.php
- 2025_08_07_000005_update_preferred_budget_column_length.php
- 2025_08_07_000003_add_code_and_capital_to_countries.php
- 2025_08_07_120000_add_activity_type_to_countries_table.php
- 2025_08_07_074221_add_postal_code_to_countries_table.php
- 2025_08_07_120421_rename_image_url_to_image_in_countries_table.php
- 2025_08_07_093241_add_currency_column_to_countries_table.php
- 2025_08_07_000004_add_capital_ar_to_countries.php
- 2025_08_07_000006_update_country_columns_length.php

## 2. ملفات الهجرة الأساسية التي يجب الاحتفاظ بها
- 0001_01_01_000000_create_users_table.php
- 0001_01_01_000001_create_cache_table.php
- 0001_01_01_000002_create_jobs_table.php
- 2025_08_01_061855_create_events_table.php
- 2025_08_07_140000_consolidated_countries_table.php
- 2025_08_07_000000_add_is_admin_to_users_table.php
- 2025_08_07_000001_add_profile_fields_to_users_table.php
- 2025_08_07_000002_add_weather_data_to_users.php

## 3. كيفية تطبيق التغييرات
لتطبيق هذه التغييرات على قاعدة البيانات، يمكن اتباع الخطوات التالية:

1. انسخ الملفات التي ترغب في الاحتفاظ بها إلى مجلد آخر.
2. قم بمسح جميع ملفات الهجرة من مجلد database/migrations.
3. انسخ الملفات التي تريد الاحتفاظ بها مرة أخرى إلى مجلد database/migrations.
4. قم بتنفيذ الأمر التالي لإعادة ضبط جدول الهجرات:
   ```
   php artisan migrate:reset
   ```
5. ثم قم بتشغيل الهجرات الجديدة:
   ```
   php artisan migrate
   ```

## ملاحظة هامة
هذه العملية ستؤدي إلى حذف جميع البيانات في قاعدة البيانات. إذا كنت ترغب في الاحتفاظ بالبيانات، يجب عليك عمل نسخة احتياطية قبل إجراء هذه التغييرات.
