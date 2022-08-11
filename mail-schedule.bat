cd C:\Users\ZawWinTin\OneDrive\Desktop\PostComment\example-app && php artisan schedule:run > "NUL" 2>&1

@REM Linux
@REM >> /dev/null
@REM Window
@REM "NUL"
@REM For not displaying every outputs to terminal

@REM * * * * *  command to execute (Linux)
@REM │ │ │ │ │
@REM │ │ │ │ └─── day of week (0 - 6) (0 to 6 are Sunday to Saturday, or use names; 7 is Sunday, the same as 0)
@REM │ │ │ └──────── month (1 - 12)
@REM │ │ └───────────── day of month (1 - 31)
@REM │ └────────────────── hour (0 - 23)
@REM └─────────────────────── min (0 - 59)

@REM * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
@REM https://cronexpressiontogo.com/ [Link for five asterisks]

@REM docker exec -it container_name php artisan schedule:run > "NUL" 2>&1 