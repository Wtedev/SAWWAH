#!/bin/bash

# سكريبت لحذف الملفات غير المستخدمة في المشروع

echo "بدء عملية تنظيف المشروع من الملفات غير المستخدمة..."

# إنشاء مجلد للنسخ الاحتياطي
BACKUP_DIR="backup_$(date +"%Y%m%d_%H%M%S")"
mkdir -p $BACKUP_DIR

# 1. حذف ملفات الهجرة القديمة التي تم دمجها في الملف الموحد
echo "جاري نقل ملفات الهجرة القديمة إلى النسخة الاحتياطية..."

# قائمة بملفات الهجرة التي نريد الاحتفاظ بها
KEEP_MIGRATIONS=(
  "0001_01_01_000000_create_users_table.php"
  "0001_01_01_000001_create_cache_table.php"
  "0001_01_01_000002_create_jobs_table.php"
  "2025_08_01_061855_create_events_table.php"
  "2025_08_07_000000_add_is_admin_to_users_table.php"
  "2025_08_07_000001_add_profile_fields_to_users_table.php"
  "2025_08_07_000002_add_weather_data_to_users.php"
  "2025_08_07_140000_consolidated_countries_table.php"
  "CLEANUP_INSTRUCTIONS.md"
  "COUNTRIES_TABLE_STRUCTURE.md"
)

# إنشاء مجلد للنسخ الاحتياطي لملفات الهجرة
mkdir -p $BACKUP_DIR/migrations

# نقل ملفات الهجرة القديمة إلى النسخة الاحتياطية
for file in database/migrations/*.php; do
  filename=$(basename "$file")
  if [[ ! " ${KEEP_MIGRATIONS[@]} " =~ " ${filename} " ]]; then
    echo "نقل ملف الهجرة القديم: $filename"
    mv "$file" "$BACKUP_DIR/migrations/"
  fi
done

# 2. حذف الملفات المؤقتة والمخزنة
echo "جاري حذف الملفات المؤقتة والمخزنة..."
rm -rf storage/framework/cache/data/*
rm -rf storage/framework/sessions/*
rm -rf storage/framework/views/*
rm -rf storage/logs/*.log

# 3. حذف الملفات المولدة
echo "جاري حذف الملفات المولدة..."
rm -rf public/build/hot
rm -rf public/hot
rm -rf public/storage

# 4. حذف ملفات الترجمة غير المستخدمة إذا وجدت
if [ -d "resources/lang" ]; then
  echo "جاري فحص ملفات الترجمة..."
  mkdir -p $BACKUP_DIR/lang
  # الاحتفاظ فقط بملفات الترجمة العربية والإنجليزية
  for lang_dir in resources/lang/*; do
    lang=$(basename "$lang_dir")
    if [[ "$lang" != "ar" && "$lang" != "en" && "$lang" != "ar.json" && "$lang" != "en.json" ]]; then
      echo "نقل ملفات الترجمة غير المستخدمة: $lang"
      mv "$lang_dir" "$BACKUP_DIR/lang/"
    fi
  done
fi

# 5. حذف الملفات الزائدة في مجلد node_modules إذا وجدت
if [ -d "node_modules" ]; then
  echo "تم العثور على مجلد node_modules، يمكنك حذفه إذا كنت لا تعمل على تطوير الواجهة الأمامية حالياً."
  echo "لحذف مجلد node_modules، استخدم الأمر: rm -rf node_modules"
fi

# 6. حذف ملفات الاختبارات غير المستخدمة
echo "جاري فحص ملفات الاختبار..."
if [ -d "tests" ]; then
  # إنشاء مجلد للنسخ الاحتياطي لملفات الاختبار
  mkdir -p $BACKUP_DIR/tests
  
  # نقل ملفات الاختبار غير المستخدمة
  for test_file in tests/**/*.php; do
    if grep -q "TODO" "$test_file" || grep -q "@test" "$test_file"; then
      echo "الاحتفاظ بملف الاختبار: $test_file"
    else
      echo "نقل ملف اختبار غير مستخدم: $test_file"
      mkdir -p "$(dirname "$BACKUP_DIR/$test_file")"
      mv "$test_file" "$BACKUP_DIR/$test_file"
    fi
  done
fi

# 7. تنظيف مجلد vendor من الملفات غير الضرورية
echo "تنظيف مجلد vendor من الملفات غير الضرورية..."
find vendor -name ".git" -type d -exec rm -rf {} +
find vendor -name "tests" -type d -exec rm -rf {} +
find vendor -name "docs" -type d -exec rm -rf {} +
find vendor -name "examples" -type d -exec rm -rf {} +

# 8. حذف ملفات السكريبت غير المستخدمة
echo "جاري حذف ملفات السكريبت غير المستخدمة..."
# إنشاء مجلد للنسخ الاحتياطي لملفات السكريبت
mkdir -p $BACKUP_DIR/scripts

# الاحتفاظ بسكريبت التنظيف الحالي فقط
if [ -f "cleanup_migrations.sh" ]; then
  echo "نقل سكريبت تنظيف الهجرات إلى النسخة الاحتياطية..."
  mv "cleanup_migrations.sh" "$BACKUP_DIR/scripts/"
fi

# نقل أي ملفات سكريبت أخرى إلى النسخة الاحتياطية
for script_file in *.sh; do
  if [[ "$script_file" != "cleanup_project.sh" ]]; then
    if [ -f "$script_file" ]; then
      echo "نقل ملف سكريبت: $script_file"
      mv "$script_file" "$BACKUP_DIR/scripts/"
    fi
  fi
done

echo "تم تنظيف المشروع من الملفات غير المستخدمة بنجاح!"
echo "تم نقل الملفات المحذوفة إلى المجلد: $BACKUP_DIR"
echo "يمكنك حذف هذا المجلد إذا تأكدت من عدم الحاجة إلى أي من الملفات."
