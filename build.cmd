REM 7z.exe a commandline compression app from 7-zip
move /y media media_org
del PolarBook.zip
mkdir admin
mkdir site
mkdir media
xcopy /d /y /s media_org\com_polarbook\*.* media\*.*
copy administrator\components\com_polarbook\polarbook.xml polarbook.xml
xcopy /d /y /s administrator\components\com_polarbook\*.* admin\*.*
xcopy /d /y /s components\com_polarbook\*.* site\*.*
del admin\polarbook.xml
..\7z a -Y PolarBook.zip media
rmdir /S /Q media
..\7z a -Y PolarBook.zip *.xml
..\7z a -Y PolarBook.zip admin
..\7z a -Y PolarBook.zip site
del polarbook.xml
rmdir /S /Q admin
rmdir /S /Q site
move /Y media_org media

