import requests,os,sys,csv
from bs4 import BeautifulSoup
from urlparse import urlparse
import MySQLdb
from warnings import filterwarnings
from shutil import copyfile
from pprint import pprint
from subprocess import call
#t='.csv'
#pro='http://'


#def getdata(url,name):
#    data=requests.get(url)
#    soup = BeautifulSoup(data.text,'html.parser')
#    fo = open(name+t, "w+")
#    data=str(soup)
#    fo.write(data);
#    fo.close()
#    return soup

#webdir=os.getcwd()+"/FinalFiles"+"/"
#u='ash'
#if not os.path.exists(webdir):
#    os.makedirs(webdir)
txtdir=os.getcwd()+"/txt"+"/"
#if not os.path.exists(txtdir):
#    os.makedirs(txtdir)
#pp="keth.netau.net/"
#i=1;

#try:
#    for i in range(37):
#        getdata(pro+u+pp+str(i)+t,txtdir+str(i))
#except Exception:
#    print 'Files Download Not Complete'
#print 'No. of Files Downloaded ',i



host='127.0.0.1'
user = 'root'
passwd = 'root'
db = 'test'


try:
    mydb = MySQLdb.connect(host, user, passwd , db, local_infile = 1)
    cursor = mydb.cursor()
    cursor.execute('use ' + db + ";")
    
    query = "drop table if exists faculty_publications;"
    cursor.execute(query)
    query = "drop table if exists faculty_responsibilities;"
    cursor.execute(query)
    query = "drop table if exists faculty_current_projects;"
    cursor.execute(query)
    query = "drop table if exists faculty_group_members;"
    cursor.execute(query)
    query = "drop table if exists faculty_awards_accolades;"
    cursor.execute(query)
   
    query = "drop table if exists faculty_details;"
    cursor.execute(query)    


    query='create table faculty_details(fact_id INT NOT NULL AUTO_INCREMENT, fact_name varchar(100) NOT NULL , fact_designation varchar(100) NOT NULL, fact_email varchar(50), fact_phone_no varchar(50),fact_website varchar(100),fact_research varchar(5000),PRIMARY KEY(fact_id));'
    cursor.execute(query)

    query='create table faculty_publications(fact_id INT NOT NULL, pub_title varchar(1000), pub_year INT,FOREIGN KEY (fact_id) REFERENCES faculty_details(fact_id) ON DELETE CASCADE);'
    cursor.execute(query)
    query='create table faculty_responsibilities(fact_id INT NOT NULL,fact_responsibility varchar(1000) ,FOREIGN KEY (fact_id) REFERENCES faculty_details(fact_id) ON DELETE CASCADE);'
    cursor.execute(query)
    query='create table faculty_current_projects(fact_id INT NOT NULL,proj_title varchar(1000) ,proj_sponsoring_agency varchar(2000),FOREIGN KEY (fact_id) REFERENCES faculty_details(fact_id) ON DELETE CASCADE);'
    cursor.execute(query)
    query='create table faculty_group_members(fact_id INT NOT NULL, group_name varchar(1000), group_area_of_research varchar(2000),FOREIGN KEY (fact_id) REFERENCES faculty_details(fact_id) ON DELETE CASCADE);'
    cursor.execute(query)
    query='create table faculty_awards_accolades(fact_id INT NOT NULL, award_title varchar(1000), award_year INT,FOREIGN KEY (fact_id) REFERENCES faculty_details(fact_id) ON DELETE CASCADE);'
    cursor.execute(query)
    
    for j in range(1,37):
        fr=open(txtdir+str(j)+'.csv','r')
        csvlink = csv.reader(fr,)
        k=0
        for line in csvlink:
            if k==0:
                name=""
                deg=""
                email=""
                pno=""
                web=""
                res=""
                try:
                    if len(line[0])!=0:
                        name=line[0]
                except:
                    name=""
                try:
                    if len(line[1])!=0:
                        deg=line[1]
                except:
                    deg=""
                try:
                    if len(line[2])!=0:
                        email=line[2]
                except:
                    email=""
                try:
                    if len(line[3])!=0:
                        pno=line[3]
                except:
                    pno=""
                try:
                    if len(line[4])!=0:
                        web=line[4]
                except:
                    web=""
                try:
                    if len(line[5])!=0:
                        res=line[5]
                except:
                    res=""
                query='insert into faculty_details values(\''+str(j)+'\',\''+name+'\',\''+deg+'\',\''+email+'\',\''+pno+'\',\''+web+'\',\''+res+'\');'  
                cursor.execute(query)
            if k==1:
                try:
                    for respon in line:
                        if len(respon)!=0:
                            query='insert into faculty_responsibilities values(\''+str(j)+'\',\''+respon+'\');'
                            cursor.execute(query)
                except:
                    print "exception: In responsibility insertion"
            if k==2:
                try:
                    for z in range(len(line)):
                        if z%2==1:continue
                        title=""
                        s=""
                        try:
                            if len(line[z])!=0:title=line[z]
                        except: title=""
                        try:
                            if len(line[z+1])!=0:s=line[z+1]
                        except: s=""
                        if not (s=="" and title==""):
                            query='insert into faculty_current_projects values(\''+str(j)+'\',\''+title+'\',\''+s+'\');'
                            cursor.execute(query)
                except Exception,e:
                    print "exception:",e
            if k==3:
                try:
                    for z in range(len(line)):
                        if z%2==1:continue
                        name=""
                        area=""
                        try:
                            if len(line[z])!=0:name=line[z]
                        except: name=""
                        try:
                            if len(line[z+1])!=0:area=line[z+1]
                        except: area=""
                        if not (name=="" and area==""):
                            query='insert into faculty_group_members values(\''+str(j)+'\',\''+name+'\',\''+area+'\');'
                            cursor.execute(query)
                except Exception,e:
                    print "exception:",e
            if k==4:
                try:
                    for z in range(len(line)):
                        if z%2==1:continue
                        title=""
                        year=-1
                        try:
                            if len(line[z])!=0:title=line[z]
                        except: title=""
                        try:
                            if len(line[z+1])!=0:year=int(line[z+1])
                        except: year=-1
                        if not (year==-1 and title==""):
                            query='insert into faculty_publications values(\''+str(j)+'\',\''+title+'\',\''+str(year)+'\');'
                            cursor.execute(query)
                except Exception,e:
                    print "exception:",e
            if k==5:
                try:
                    for z in range(len(line)):
                        if z%2==1:continue
                        title=""
                        year=-1
                        try:
                            if len(line[z])!=0:title=line[z]
                        except: title=""
                        try:
                            if len(line[z+1])!=0:year=int(line[z+1])
                        except: year=-1
                        if not (year==-1 and title==""):
                            query='insert into faculty_awards_accolades values(\''+str(j)+'\',\''+title+'\',\''+str(year)+'\');'
                            cursor.execute(query)
                except Exception,e:
                    print "exception:",e
            mydb.commit()
            k=k+1
        fr.close()
    cursor.close()
    mydb.close()
except Exception,e:
    print 'Can\'t Connect To Database  ',e
