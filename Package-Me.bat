
@REM Get current working dir name to use as archive name.
@for %%a in (.) do @set currentfolder=%%~na
@SET @CURR_DIR= "Tag"

@REM Try to delete the file only if it exists
@IF EXIST %@CURR_DIR%.tgz GOTO DELETE
@echo No archive with name '%@CURR_DIR%.tgz' currently exists, will create new archive.
@GOTO CREATE 

:DELETE
@del /F %@CURR_DIR%.tgz
@printf \n
@echo Deleted old archive.

@REM If the file wasn't deleted for some reason, stop and error
@IF EXIST %@CURR_DIR% GOTO ERROR

:CREATE
@REM If the file wasn't deleted for some reason, stop and error otherwise archive
@IF NOT EXIST "C:\Program Files\7-Zip" GOTO NO7ZIP
@"C:\Program Files\7-Zip\7z.exe" a -tzip %@CURR_DIR%.zip * -xr0!*.bat -xr!.git -xr!.gitignore
@GOTO SUCCESS

:ERROR 
@printf \n
@echo %@CURR_DIR%.tgz could not be created, existing one could not be deleted.
@GOTO FINISH

:NO7ZIP
@printf \n
@echo 7-zip could not be found.
@GOTO FINISH

:SUCCESS
@printf \n
@echo %@CURR_DIR%.tgz Created Successfully.

:FINISH