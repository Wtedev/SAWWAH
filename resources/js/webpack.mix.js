const mix = require('laravel-mix');

// تجميع ملف JS الرئيسي
mix.js('resources/js/app.js', 'public/js')
   // تجميع ملف CSS الرئيسي
   .postCss('resources/css/app.css', 'public/css', [
      require('postcss-import'),
      require('autoprefixer'),
   ])
   // نسخ المجلدات إذا لزم الأمر (مثل الصور)
   .copy('resources/images', 'public/images')
   // إضافة الإصدار (لتفادي مشكلة الكاش)
   .version();