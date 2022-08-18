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
TIMEZONE = globalSettings['TimeZone']['Zone']
everyday = ("monday", "tuesday", "wednesday","thursday", "friday", "saturday", "sunday")
week = ("monday", "tuesday", "wednesday","thursday", "friday")
weekend = ( "saturday", "sunday")

def SpecialDayLoop():
    todaysdate = dt.datetime.now(pytz.timezone(TIMEZONE))
    thetime = [todaysdate.strftime("%H"), todaysdate.strftime("%M")]
    drillsDates =json.load(open(webRoot + "html/assets/json/drills.json"))
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
    drillsDates =json.load(open(webRoot + "html/assets/json/drills.json"))
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
    excludeDates =json.load(open(webRoot + "html/assets/json/exclude.json"))
    for x in excludeDates:
        if (todaysdate) == x["date"]:
            time.sleep(60)
            continue

def TermDatesLoop(id):
    TIMEZONE = globalSettings['TimeZone']['Zone']
    todaysdate = dt.datetime.now(pytz.timezone(TIMEZONE))
    thetime = [todaysdate.strftime("%H"), todaysdate.strftime("%M")]
    nextBell = ['23','59']
    try:
        json.load(open(webRoot + 'html/assets/json/Templates.json'))
    except:
            logging.warning('| Critical Error Loading Templates.json Skipping..')
            logging.warning('| WARNING BELLS WILL NOT RING')
            print('| Critical Error Loading Templates.json')
            print('| WARNING BELLS WILL NOT RING')
    else:
            Template = json.load(open(webRoot + 'html/assets/json/Templates.json'))
            length = len(Template[id]['bells'])
            q = 0
            while q < length:
                now = dt.datetime.now()
                daynow = now.weekday()
                daytoday = week[daynow]
                thetime = [now.strftime("%H"), now.strftime("%M")]
                x = Template[id]['bells'][q]['time'].split(":")
                x = [z.encode() for z in x]
                x = [z.decode('UTF-8') for z in x]
                if thetime == x:
                    for DayOfTheWeek in everyday:
                        try:
                            Template[id]['bells'][q][DayOfTheWeek]
                        except KeyError:
                            pass
                        else:
                            if daytoday == DayOfTheWeek:
                                try:
                                    belltype = Template[id]['bells'][q]['belltype']
                                except KeyError:
                                    logging.warning('| Bell Tryed to ring But Belltype Not Selected')
                                else:
                                    belltype = Template[id]['bells'][q]['belltype']
                                    bell = threading.Thread(target=play, args=(belltype,(Template[id]['bells'][q]['zone'])))
                                    bell.start()
                                    time.sleep(60)
                                    q = q + 1
                                    return
                                    
                    for DayOfTheWeek in week:
                        try:
                            Template[id]['bells'][q]['weekdays']
                        except KeyError:
                            pass
                        else:
                            if daytoday == DayOfTheWeek:
                                try:
                                    belltype = Template[id]['bells'][q]['belltype']
                                except KeyError:
                                    logging.warning('| Bell Tryed to ring But Belltype Not Selected')
                                else:
                                    belltype = Template[id]['bells'][q]['belltype']
                                    bell = threading.Thread(target=play, args=(belltype,(Template[id]['bells'][q]['zone'])))
                                    bell.start()
                                    time.sleep(60)                                   
                                    q = q + 1
                                    return
                    for DayOfTheWeek in weekend:
                        try:
                            Template[id]['bells'][q]['weekends']
                        except KeyError:
                            pass
                        else:
                            if daytoday == DayOfTheWeek:
                                try:
                                    belltype = Template[id]['bells'][q]['belltype']
                                except KeyError:
                                    logging.warning('| Bell Tryed to ring But Belltype Not Selected')
                                else:
                                    belltype = Template[id]['bells'][q]['belltype']
                                    bell = threading.Thread(target=play, args=(belltype,(Template[id]['bells'][q]['zone'])))
                                    bell.start()
                                    time.sleep(60)                                   
                                    q = q + 1
                                    return
                else:
                    if thetime < x < nextBell:
                        nextBell = x               
                    q = q + 1
            if nextBell != ['23','59']:
                print("next bell is at " + nextBell[0] +":"+ nextBell[1])        

