#!/usr/bin/python

from ftplib import FTP
import os
import filecmp


def check(filename):
    flag=0
   
    os.chdir(filename)

    dir_list_fol=[f for f in os.listdir('.') if os.path.isfile(f)]
    for f in dir_list_fol:
        file=open(f,"rb")
        dir_list=[]
        ftp.dir(dir_list.append)
        for fname in dir_list:        
            fname=fname.split(' ')
            if(filecmp.cmp(f,fname[-1])):
               flag=1
               print("File Already present with name: {}".format(fname[-1]))
            else:
                continue
        if flag==0:
            ftp.storbinary(f"STOR "+f, file)
            print("Success!")
            files = ftp.dir()
            print(files)
        file.close()
    

ftp = FTP('localhost')
ftp.login(user='User1', passwd = 'satwik')
print("successfully connected")
print ("File List:")
files = ftp.dir()
print (files)

print(ftp.pwd())
ftp.cwd("FTP Server Files")

filename="/Users/hp/file_upload"
check(filename)
ftp.close()
