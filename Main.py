import json
import datetime as dt
from os import system
import random
import time
import threading
import subprocess
import logging
from tokenize import Special
import pytz
logging.basicConfig(filename='BellTimerSystem.log', format='%(asctime)s %(message)s', datefmt='%m/%d/%Y %I:%M:%S %p')
logging.warning('| System started Logging Online')
# Global Varibales
webRoot = ""
globalSettings = json.load(open(webRoot + "html/assets/json/global.json"))
TIMEZONE = globalSettings['TimeZone']['zone']
everyday = ("monday", "tuesday", "wednesday","thursday", "friday", "saturday", "sunday")
workDays = ("monday", "tuesday", "wednesday","thursday", "friday")
weekend = ( "saturday", "sunday")

def SpecialDayLoop():
    todaysdate = dt.datetime.now(pytz.timezone(TIMEZONE))
    thetime = [todaysdate.strftime("%H"), todaysdate.strftime("%M")]
    drillsDates =json.load(open("/var/www/html/assets/json/drills.json"))
    for x in drillsDates:
        if (todaysdate) == x["date"]:
            y = drillsDates[x]['time'].split(":")
            if(y == thetime):
                DrillType = drillsDates[x]['type']
                Bellsys = threading.Thread(target=Tone, args=(DrillType,))
                Bellsys.start()
                Bellsys.join() 
                time.sleep(60)
                continue

def DrillsDatesLoop():
    todaysdate = dt.datetime.now(pytz.timezone(TIMEZONE))
    thetime = [todaysdate.strftime("%H"), todaysdate.strftime("%M")]
    drillsDates =json.load(open("/var/www/html/assets/json/drills.json"))
    for x in drillsDates:
        if (todaysdate) == x["date"]:
            y = drillsDates[x]['time'].split(":")
            if(y == thetime):
                DrillType = drillsDates[x]['type']
                Bellsys = threading.Thread(target=Tone, args=(DrillType,))
                Bellsys.start()
                Bellsys.join() 
                time.sleep(60)
                continue
    
def ExcludeDatesLoop():
    todaysdate = dt.datetime.now(pytz.timezone(TIMEZONE))
    excludeDates =json.load(open("/var/www/html/assets/json/exclude.json"))
    for x in excludeDates:
        if (todaysdate) == x["date"]:
            time.sleep(60)
            continue

def TermDatesLoop():
    todaysdate = dt.datetime.now(pytz.timezone(TIMEZONE))
    thetime = [todaysdate.strftime("%H"), todaysdate.strftime("%M")]
    drillsDates =json.load(open("/var/www/html/assets/json/drills.json"))
    for x in drillsDates:
        if (todaysdate) == x["date"]:
            y = drillsDates[x]['time'].split(":")
            if(y == thetime):
                DrillType = drillsDates[x]['type']
                Bellsys = threading.Thread(target=Tone, args=(DrillType,))
                Bellsys.start()
                Bellsys.join() 
                time.sleep(60)
                continue

def TimeLoop():
    while True:
            #Grabs real Time
            todaysdate = dt.datetime.now(pytz.timezone(TIMEZONE))
            #Creates current hour and min
            currentTIme = [todaysdate.strftime("%H"), todaysdate.strftime("%M")]
            globalSettings = json.load(open("/var/www/html/assets/json/global.json"))
            if globalSettings['EVAC']['EVAC'] == True:
                TimeLoop()
            else:
                # Drills
                try:
                    json.load(open("/var/www/html/assets/json/drills.json"))
                except:
                    logging.warning('| Error Loading drills.json Skipping..')
                else:
                    drillsDates =json.load(open("/var/www/html/assets/json/drills.json"))
                    for x in drillsDates:
                        if (todaysdate) == x["date"]:
                            DrillsDatesLoop()
                # Special Days
                try:
                    json.load(open("/var/www/html/assets/json/specialDay.json"))
                except:
                    logging.warning('| Error Loading specialDay.json Skipping..')
                else:
                    specialDay =json.load(open("/var/www/html/assets/json/specialDay.json"))
                    for x in specialDay:
                        if (todaysdate) == x["date"]:
                            SpecialDayLoop()
                # Excluded Days
                try:
                    json.load(open("/var/www/html/assets/json/exclude.json"))
                except:
                    logging.warning('| Error Loading exclude.json Skipping..')
                else:
                    excludeDates =json.load(open("/var/www/html/assets/json/exclude.json"))
                    for x in excludeDates: 
                        if (todaysdate) == x["date"]:
                            ExcludeDatesLoop()
                 # Excluded Days
                try:
                    json.load(open("/var/www/html/assets/json/termDates.json"))
                except:
                    logging.warning('| Error Loading termDates.json Skipping..')
                else:
                    termDates =json.load(open("/var/www/html/assets/json/termDates.json"))
                    for x in termDates: 
                        if (todaysdate) == x["date"]:
                            TermDatesLoop()
            system('clear')

def play(id):
    data = json.load(open('/var/www/html/assets/json/messages.json'))
    for r in data:
        if id == id:
            subprocess.call(['ffplay -autoexit -nodisp  /var/www/html/assets/messages/'+id], shell=True)
            logging.warning('| Message played,-' + data[r]['name'])
            return
        else:
            logging.warning('| ERROR: message did not play')
            return

def Tone(type):
    print(type)

if __name__ == "__main__":
    logging.warning("Creating Threads")
    x = threading.Thread(target=TimeLoop)
    logging.warning("Starting Threads")
    x.start()