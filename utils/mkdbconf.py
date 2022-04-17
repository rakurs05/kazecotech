print("<== Configuring DataBase config ==>")
host = input("Host: ")
uname = input("Username: ")
password = input("Password: ")
dbname = input("Database name (default - \'kazecotech\'): ")
path = input("Path of \"script\" directory (default - this): ")
if(dbname == ''):
    dbname = 'kazecotech'
if(path == ''):
    path = '.'
f = open(path + "/database.txt", "w")
f.write(host)
f.write(uname)
f.write(password)
f.write(dbname)
f.flush()
f.close()
if(path == '.'):
    print("Now move \"database.txt\" file to your \"script\" directory. After - all settings will be applied")
print("<== Done! ==>")