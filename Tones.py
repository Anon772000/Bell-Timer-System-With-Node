from pygame import mixer
import sys
import subprocess
import threading
from gpiozero import Button
import logging
import time
logging.basicConfig(filename='Tones.log',format='%(asctime)s %(message)s', datefmt='%m/%d/%Y %I:%M:%S %p')
logging.warning('| System started Button Module Online')
EvacButton = Button(17)
AlertButton = Button(18)
LockdownButton = Button(27)
LockoutButton = Button(22)
BellButton = Button(23)
Cancel = Button(15)
def main(tone):
    if tone == 'evac':
        print('Evac Play')
        logging.warning('| Evac Play')
        mixer.stop()
        subprocess.call(['sudo pkill -9 -f RingEmergenceyEvacuation.py'], shell=True)
        subprocess.call(['sudo pkill -9 -f RingLockdown.py'], shell=True)
        subprocess.call(['sudo pkill -9 -f RingLockout.py'], shell=True)
        subprocess.call(['sudo pkill -9 -f RingAlert.py'], shell=True)        
        channel = mixer.find_channel()
        channel = EvacSound.play(-1)
        channel.set_volume(0.0, 1.0)
        time.sleep(5)
    if tone == 'alert':
        print('Alert Play')
        logging.warning('| Alert Play')
        mixer.stop()
        subprocess.call(['sudo pkill -9 -f RingEmergenceyEvacuation.py'], shell=True)
        subprocess.call(['sudo pkill -9 -f RingLockdown.py'], shell=True)
        subprocess.call(['sudo pkill -9 -f RingLockout.py'], shell=True)
        subprocess.call(['sudo pkill -9 -f RingAlert.py'], shell=True)
        channel = AlertRamp.play()
        channel.set_volume(0.0, 1.0)
        time.sleep(16)
        channel1 = AlertVoice.play(-1)
        channel1.set_volume(0.0, 1.0)
        time.sleep(5)
    if tone == 'lockdown':
        print('Lockdown Play')
        logging.warning('| Lockdown Play')
        mixer.stop()
        subprocess.call(['sudo pkill -9 -f RingEmergenceyEvacuation.py'], shell=True)
        subprocess.call(['sudo pkill -9 -f RingLockdown.py'], shell=True)
        subprocess.call(['sudo pkill -9 -f RingLockout.py'], shell=True)
        subprocess.call(['sudo pkill -9 -f RingAlert.py'], shell=True)
        LockdownSound.play(-1)
        time.sleep(5)
    if tone == 'lockout':
        print('Lockout Play')
        logging.warning('| Lockout Play')
        mixer.stop()
        subprocess.call(['sudo pkill -9 -f RingEmergenceyEvacuation.py'], shell=True)
        subprocess.call(['sudo pkill -9 -f RingLockdown.py'], shell=True)
        subprocess.call(['sudo pkill -9 -f RingLockout.py'], shell=True)
        subprocess.call(['sudo pkill -9 -f RingAlert.py'], shell=True)
        LockoutSound.play(-1)
        time.sleep(5)
    if tone == 'bell':
        print('Man Bell Play')
        logging.warning('| Man Bell Play')
        mixer.stop()
        subprocess.call(['sudo pkill -9 -f RingEmergenceyEvacuation.py'], shell=True)
        subprocess.call(['sudo pkill -9 -f RingLockdown.py'], shell=True)
        subprocess.call(['sudo pkill -9 -f RingLockout.py'], shell=True)
        subprocess.call(['sudo pkill -9 -f RingAlert.py'], shell=True)
        BellSound.play()
        time.sleep(5)
        subprocess.call(['sudo pkill -9 -f Tones.py'], shell=True)

if __name__ == "__main__":
    mixer.init(48000, -16, 2, 2048)
    EvacSound = mixer.Sound('/var/www/html/assets/tones/Evacuatev3.ogg')
    AlertRamp = mixer.Sound('/var/www/html/assets/tones/AlertRamped.ogg')
    AlertVoice = mixer.Sound('/var/www/html/assets/tones/Alertvoicev2.ogg')
    LockdownSound = mixer.Sound('/var/www/html/assets/tones/AlertRamped.ogg')
    LockoutSound = mixer.Sound('/var/www/html/assets/tones/AlertRamped.ogg')
    BellSound = mixer.Sound('/var/www/html/assets/tones/schoolbell2.ogg')
    try:
        sys.argv[1]
    except IndexError:
        pass
    else:
            print('Web Button Press')
            logging.warning('| Web Button Pressed')
            main(sys.argv[1])
    while True:
        if Cancel.is_pressed:
            print('Cancel Button Pressed')
            logging.warning('| Cancel Button Pressed')
            time.sleep(1)
            if Cancel.is_pressed:
                print('Cancel Button Pressed 1 Second')
                logging.warning('| Cancel Button Pressed 1 Second')
                time.sleep(1)
                if Cancel.is_pressed:
                    print('Cancel Button Pressed 2 Second')
                    logging.warning('| Cancel Button Pressed 2 Second')
                    time.sleep(1)
                    if Cancel.is_pressed:
                        print('Cancel Button Pressed 3 Second')
                        logging.warning('| Cancel Button Pressed 3 Second')
                        mixer.stop()
                        subprocess.call(['sudo pkill -9 -f RingEmergenceyEvacuation.py'], shell=True)
                        subprocess.call(['sudo pkill -9 -f RingLockdown.py'], shell=True)
                        subprocess.call(['sudo pkill -9 -f RingLockout.py'], shell=True)
                        subprocess.call(['sudo pkill -9 -f RingAlert.py'], shell=True)
                        subprocess.call(['sudo pkill -9 -f Tones.py'], shell=True)
                        print('All Tones Canceled')
                        logging.warning('| All Tones Canceled')
                        break