from gpiozero import Button
import time
EvacButton = Button(17)
AlertButton = Button(18)
LockdownButton = Button(27)
LockoutButton = Button(22)
BellButton = Button(23)
Cancel = Button(15)
while True:
        if EvacButton.is_pressed:
            print('Evac Button Pressed')
            # logging.warning('| Evac Button Pressed')
            time.sleep(1)
            if EvacButton.is_pressed:
                print('Evac Button Pressed 1 Second')
                # logging.warning('| Evac Button Pressed 1 Second')
                time.sleep(1)
                if EvacButton.is_pressed:
                    print('Evac Button Pressed 2 Second')
                    # logging.warning('| Evac Button Pressed 2 Second')
                    time.sleep(1)
                    if EvacButton.is_pressed:
                        print('Evac Button Pressed 3 Second')
                        # logging.warning('| Evac Button Pressed 3 Second')
                        # Tone('evac')
        if AlertButton.is_pressed:
            print('Alert Button Pressed')
            # logging.warning('| Alert Button Pressed')
            # time.sleep(1)
            if AlertButton.is_pressed:
                print('Alert Button Pressed 1 Second')
                # logging.warning('| Alert Button Pressed 1 Second')
                # time.sleep(1)
                if AlertButton.is_pressed:
                    print('Alert Button Pressed 2 Second')
                    # logging.warning('| Alert Button Pressed 2 Second')
                    time.sleep(1)
                    if AlertButton.is_pressed:
                        print('Alert Button Pressed 3 Second')
                        # logging.warning('| Alert Button Pressed 3 Second')
                        # Tone('alert')
        if BellButton.is_pressed:
            print('Bell Button Pressed')
            # logging.warning('| Bell Button Pressed')
            time.sleep(1)
            if BellButton.is_pressed:
                print('Bell Button Pressed 1 Second')
                # logging.warning('| Bell Button Pressed 1 Second')
                time.sleep(1)
                if BellButton.is_pressed:
                    print('Bell Button Pressed 2 Second')
                    # logging.warning('| Bell Button Pressed 2 Second')
                    time.sleep(1)
                    if BellButton.is_pressed:
                        print('Bell Button Pressed 3 Second')
                        # logging.warning('| Bell Button Pressed 3 Second')
                        # Tone('bell')
        if LockdownButton.is_pressed:
            print('LockdownButton Pressed')
            # logging.warning('| LockdownButton Pressed')
            time.sleep(1)
            if LockdownButton.is_pressed:
                print('LockdownButton Pressed 1 Second')
                # logging.warning('| LockdownButton Pressed 1 Second')
                time.sleep(1)
                if LockdownButton.is_pressed:
                    print('LockdownButton Pressed 2 Second')
                    # logging.warning('| LockdownButton Pressed 2 Second')
                    time.sleep(1)
                    if LockdownButton.is_pressed:
                        print('LockdownButton Pressed 3 Second')
                        # logging.warning('| LockdownButton Pressed 3 Second')
                        # Tone('lockdown')
        if LockoutButton.is_pressed:
            print('Bell Button Pressed')
            # logging.warning('| Bell Button Pressed')
            time.sleep(1)
            if LockoutButton.is_pressed:
                print('Bell Button Pressed 1 Second')
                # logging.warning('| Bell Button Pressed 1 Second')
                time.sleep(1)
                if LockoutButton.is_pressed:
                    print('Bell Button Pressed 2 Second')
                    # logging.warning('| Bell Button Pressed 2 Second')
                    time.sleep(1)
                    if LockoutButton.is_pressed:
                        print('Bell Button Pressed 3 Second')
                        # logging.warning('| Bell Button Pressed 3 Second')
                        # Tone('lockout')