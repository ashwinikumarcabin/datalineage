'''
This Python File is used to create descriptive/prescribtive analysis of DataLineage Report and
change to audio.

Date:             17/03/2020
Author:           Anubhav Tiwari, RBEI

Target:           TextToSpeech
Source:           SQL SERVER(DataLineageDb)
Context:          Prescribtive Analytics

Initial Modules   3
No.of Modules:    3

Version      Date      Modified By      Reason
   1.     17/03/2020    TIA4KOR      Initial Script/Descriptive Analytics to Voice

Comment Update:   17/03/2020

Note: Uncomment date time code and calculate script execution time after any change update it above.
Note: Change comments as per coding changes




#from datetime import datetime
#print(datetime.now())



Libraries Used:   pyodbc,pandas,re,json,os,xml.dom.minidom,six,zipfile,xml.etree.ElementTree,configparser
'''


import pyodbc
import pandas as pd
import re
import json
import os
import xml.dom.minidom
from six import iteritems #to iter doc/objects
import xml.etree.ElementTree as ET
from zipfile import ZipFile as zp
from configparser import ConfigParser



'''
Module 1:         Import Configuration details from .ini file
Description:      Importing details server name, database name, directory path, extention,driver from the pyconfig.ini file
                  for dynamic connection to sql server
'''



config = ConfigParser()
config.read('pyconfig.ini')
directory = config.get('Export','Directory')
extention = config.get('Export','Extention')
Server = config.get('Server','Name')
Driver = config.get('Server','Driver')
Database = config.get('Server','Database')
ReportServer = config.get('ReportServer','Name')
'''
Module 2:         Establish connection to sql servr
Description:      Connecting to sql server using pyodbc
'''
conn = pyodbc.connect('Driver={%s};Server=%s;Database=%s;Trusted_Connection=yes;'%(Driver,Server,Database))
cursor = conn.cursor()


'''
Module  :         Descriptive Analytics to Voice
Description:      Experimenting
'''
df = pd.read_sql_query("select *from ExecutionLog",conn)
#print(df)
TotalReports = pd.read_sql_query("select count(ItemID) from ReportCatalog",conn)
TotalReports = TotalReports.at[0,'']
UsedReports = pd.read_sql_query("select count(ItemID) from ReportCatalog where ItemID in(Select distinct(ItemID) from ExecutionLog)",conn)
UsedReports = UsedReports.at[0,'']
UnusedReports = pd.read_sql_query("select count(ItemID) from ReportCatalog where ItemID not in(Select distinct(ItemID) from ExecutionLog)",conn)
UnusedReports = UnusedReports.at[0,'']
TotalDataSources = pd.read_sql_query("SELECT COUNT(*) FROM (SELECT DISTINCT ServerName, DatabaseName , FilePAth FROM RelationSourceSet) AS internalQuery",conn)
TotalDataSources = TotalDataSources.at[0,'']
TotalDataSets = pd.read_sql_query("SELECT COUNT(*) FROM (SELECT DISTINCT DataSetName FROM RelationSourceSet) AS internalQuery",conn)
TotalDataSets = TotalDataSets.at[0,'']
TotalSize = pd.read_sql_query("select sum(a.FileSize) from  (select distinct ReportPath,FileSize from RelationSourceSet) a",conn)
TotalSize = TotalSize.at[0,'']
DuplicateComb = pd.read_sql_query("select count(*)/2 from Similarity_Scores where Score > 0.75 and [Row] <> Col",conn)
DuplicateComb = DuplicateComb.at[0,'']
print("TotalReports: ",TotalReports)
print("UsedReports:  ",UsedReports)
print("UnusedReports: ",UnusedReports)
print("TotalDataSources: ",TotalDataSources)
print("TotalDataSets: ",TotalDataSets)
print("TotalSize: ",TotalSize)
cursor.close()
ls = []
for i in df['ItemID'].unique():
    query = "select max(TimeStart) from ExecutionLog where ItemID ='%s'"%i
    sql = pd.read_sql_query(query,conn)
    ls.append((i,sql.at[0,'']))
dd = pd.DataFrame(ls)
#print(dd.nlargest(3,1))
pp = dd[dd[1]==dd[1].max()]
pp = pp.reset_index()
pp = str(pp.at[0,0])
lastseen = pd.read_sql_query("select Path from ReportCatalog where ItemID='%s'"%pp,conn)
lastseen =lastseen.at[0,'Path']
folder = str(lastseen.split('/')[0])
if(folder == ''):
    folder = 'Main'
print(folder)
lastseen = pd.read_sql_query("select Name from ReportCatalog where ItemID='%s'"%pp,conn)
lastseen =lastseen.at[0,'Name']
print(lastseen)
mytext = "Hello here is The summarry of POWER B I"+ReportServer+".Total Reports uploaded to Power B I report server are "+str(TotalReports)+".\nConsuming "+str(TotalSize)+" MB of space."+str(UsedReports)+", Reports are used by users,"+str(UnusedReports)+" Reports are not at all seen by users, "+lastseen+" was the last accessed report in folder "+folder+", There are "+str(TotalDataSources)+" Data sources, with "+str(TotalDataSets)+" Data Sets. There are "+str(DuplicateComb)+" Duplicate Report Combinations.\n Please go to Lineage report for more information"
print(mytext)
mytext1 = "Hello here is The summarry of POWER B I"+ReportServer+".\nTotal Reports uploaded to Power B I report server are "+str(TotalReports)+".\nConsuming "+str(TotalSize)+" MB of space.\n"+str(UsedReports)+", Reports are used by users.\n"+str(UnusedReports)+" Reports are not at all seen by users.\n"+lastseen+" was the last accessed report in folder "+folder+".\nThere are "+str(TotalDataSources)+" Data sources, with "+str(TotalDataSets)+" Data Sets.\nThere are "+str(DuplicateComb)+" Duplicate Report Combinations.\nPlease go to Lineage report for more information"

f = open( 'Email.txt', 'w' )
f.write(mytext1)
f.close()
'''
from gtts import gTTS
language = 'en'
myobj = gTTS(text=mytext, tld='cn',lang=language, slow=False)
os.remove("welcome.mp3")
count = 0
while True:
    try:
        myobj.save("welcome.mp3")
        break
    except:
        print('Issue No. '+str(count))
        count+=1

os.system("welcome.mp3")
'''


'''
Module 4:         Prescribtive Analytics
Description:      To be started after module 3 is completed successfully
'''
#print(datetime.now())
