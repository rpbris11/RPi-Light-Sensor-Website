import time
import board
import busio
import adafruit_ltr390
import requests
#import mysql.connector

API_ENDPOINT = "http://two-friends.000webhostapp.com/post-ltr-data.php"
api_key = "822c9a37"

i2c = busio.I2C(board.SCL, board.SDA)
ltr = adafruit_ltr390.LTR390(i2c)
#data
location = "Raspberry Pi"
while True:
    uv_light = ltr.uvs
    ambient_light = ltr.light
    uv_index = round(ltr.uvi, 3)
    lux = round(ltr.lux, 3)

    payload = {'api_key':api_key, 'sensor':'LTR390', 'location':location,
        'uv_light':uv_light, 'uv_index':uv_index,
               'ambient_light':ambient_light,'lux':lux}
    r = requests.post(API_ENDPOINT, data=payload)
    print(r.text)
    time.sleep(15)



