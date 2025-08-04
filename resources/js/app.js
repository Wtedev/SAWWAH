
import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



// كود JavaScript العام
document.addEventListener('DOMContentLoaded', function() {
    // يمكنك إضافة أي تفاعلات تحتاجها هنا
    console.log('تم تحميل التطبيق بنجاح');

    // مثال: تفعيل تاريخ الذهاب والعودة
    const dateInputs = document.querySelectorAll('input[type="date"]');
    if(dateInputs) {
        dateInputs.forEach(input => {
            input.addEventListener('change', function() {
                console.log('تم تغيير التاريخ:', this.value);
            });
        });
    }
});

