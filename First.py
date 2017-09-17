#sudo apt-get intall python-bs4
# For lex and yacc 
#sudo apt-get install flex
#  sudo apt-get install bison
#export all_proxy="https://10.3.100.207:8080/"
#cd ~
#bash Anaconda2-2.5.0-Linux-x86_64.sh
#PATH=$PATH:$HOME/anaconda/bin
#export http_proxy="10.3.100.207:8080"
#export https_proxy="10.3.100.207:8080"
#export ftp_proxy="10.3.100.207:8080"
#logout
#conda install -c https://conda.anaconda.org/anaconda gensim
#logout

#import requests
import urllib2
import bs4
import os
rooturl = "http://www.iitkgp.ac.in"
url = "http://www.iitkgp.ac.in/department/CS"

newpath = r'Files' 
if not os.path.exists(newpath):
    os.makedirs(newpath)


try:  web_page = urllib2.urlopen(url)
except urllib.error.URLError as e :
    print(e.reason)
    print("Can not open the seed page")
    sys.exit(0)
    	
page_text = web_page.read()
#r = requests.get(url, verify = False)
#print r.text
soup = bs4.BeautifulSoup(page_text)
tname = soup.title.string
print tname
text_file = open("Files/" + tname + ".html" , "w")

text_file.write(page_text)

text_file.close()
startIndex = page_text.find('<div class="aboutTheDepartmentFacultyListing"')
endIndex = page_text.find('</div>', startIndex)

fp = open("Files/" +tname + ".html", "r")
fp.seek(startIndex , 0)
line = fp.readline()
facultyLinks = []
for line in fp :
    print line
    hrefindex = line.find('href')
    if hrefindex <> -1 :
        doublequotestartindex = line.find('"' , hrefindex)
        if doublequotestartindex <> -1 :
            semicolonindex = line.find(';' , doublequotestartindex)
            if semicolonindex <> -1 :
                facultyLinks.append(rooturl + line[doublequotestartindex+1 : semicolonindex])           
    if "</div>" in line :
        break;
    
print startIndex
for item in facultyLinks :
    print item
    web_page = ""
    try:  web_page = urllib2.urlopen(item)
    except urllib.error.URLError as e :
        print(e.reason)
        print("Can not open the page - " + item )
        continue
        
    page_text = ""
    try :
        page_text = web_page.read()
    except httplib.IncompleteRead as e :
        page = e.partial
        print("Partial fetch")
        continue
             
    soup = bs4.BeautifulSoup(page_text)
    tname = item[item.rfind("/") + 1 :]
    
    print tname
    text_file = open("Files/" +tname + ".html" , "w")
    text_file.write(page_text)
    text_file.close()
    
    
#for link in soup.find_all('a') :
#    print(link.get('href'))
