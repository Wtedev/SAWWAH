<<<<<<< HEAD
import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
=======
require('./bootstrap');

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
>>>>>>> e80a85e91ffad3608c15fdcb1ee44c0e4ce02437
