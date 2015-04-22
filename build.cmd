REM 7z.exe a commandline compression app from 7-zip
del PolarBook.zip
move admin\polarbook.xml polarbook.xml
..\7z a -Y PolarBook.zip *.xml
..\7z a -Y PolarBook.zip admin
..\7z a -Y PolarBook.zip site
..\7z a -Y PolarBook.zip media
move polarbook.xml admin\polarbook.xml

