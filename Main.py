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
    print("SpecialDayLoop")
    time.sleep(60)

def DrillsDatesLoop():
    print("DrillsDatesLoop")
    time.sleep(60)
    
def TimeLoop():
    while True:
            #Grabs real Time
            todaysdate = dt.datetime.now(pytz.timezone(TIMEZONE))
            #Creates current hour and min
            currentTIme = [todaysdate.strftime("%H"), todaysdate.strftime("%M")]
            globalSettings = json.load(open("/var/www/html/assets/json/global.json"))
            if globalSettings['EVAC']['EVAC'] == True:
                TimeLoop()
            specialDay = json.load(open("/var/www/html/assets/json/specialDay.json"))
            for x in specialDay:
                if (todaysdate) == x["date"]:
                    SpecialDayLoop()

            for x in drillsDates:
                if (todaysdate) == x["date"]:
                    DrillsDatesLoop()
            for x in excludeDates:
                if (todaysdate) == x["date"]:
                    print("bell")        
                        if int(todaysdate.strftime("%M")) == 0:
                            print('sleeping for 60 seconds')
                            time.sleep(60)
                            break
                        else:
                            messageArray =[]
                            for x in sounds:
                                z = 1
                                messageArray.insert(int(z),messages[x]['name'])
                                z+=1
                            choice = random.choice(messageArray)
                            logging.warning('| Annoucement Rang '+ choice +', spacing is '+ str(frequency))
                            print(choice)
                            running  = threading.Thread(target=play, args=(str(choice),))
                            logging.warning("Starting Play")
                            running.start()
                            time.sleep(60)
                    
 
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

if __name__ == "__main__":
    logging.warning("Creating Threads")
    x = threading.Thread(target=TimeLoop)
    logging.warning("Starting Threads")
    x.start()