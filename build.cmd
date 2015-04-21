REM 7z.exe a commandline compression app from 7-zip
del PolarBook.zip
mkdir admin
mkdir site
mkdir com_polarbook
copy administrator\components\com_polarbook\polarbook.xml polarbook.xml
xcopy /d /y /s administrator\components\com_polarbook\*.* admin\*.*
xcopy /d /y /s components\com_polarbook\*.* site\*.*
xcopy /d /y /s media\com_polarbook\*.* com_polarbook\*.*
del admin\polarbook.xml
..\7z a -Y PolarBook.zip *.xml
..\7z a -Y PolarBook.zip admin
..\7z a -Y PolarBook.zip site
..\7z a -Y PolarBook.zip com_polarbook
del polarbook.xml
rmdir /S /Q admin
rmdir /S /Q site
rmdir /S /Q com_polarbook