def TimeLoop():
    while True:
            #Grabs real Time
            todaysdate = dt.datetime.now(pytz.timezone(TIMEZONE))
            dateToday = (todaysdate.strftime("%YYYY") + "-" + todaysdate.strftime("%MM") + "-" + todaysdate.strftime("%DD"))
            #Creates current hour and min
            currentTIme = (todaysdate.strftime("%H") + ":" +todaysdate.strftime("%M"))
            system('clear')
            print("System Time :  " + currentTIme)
            globalSettings = json.load(open(webRoot + "html/assets/json/global.json"))
            if globalSettings['EVAC']['EVAC'] == True:
                TimeLoop()
            else:
                # Drills
                try:
                    json.load(open(webRoot + "html/assets/json/drills.json"))
                except:
                    logging.warning('| Error Loading drills.json Skipping..')
                    print('| Error Loading drills.json Skipping..')
                else:
                    drillsDates =json.load(open(webRoot + "html/assets/json/drills.json"))
                    for x in drillsDates:
                        if drillsDates[x]["date"] == (dateToday):
                            DrillsDatesLoop()
                # Special Days
                try:
                    json.load(open(webRoot + "html/assets/json/specialDay.json"))
                except:
                    logging.warning('| Error Loading specialDay.json Skipping..')
                    print('| Error Loading specialDay.json Skipping..')
                else:
                    specialDay =json.load(open(webRoot + "html/assets/json/specialDay.json"))
                    for x in specialDay:
                        if specialDay[x]["date"] == (dateToday):
                            SpecialDayLoop()
                # Excluded Days
                try:
                    json.load(open(webRoot + "html/assets/json/exclude.json"))
                    
                except:
                    logging.warning('| Error Loading exclude.json Skipping..')
                    print('| Error Loading exclude.json Skipping..')
                else:
                    excludeDates =json.load(open(webRoot + "html/assets/json/exclude.json"))
                    for x in excludeDates: 
                        if (dateToday) == excludeDates[x]["date"]:
                            ExcludeDatesLoop()
                 # Does today fall within a term
                try:
                    json.load(open(webRoot + "html/assets/json/termDates.json"))
                except:
                    logging.warning('| Error Loading termDates.json Skipping..')
                    print('| Error Loading termDates.json Skipping..')
                else:
                    termDates =json.load(open(webRoot + "html/assets/json/termDates.json"))
                    for x in termDates: 
                        termStart = dt.date.fromisoformat(termDates[x]['start'])
                        termEnd = dt.date.fromisoformat(termDates[x]['finish'])
                        if(termStart <= todaysdate.date() <= termEnd):
                            Template = termDates[x]['Template']
                            TermDatesLoop(Template)
            
            

def play(id,zone):
    print("Ringing Bell")
    logging.warning('| Ringing Bell: '+id)
    try:
        data = json.load(open(webRoot + 'html/assets/json/sounds.json'))
    except:
        logging.warning('| Error Loading termDates.json Skipping..')
        print('| Error Loading termDates.json Skipping..')
    else:
        data = json.load(open(webRoot + 'html/assets/json/sounds.json'))
        if zone == "ALL":
            subprocess.call(['ffplay -autoexit -nodisp "'+ data[id]['dir']+'"'], shell=True) 
            time.sleep(60)
        elif zone == "1-2":
            if globalSettings["Zones"]["One"] & globalSettings["Zones"]["Two"]== True :
                subprocess.call(['ffplay -autoexit -nodisp "'+ data[id]['dir']+'"'], shell=True) 
                time.sleep(60)
        elif zone == "3-4":
            if globalSettings["Zones"]["Three"] & globalSettings["Zones"]["Four"]== True :
                subprocess.call(['ffplay -autoexit -nodisp "'+ data[id]['dir']+'"'], shell=True)
                time.sleep(60)
        elif zone == "1":
            if globalSettings["Zones"]["One"] == True:
                subprocess.call(['ffplay -autoexit -nodisp "'+ data[id]['dir']+'" -af "pan=stereo|c0=c0"'], shell=True)
                time.sleep(60)
        elif zone == "2":
            if globalSettings["Zones"]["Two"] == True:
                subprocess.call(['ffplay -autoexit -nodisp "'+ data[id]['dir']+'" -af "pan=stereo|c1=c1"'], shell=True)
                time.sleep(60)
        elif zone == "3":
            if globalSettings["Zones"]["One"] == True:
                subprocess.call(['ffplay -autoexit -nodisp "'+ data[id]['dir']+'" -af "pan=stereo|c0=c0"'], shell=True)
                time.sleep(60)
        elif zone == "4":
            if globalSettings["Zones"]["One"] == True:
                subprocess.call(['ffplay -autoexit -nodisp "'+ data[id]['dir']+'" -af "pan=stereo|c1=c1"'], shell=True)
                time.sleep(60)
        
def Tone(type):
    print(type)

if __name__ == "__main__":
    logging.warning("Creating Threads")
    x = threading.Thread(target=TimeLoop)
    logging.warning("Starting Threads")
    x.start()