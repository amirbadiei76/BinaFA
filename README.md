## نحوه کار با سکوی بررسی یادگیری و نحوه آموزش (بینا) برای ساخت پیش‌خوان‌های تحلیل عملکرد مدرسان
برای نحوه کار با سکو، ابتدا ویدیوی https://www.aparat.com/v/zzfjm80 را مشاهده نمایید.\
در سایت https://bina-lad.liara.run/ می توانید افزونه دلخواه را بسازید.\

### پیش‌خوان‌های ساخته شده
فایل‌های پیش‌نمایش پیش‌خوان، فایل JSON خروجی و فایل افزونه و عکس پیش‌نمایش نمونه یش‌خوان‌های ساخته شده برای ارزیابی سکوی کم‌کد ساخته شده، در پوشه ```dashboards``` قرار دارند. این پیش‌خوان‌ها بر اساس شناسه کاربر ارزیابی کننده، پوشه‌بندی شده‌اند.

### نحوه نصب افزونه در مودل
برای نصب افزونه خروحی در سیستم مدیریت یادگیری مودل، ابتدا فایل zip را دانلود کرده و محتویات موجود در آن را استخراج کنید. سپس پوشه ```teachers_dashboard``` را در پوشه مودل با آدرس ```moodle/local``` قرار دهید.
با بارگذاری دوباره صفحه مودل، صفحه نصب افزونه نمایش داده می شود. برای نصب افزونه، افزونه ی ```logstore_lanalytics``` نیز باید نصب گردد.\
پس از نصب موفقیت آمیز افزونه، صفحه پیشخوان تحلیل عملکرد مدرسان به نوار منوی اصلی مودل اضافه می گردد.\
در نسخه 3.10 مودل، افزونه عملکرد بهتری دارد. 

### نصب مودل 3.10 در ویندوز
برای نصب مودل 3.10، از لینک https://download.moodle.org/download.php/windows/MoodleWindowsInstaller-latest-310.zip می توان استفاده نمود. پس از دانلود و استخراج محتویات آن، باید فایل ```start moodle.exe``` را اجرا کرد. هنگام اجرای فایل ```start moodle.exe```، نرم افزارهای شبیه ساز وب سرور مانند xampp یا wampserver نباید در حالت اجرا باشند. سپس در مرورگر با ورود به ```localhost```، صفحه تنظیمات و نصب مودل نمایش داده می شود. برای استفاده بهتر از افزونه خروجی، بر روی مودل بهتر است تا داده های مختلف مانند کاربران و دوره ها و نمرات و آزمون ها و... در سامانه وجود داشته باشد.\
\
دیگر نسخه های مودل برای ویندوز، از طریق آدرس https://download.moodle.org/windows/ در دسترس هستند.

### نصب سامانه مودل 3.10 بر روی سرور PHP
برای نصب سامانه مودل در سرور PHP، از لینک https://download.moodle.org/download.php/stable310/moodle-3.10.11.zip می توان استفاده کرد. پس از استخراج فایل ها از حالت فشرده و استقرار آن بر روی سرور مورد نظر، پنجره نصب نمایش داده می شود. تنظیمات سرور PHP را باید بر اساس نیازمندی های مودل تغییر داد. تنظیمات مورد نیاز هنگام نصب مودل نمایش داده می شوند.
##### نیازمندی های نصب این نسخه: ```PHP 7.2, MariaDB 10.2.29 or MySQL 5.7 or Postgres 9.6 or MSSQL 2012 or Oracle 11.2```
\
دیگر نسخه های مودل برای سرور PHP، از طریق آدرس های https://download.moodle.org/releases/latest/ و https://download.moodle.org/releases/legacy/ در دسترس هستند.
