from subprocess import call
import glob, os
import re
i = 1
for file in glob.glob("cs-*.html"):
    print(file)
    call("./a.out < " + file + " > " + str(i) + ".txt" , shell = True)
    f = open(str(i) + ".txt", "r");
    s = f.read();
    n = re.sub("<.*?>", " ", s)
    f.close();
    f = open(str(i) + ".txt" , "w");
    f.write(n);
    f.close();
    i = i + 1
    
